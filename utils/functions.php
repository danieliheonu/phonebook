<?php 

    class DBModel{
        public $conn;

        function __construct()
        {
            $this->conn = mysqli_connect('localhost', 'root', '', 'phonebook');
        }
    }
?>