<?php
function ConnectToDatabase() {
            $servername = "localhost";
            $username = "root";
            $password = "lk1lk2lk3";

            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully";
            return $conn;
        }
?>
