<?php 

namespace Core;
use Core\Database\QueryBuilder;

abstract class BaseModel {
    /**
     * Get the original table name of the called model
     * @return string
    */
    public static function getTableName(){
        $target = get_called_class();
        $target = str_replace('App\\Models\\', '', $target);
        $target = strtolower($target).'s';

        return $target;
    }

    /**
     * Executes a select query to fetch for one row
     * @return array
    */
    public static function find($id) {
        $table = self::getTableName();

        $result = QueryBuilder::selectOne($table, $id);

        return $result;
    }
    
    /**
     * Executes a select query to fetch for multiple rows
     * @return array
    */
    public static function get() {
        $table = self::getTableName();

        $result = QueryBuilder::selectMultiple($table);

        return $result;
    }
}