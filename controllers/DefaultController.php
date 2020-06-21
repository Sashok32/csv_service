<?php

namespace controllers;

use models\Csv;
use models\Exercises;
use widgets\Filter;
use widgets\Helper;
use widgets\Paginator;
use widgets\Sort;

class DefaultController extends Controller
{

        public function Index () {

            $error = [];
            if (!empty($_FILES['file'])) {
                if ($_FILES['file']['error'] == 2) {
                    $error[] = 'too big file (max file < 1 Mb)';
                }
                if (substr($_FILES['file']['name'], -4) != '.csv') {
                    $error[] = 'your file should be current CSV';
                }
                if (empty($error) && $_FILES['file']['error'] == 0) {

                    $csvFile = file($_FILES['file']['tmp_name']);
                    $csvColumns = array_shift($csvFile);
                    $csvColumns = trim($csvColumns);
                    $csvColumns = explode(',', $csvColumns);
                    if ($csvColumns !== Csv::tableAttributes()) {
                        $error[] = 'structure of csv file are wrong';
                    } else {
                        foreach ($csvFile as $row) {
                            $row = trim($row);
                            $row = explode(',', $row);
                            $params = array_combine($csvColumns, $row);
                            if (!Csv::create($params)) {
                                $error[] = 'error adding to database row - ' . implode(',', $row);
                                break;
                            }
                        }
                        Helper::setFlush('Import successfully');
                    }
                }
            }
            $error = implode(', ', $error);

            return $this->render('index', ['error' => $error]);
        }

        public function View() {
            $error = 'No records';
            $sort = new Sort(Csv::tableAttributes());

            $filter = new Filter(Csv::tableAttributes());

            $records = Csv::findAll([
                'sort' => $sort->sortBy(),
                'filter' => $filter->filterWhere(),
            ]);
            if (!empty($records)) {
                $error = '';
            }

            return $this->render('view', [
                'error' => $error,
                'records' => $records,
                'sortLinks' => $sort->viewSort(),
                'filterLinks' => $filter->viewFilters(),
            ]);
        }

        public function Delete() {
            if ($_POST['delete']) {
                if (Csv::deleteAll()) {
                    Helper::setFlush('All records are deleted');
                    header('Location: /');
                }
            } else {
                header('Location: /');
            }
        }

    public function Export() {
        if ($records = Csv::findAll()) {
            array_unshift($records, Csv::tableAttributes());
            $f = fopen('php://memory', 'w');
            foreach ($records as $record) {
                fputcsv($f, $record, ',');
            }
            fseek($f, 0);
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="export.csv";');
            fpassthru($f);
        }
    }
}