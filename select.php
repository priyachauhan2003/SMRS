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
    //CODE TO SELECT A  RECORD BEGINS HERE.
    //Prepared statement is used to prevent SQLInjection attack
    $dowork = true;
    $s_rol = $_POST["s_rol"];
    if (!isset($s_rol) || empty($s_rol)) {
        $dowork = false;
    }

    $s_name = $_POST["s_name"];

    echo "<h1><center>SEARCHED STUDENT'S DATA</center></h1>";

    if ($dowork) {
        $query = $con->prepare("SELECT * FROM stu_info WHERE name=? or rollno=?");
        if ($query === false) {
            trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
        }


        $query->bind_param('si', $s_name, $s_rol);
        if ($query->execute()) {
            $result = $query->get_result();
            echo " <div class='w3-border'>";
            echo "<div class='w3-container w3-margin w3-green'>";
            echo "<table border='2' style='width: 100%; height:500px;tr:nth-child(even) {
                background-color: #D6EEEE;
            }'>";
            echo "<tr><th>Rollno.</th><th>Name</th><th>Gender</th><th>DOB</th><th>Address</th><th>Delete</th><th>Edit</th></tr>";
            while ($row = $result->fetch_object()) {
                $_SESSION["actionstatus"] = 'Student found .';
                echo "<tr><td><center>" . $row->rollno . "</center></td>
                <td><center>" . $row->name . "</center></td>
                <td><center>" . $row->gender . "</center></td>
                <td><center>" . $row->dob . "</center></td>
                <td><center>" . $row->addr . "</center></td>
                <td>
                <form action='delete.php' method='post'>
                <center><button name='btn_delstudent' value='" . $row->sno . "'><img src='download.png'  width='20' height ='20'></button></center>
                </form> 
                </td>
                <td>
                <form action='edit.php' method='post'>
                <center><button name='btn_editstudent' value='" . $row->sno . "'><img src='update.jpg'  width='20' height ='20'></button></center>
                </form>
                </td>
                </tr>";
            }
            echo "</table>";
            echo "</div>";
            echo "</div>";
        } else {
            $_SESSION["actionstatus"] = 'Technical Faliure.';
        }
    } else {
        $_SESSION["actionstatus"] = 'Rollno is mandatory';
    }




    //CODE TO SELECT A RECORD ENDS HERE.
    /*echo "<hr>";
    //CODE TO SHOW A RECORDS BEGINS HERE.
    $query = $con->prepare("SELECT * FROM stu_info");
    if ($query === false) {
        trigger_error('Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
    }
    if ($query->execute()) {
        $result = $query->get_result();
        while ($row = $result->fetch_object()) {
            echo "Name: " . $row->name . " ,Address: " . $row->addr . "<br>";
        }
    }*/
    ?>

</body>

</html>