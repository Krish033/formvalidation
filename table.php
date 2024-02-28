<!DOCTYPE html>
<html lang="en">
<?php require "./controllers/EmployeeController.php" ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css"
        integrity="sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
        }

        th {
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

        td,
        th {
            border: 1px solid;
            text-align: left;
            padding: 8px;
            height: :70px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>EmployeeName</th>
                <th>Employee Email </th>
                <th>PhoneNumber</th>
                <th>Address</th>
                <th>Place</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach (get_employees() as $main) { ?>
                <tr>
                    <td>
                        <?php echo $main['name'] ?>
                    </td>

                    <td>
                        <?php echo $main['email'] ?>
                    </td>
                    <td>
                        <?php echo $main['phone'] ?>
                    </td>
                    <td>
                        <?php echo $main['address'] ?>
                    </td>
                    <td>
                        <?php echo $main['place'] ?>
                    </td>

                    <td>
                             <div class="d-flex gap-2 mr-2" role="group" aria-label=" ">
                            <button data-bs-toggle="modal" data-bs-target="#my_modal_<?php echo $main['employeeUID'] ?>"
                                type="button" class="btn  btn-outline-primary float-end">
                                <i class="fa-solid fa-pencil"></i>
                            </button>

                            <form method="POST" action="./includes/delete-inc.php?id=<?php echo $main['employeeUID'] ?>">
                                <button data-bs-toggle="modal"
                                    data-bs-target="#my_modal1_<?php echo $main['employeeUID'] ?>" type="button"
                                    class="btn  btn-outline-primary float-end" data-dismiss="modal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="my_modal1_<?php echo $main['employeeUID'] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Delete Employee Details</h5>
                                <button data-bs-dismiss="modal"
                                    style="border: none; outline: none; background-color: transparent"><i
                                        class="fa-solid fa-close"></i></button>
                            </div>
                            <div class="modal-body">
                                <p>Confirm your deletion</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST"
                                    action="./includes/delete-inc.php?id=<?php echo $main['employeeUID'] ?>">
                                    <button type="submit" class="btn btn-success">Yes</button>
                                </form>
                                <button data-bs-dismiss="modal" class="btn btn-danger">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="my_modal_<?php echo $main['employeeUID'] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Edit Employee</h5>
                                <button data-bs-dismiss="modal"
                                    style="border: none; outline: none; background-color: transparent"><i
                                        class="fa-solid fa-close"></i></button>
                            </div>
                            <div class="modal-body">
                                <form method='post' action="./includes/update.php?id=<?php echo $main['employeeUID'] ?>">
                                    <div class="form-group mb-2">
                                        <label for="name"> Name </label>
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $main['name'] ?>"
                                            placeholder="Enter First Name...">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email"> Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $main['email'] ?>"
                                            placeholder="Enter E-mail.....">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" id="phone_" class="form-control" value="<?php echo $main['phone'] ?>" name="phone">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="address">Address</label>
                                        <textarea type="address" id="address" class="form-control"
                                            name="address"><?php echo $main['address'] ?></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="place">Place</label>
                                        <input type="place" id="place"value="<?php echo $main['place'] ?>" class="form-control" name="place">
                                        <div class="modal-footer">
                               
                                    
                                    <button type="submit" class="btn btn-success">Save</button>
                             
                                <button data-bs-dismiss="modal" class="btn btn-danger">Close</button>
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>