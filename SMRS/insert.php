<?php require_once('./dbdetails.php'); ?>
<!DOCtype html>
<html>

<head>
    <style>
        body {
            background-image: url("5.jpg");
            background-repeat: repeat;
        }
    </style>
</head>

<body>
    <?php
    //CODE TO INSERT BEGINS HERE.
    //Prepared statement is used to prevent SQLInjection attack
    $dowork = true;
    $s_rol = $_POST["s_rol"];
    if (!isset($s_rol) || empty($s_rol)) {
        $dowork = false;
    }

    $s_name = $_POST["s_name"];
    if (!isset($s_name) || empty($s_name)) {
        $dowork = false;
    }

    $s_gen = $_POST["s_gen"];
    if (!isset($s_gen) || empty($s_gen)) {
        $dowork = false;
    }

    $s_dob = $_POST["s_dob"];
    if (!isset($s_dob) || empty($s_dob)) {
        $dowork = false;
    }

    $s_addr = $_POST["s_addr"];
    if (!isset($s_addr) || empty($s_addr)) {
        $dowork = false;
    }

    if ($dowork) {
        $query = $con->prepare("Insert INTO stu_info(rollno,name,gender,dob,addr) VALUES (?,?,?,?,?)");
        if ($query === false) {
            trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
        }
        /*$p1 = 'Aashvi';
        $p2 = 'Female';
        $p3 = '31 - 01 - 1986';
        $p4 = 'kkr';*/
        $query->bind_param('issss', $s_rol, $s_name, $s_gen, $s_dob, $s_addr);
        if ($query->execute()) {
            if ($con->affected_rows > 0) {
                $last_id = $con->insert_id;
                //'stu_pic ".$last_id.".jpg"
                $_SESSION["actionstatus"] = 'Student added succesfully.';
            } else {
                $_SESSION["actionstatus"] = 'Cannot add the Student.';
            }
        } else {
            $_SESSION["actionstatus"] = 'Technical Faliure.';
        }
    } else {
        //error: all fields are mandatory
        $_SESSION["actionstatus"] = 'All fields are mandatory';
    }
    header("Location:addstudent.php");
    //CODE TO INSERT ENDS HERE.
    ?>


</body>

</html>