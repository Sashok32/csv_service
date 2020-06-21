<?php


namespace models;


/**
 * Class Model
 * @package models
 */
class Model
{

    /**
     * @return string
     */
    public static function tableName()
    {
        $table_name = static::class;
        $table_name = explode('\\', $table_name);
        $table_name = strtolower(end($table_name));
        return $table_name;
    }

    /**
     * @return array
     */
    public static function tableAttributes() {
        $table = static::tableName();
        $columns = [];
        $fields = \MVC::getBase()->connection()->query("SHOW COLUMNS FROM {$table}")->fetchAll();
        foreach ($fields as $field) {
            $columns[] = $field['Field'];
        }
        return $columns;
    }
    /**
     * @return array
     */
    public static function findAll(array $params = []) {
        $table = static::tableName();

        $sql = "SELECT * FROM {$table} ";

        if (!empty($params)) {
            extract($params);
        }
        if (!empty($sort)) {
            $direction = 'ASC';
            if (strpos($sort,'-') === 0) {
                $sort = substr($sort, 1);
                $direction = 'DESC';
            }
            $sql .= "ORDER BY {$sort} {$direction} ";
        }
        if (!empty($filter)) {
            $sql .= $filter;
        }
        return \MVC::getBase()->connection()->query($sql)->fetchAll();
    }
    public static function countAll() {
        $table = static::tableName();
        return \MVC::getBase()->connection()->query("SELECT COUNT(*) FROM {$table}")->fetchColumn();
    }

    public static function findOne($id) {
        $table = static::tableName();

        return \MVC::getBase()->connection()->query("SELECT * FROM {$table} where id = {$id}")->fetch();
    }

    public static function createTable() {
        return \MVC::getBase()->connection()->prepare("
            CREATE TABLE IF NOT EXISTS `csv` (
            `UID` int(11) NOT NULL,
            `Name` varchar(50) NOT NULL,
            `Age` int(11) NOT NULL DEFAULT 0,
            `Email` varchar(50) NOT NULL DEFAULT '0',
            `Phone` varchar(50) NOT NULL DEFAULT '0',
            `Gender` varchar(50) NOT NULL DEFAULT '0'
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ")->execute();
        return $columns;
    }

}