<?php

$conn = connection();


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



/**
 * Get Employees from database
 * @return array
 */
function get_employees() {
    global $conn;
    $res = $conn->query('select * from employeeDetails')->fetchAll();
    return $res;
}




function delete_employees(string $id) {
    global $conn;
    $res = $conn->query('delete from employeeDetails where employeeUID = ' . $id);
    return $res;
}





function update_employees(string $id, $name, $email, $phone, $address, $place) {
    global $conn;


    $conn
        ->query("update employeeDetails set 
            name = '" . $name . "',  
            email = '" . $email . "',  
            phone = '" . $phone . "',  
            address = '" . $address . "',  
            place = '" . $place . "'
            where employeeUID = '" . $id . "'
        ");

    return true;

}