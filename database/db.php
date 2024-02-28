<?php


function connection() {
    try {
        $db = new PDO("sqlsrv:Server=localhost;Database=project2", "", "");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Connection failed: ";
        echo $e->getMessage();
        return null;
    }
}


