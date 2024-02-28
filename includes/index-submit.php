<?php

require "../database/db.php";
$conn = connection();



/**
 * Validate password
 * @param mixed $password
 * @return bool
 */
function validatephone($phone) {
    return strlen($phone) == 10
        ? true
        : false;
}




/**
 * Checke the input that is passed
 * @param mixed $data
 * @return string
 */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




/**
 * Redirect user with form validation errors
 * @return never
 */
function redirectWithErrors() {
    global $nameErr, $emailErr, $placeErr, $phoneErr;
    header("Location: ../index.php?nameErr=$nameErr&emailErr=$emailErr&phoneErr=$phoneErr&placeErr=$placeErr");
    exit();
}



/**
 * Redirect user with form custom errors messages
 * @param mixed $error
 * @return never
 */
function redirectWithError($error) {
    header("Location: ../index.php?error=$error");
    exit();
}


function insert($name, $email, $phone, $address, $place) {

    global $conn;

    $conn
        ->query("insert into employeeDetails (
            name, 
            email,
            phone,
            address,
            place,
            isActive,
            createdBy
        ) values(
            '" . $name . "',  
            '" . $email . "',  
            '" . $phone . "',  
            '" . $address . "',  
            '" . $place . "',
            1, 1
        )");

    return true;
}



//  Data handling vars
$nameErr = $emailErr = $phoneErr = $placeErr = $addressErr = "";
$name = $email = $phone = $place = $address = "";





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = " * Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }


    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = " * Invalid email format";
        }
    }
    if (empty($_POST["place"])) {
        $placeErr = "Place is required";
    } else {
        $place = test_input($_POST["place"]);
    }
    if (empty($_POST["address"])) {
        $addressErr = " * Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }
    if (!$phone) {
        $phoneErr = " * Invalid Phone format";
    }

}



// Inserting into Database
$result = insert($name, $email, $phone, $address, $place);
echo $result;


// checking validation
if ($nameErr != "" || $emailErr != "" || $placeErr != "" || $phoneErr != "" || $addressErr != "") {
    redirectWithErrors();
}


if (!$result) {
    redirectWithError('Something went wrong!!, ');
}

redirectWithError('Registered Successfully!');
