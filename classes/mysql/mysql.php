<?php
class mysql {
    private static $conn;
    
    public static function connect($operation) {
        //echo $operation;
        self :: $conn = new mysqli(SERVERNAME,USERNAME,PASSWORD,DB_TABLE);
        if(self :: $conn->query($operation)) {
            return self :: $conn->query($operation);
        } else {
			echo $operation;
		}
    }

    public static function create_table($name,$copy = 0) {
        if($copy === 0) {
             $operation = "CREATE TABLE $name (
                                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                title VARCHAR(30) NOT NULL,
                                lastname VARCHAR(30) NOT NULL,
                                alias VARCHAR(30) NOT NULL,
                                test_column VARCHAR(30) NOT NULL,
                                date_for_test VARCHAR(30) NOT NULL,
                                password VARCHAR(30) NOT NULL,
                                email VARCHAR(50),
                                reg_date TIMESTAMP
                                )";
        }else{
            for ($i=0; $i <= $copy ; $i++) { 
                echo $i;
                 $operation = "CREATE TABLE $name'_step_'$i (
                                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                title VARCHAR(30) NOT NULL,
                                lastname VARCHAR(30) NOT NULL,
                                alias VARCHAR(30) NOT NULL,
                                test_column VARCHAR(30) NOT NULL,
                                date_for_test VARCHAR(30) NOT NULL,
                                password VARCHAR(30) NOT NULL,
                                email VARCHAR(50),
                                reg_date TIMESTAMP
                                )";
            }
        }
       
        $result =  self :: connect($operation);
        return $result;
    }

    public static function delete($table,
                                    $condition) {

        $operation = "DELETE FROM ".$table." WHERE ".$condition;

        $result =  self :: connect($operation);
        return $result;
    }
    
    public static function insert($table,
                                    $fields = '',
                                    $fields_values = '') {
		
        $operation = "INSERT INTO ".$table." (".$fields.") VALUES (".$fields_values.")";
        $result = self :: connect($operation);
       
        return $result;
    }
    
    public static function update($table,
                                    $fields_and_values,
                                    $condition = '') {
        if($condition) {
            $condition = "WHERE ".$condition;
        }
        
        $operation = "UPDATE ".$table." SET ".$fields_and_values." ".$condition;

        $result = self :: connect($operation);
        return $result;
    }
    
    public static function get_max_id($table_title,
                                        $condition = '') {
        $get_max_id = self :: select($table_title,
                                     $condition,
                                     '',
                                     'MAX(id) AS id');
        
        self :: connect();
        return $get_max_rang[0]['id'];
    }
    
    public static function get_max_rang($table_title,
                                        $condition = '') {

        $result = self :: select($table_title,
                                $condition,
                                '',
                                'MAX(rang) AS rang');
        
        self :: connect();
        return $result[0]['rang'];
    }
    
    public static function select($table,
                                    $condition = '',
                                    $sorting = '',
                                    $fields = '*',
                                    $limit = '') {
        if($condition) {
            $condition = "WHERE ".$condition;
        }
        
        if($sorting) {
            $sorting = "ORDER BY ".$sorting;
        }
        
        if($limit) {
            $limit = "LIMIT ".$limit;
        }
        
        $operation = "SELECT ".$fields." FROM ".$table." ".$condition." ".$sorting." ".$limit;
        
        $result = self :: connect($operation);
        $query_array = array();
            
        while($rows = $result -> fetch_assoc()) {
            $query_array[] = $rows;
        }
        
        return $query_array;
    }
    
    public static function select_one($table,
                                        $condition = '',
                                        $fields = '*') {
        if($condition) {
            $condition = "WHERE ".$condition;
        }
        
        $limit = "LIMIT 1";
        
        $operation = "SELECT ".$fields." FROM ".$table." ".$condition." ".$limit;
        
        $result = self :: connect($operation);
        $row = false;
        
        if($result) {
            $row = $result -> fetch_assoc();
        } else {
            // echo 'Select one problem:<br>
            //         table: '.$table.'<br>
            //         fields: '.$fields.'<br>
            //         condition: '.$condition.'<br>
            //         limit: '.$limit;
        }
        return $row;
    }

    public static function check_user_exists($table,
                                             $condition
                                             ) {

        $operation = self :: select_one($table,
                                        $condition);
     
        return $operation;
    }
}