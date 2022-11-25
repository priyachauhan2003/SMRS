<?php require_once('./dbdetails.php');
require('header.php'); ?>
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
    //CODE TO DELETE AN EXISTING RECORD BEGINS HERE.
    //Prepared statement is used to prevent SQLInjection attack
    $dowork = true;
    $s_sno = $_POST["btn_delstudent"];
    if (!isset($s_sno) || empty($s_sno)) {
        $dowork = false;
    }
    /*
    $s_name = $_POST["s_name"];
    if (!isset($s_name) || empty($s_rol)) {
        $dowork = false;
    }*/


    if ($dowork) {
        $query = $con->prepare("DELETE FROM stu_info WHERE sno=? ");
        if ($query === false) {
            trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
        }

        $query->bind_param('i', $s_sno);
        if ($query->execute()) {
            if ($con->affected_rows > 0) {
                $_SESSION["actionstatus"] = 'Student deleted succesfully.';
            } else {
                $_SESSION["actionstatus"] = 'Cannot delete the Student.';
            }
        } else {
            $_SESSION["actionstatus"] = 'Technical Faliure.';
        }
    } else {
        $_SESSION["actionstatus"] = 'Rollno is mandatory';
    }
    //CODE TO DELETE AN EXISTING RECORD ENDS HERE.

    //CODE TO SHOW ALL RECORDS BEGINS HERE.
    $query = $con->prepare("SELECT * FROM stu_info");
    if ($query === false) {
        trigger_error('Wrong SQL: ' . $sql . 'Error: ' . $con->errno . ' ' . $con->error, E_USER_ERROR);
    }
    if ($query->execute()) {
        $result = $query->get_result();
        echo "<center>";
        echo "LIST AFTER DELETING RECORD <br>";
        while ($row = $result->fetch_object()) {
            echo "Rollno :" . $row->rollno . "|| Name :  " . $row->name . " ||  Gender:  " . $row->gender . " || DOB: " . $row->dob . " || Address: " . $row->addr . "<br>";
        }
        echo "</center>";
    }
    ?>

</body>

</html>