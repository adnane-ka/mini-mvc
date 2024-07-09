<?php 

namespace Core\Database;

class QueryBuilder{
    /**
     * Execute a given SQL statement & return result
    */
    private static function exec($query){
        $instance = DBConnection::getInstance();

        $result = $instance->getConnection()->query($query);

        $instance->closeConnection();

        return $result;
    }

    /**
     * Select multiple records from a given table
     * @return array
    */
    public static function select($table, $where = null, $value = null){
        $query = "SELECT * FROM $table";
        $query = ($where && $value) ? $query." WHERE $where=$value;" : $query;
        $result = self::exec($query);
        $rows = [];

        if ($result->num_rows > 0) {
            # return multi-dimensional array if fetching for a multiple record
            if($result->num_rows == 1 && !is_null($where) && !is_null($value)){
                return $result->fetch_assoc();
            }else{
                while ($row = $result->fetch_assoc()) {
                    array_push($rows, $row);
                }
            }
        }

        return $rows;
    }

    /**
     * Delete where-matching records from a given table
     * @return void
    */
    public static function delete($table, $column, $value){
        $query = "DELETE FROM $table WHERE $column=$value";

        return self::exec($query);
    }

    /**
     * Insert a given data in a given table
     * @return array
    */
    public static function insert($table, $columns, $values){
        $columns = implode(',', $columns);
        $values = array_map(function($value){
            return "'$value'";
        }, $values);
        $values = implode(',', $values);

        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        return self::exec($query);
    }

    /**
     * Update a multiple records in a given table using a given data
     * @return array
    */
    public static function update($table, $where, $value, $data){
        $pairs = '';
        foreach ($data as $k => $v) {
            $pairs .= $k .'=' ."'$v'";
            if(end($data) !== $v){
                $pairs .= ',';
            }
        }
        $query = "UPDATE $table SET $pairs WHERE $where=$value";
        
        return self::exec($query);
    }

    /**
     * Truncate a given table 
     * @return void
    */
    public static function truncate($table){
        $query = "DELETE FROM $table";

        return self::exec($query);
    }
}