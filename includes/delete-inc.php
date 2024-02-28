<?php


require_once "../controllers/EmployeeController.php";

delete_employees($_GET['id']);

header('Location: ../table.php?error=Employee Deleted successfully');
exit();
