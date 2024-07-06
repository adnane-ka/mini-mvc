<?php 

namespace Core\Database;

class QueryBuilder{
    /**
     * Select multiple records from a given table
     * @return array
    */
    public static function selectMultiple($table){
        $query = "SELECT * FROM $table";
        $result = (new DBConnection)->init()->query($query);
        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }

        return $rows;
    }

    /**
     * Select a one record from the given table
     * @return array
    */
    public static function selectOne($table, $id){
        $query = "SELECT * FROM $table WHERE id=$id";
        $result = (new DBConnection)->init()->query($query);

        if ($result->num_rows > 0) {
            return $row = $result->fetch_assoc();
        }else{
            return [];
        }
    }
}