<?php

    //PDO is PHP Data Object
    class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $dbname = 'symfony';

        //Create database handler, property for errors, statement property for executing prepared statements
        private $dbh;
        private $error;
        private $stmt;

        //Constructor is a function that runs when object is instantiated

        public function __construct(){
            //Set DSN - connection string
            $dsn = 'mysql:host='.$this->host .'; dbname='. $this->dbname;

            //Set options and set that to array
            $options = array(
              PDO::ATTR_PERSISTENT => true, //persistent connection
              PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION //set error mode attribute
            );

            //Create new PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOEception $e){
                $this->error = $e->getMessage();
            }
        }

        //Create query
        public function query($query){
            //take our statement stmt and set it to dbh and call prepare
            $this->stmt = $this->dbh->prepare($query);
        }
        
        //Create a bind function to bind prepare statement
        public function bind($param, $value, $type = null){
            if (is_null($type)){
                switch (true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            //call bind value
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute(){
            //mysqli_stmt::execute -- mysqli_stmt_execute — Executes a prepared Query
            return $this->stmt->execute();
        }

        //Function required to insert post body and title
        //lastInsertId returns the ID of the last inserted row or sequence value
        public function lastInsertID(){
            $this->dbh->lastInsertId();
        }

        public function resultset(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>