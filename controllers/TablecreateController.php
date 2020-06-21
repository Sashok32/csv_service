<?php

namespace controllers;

use models\Csv;
use models\Exercises;
use widgets\Filter;
use widgets\Helper;
use widgets\Paginator;
use widgets\Sort;

class TablecreateController extends Controller
{

        public function Csv () {

            if (Csv::createTable()) {
                Helper::setFlush('Table Csv created successfully');
                header('Location: /');
            }

        }

}