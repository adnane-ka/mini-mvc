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
     * Find a matching-id record within the attached model 
     * @return array
    */
    public static function find($id) {
        $table = self::getTableName();

        $result = QueryBuilder::select(table: $table, where: 'id', value: $id);

        return $result;
    }
    
    /**
     * Get a set of records within the attached model 
     * @return array
    */
    public static function get() {
        $table = self::getTableName();

        $result = QueryBuilder::select(table: $table);

        return $result;
    }

    /**
     * Create a new record using a given data
     * @return void
    */
    public static function create($data){
        $table = self::getTableName();

        $result = QueryBuilder::insert(table: $table, columns: array_keys($data), values: array_values($data));
    }

    /**
     * delete a given matching-id record
     * @return void
    */
    public static function delete($id){
        $table = self::getTableName();

        $result = QueryBuilder::delete(table: $table, column: 'id', value: $id);
    }

    /**
     * update a given matching-id record
     * @return void
    */
    public static function update($id, $data){
        $table = self::getTableName();

        $result = QueryBuilder::update(table: $table, where: 'id', value: $id, data: $data);
    }
}