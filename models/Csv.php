<?php


namespace models;


/**
 * Class Csv
 * @package models
 */
class Csv extends Model
{

    /**
     * @param string $params
     * @return bool
     */
    public static function create($params = '') {
        $table = static::tableName();

        if (!empty($params) && is_array($params)) {
            extract($params);

            if (!empty($UID) && !empty($Name) && !empty($Age) && !empty($Email) && !empty($Phone) && !empty($Gender)) {

                if (!empty(self::unique($UID))) {
                    if (\MVC::getBase()->connection()->prepare("UPDATE {$table} SET Name = '{$Name}', Age = {$Age}, Email = '{$Email}', Phone = '{$Phone}', Gender = '{$Gender}' where UID = {$UID}")->execute()) {
                        return true;
                    }
                } else {
                    if (\MVC::getBase()->connection()->prepare("INSERT INTO {$table} (UID, Name, Age, Email, Phone, Gender) VALUES ({$UID}, '{$Name}', {$Age}, '{$Email}', '{$Phone}', '{$Gender}')")->execute()) {
                        return true;
                    }
                }
            }
        }
    }

    private static function unique($uid) {
        $table = static::tableName();
        return \MVC::getBase()->connection()->query("SELECT UID FROM {$table} WHERE UID = {$uid}")->fetchColumn();
    }

    public static function deleteAll() {
        $table = static::tableName();

        if (\MVC::getBase()->connection()->prepare("TRUNCATE TABLE {$table} ")->execute()) {
            return true;
        }
    }

}