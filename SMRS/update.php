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
    //CODE TO UPDATE AN EXISTING RECORD BEGINS HERE.
    //Prepared statement is used to prevent SQLInjection attack


    $s_rol = $_POST["s_rol"];
    $s_name = $_POST["s_name"];
    $s_gen = $_POST["s_gen"];
    $s_dob = $_POST["s_dob"];
    $s_addr = $_POST["s_addr"];


    $query = $con->prepare("UPDATE stu_info SET name=?,gender=?,dob=?,addr=? WHERE rollno=?");
    if ($query === false) {
        trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
    }


    $query->bind_param('ssssi', $s_name, $s_gen, $s_dob, $s_addr, $s_rol);
    if ($query->execute()) {
        if ($con->affected_rows > 0) {
            echo "<script>alert('student updated succesfully.')</script>";
        } else {
            echo "<script>alert('Cannot Update the student.')</script>";
        }
    } else {
        echo "<script>alert('Technical faliur .')</script>";
    }
    //CODE TO UPDATE AN EXISTING RECORD ENDS HERE.

    //CODE TO SHOW ALL RECORDS BEGINS HERE.
    $query = $con->prepare("SELECT * FROM stu_info");
    if ($query === false) {
        trigger_error('Wrong SQL: ' . $sql . 'Error: ' . $con->errno . ' ' . $con->error, E_USER_ERROR);
    }
    if ($query->execute()) {
        $result = $query->get_result();
        echo " <div class='w3-border'>";
        echo "<div class='w3-container w3-margin w3-green'>";
        echo "<table border='2' style='width: 100%; height:500px;tr:nth-child(even) {
            background-color: #D6EEEE;
        }'>";
        echo "<tr><th>Rollno.</th><th>Name</th><th>Gender</th><th>DOB</th><th>Address</th></tr>";
        while ($row = $result->fetch_object()) {
            echo "<tr><td><center>" . $row->rollno . "</center></td><td><center>" . $row->name . "</center></td><td><center>" . $row->gender . "</center></td><td><center>" . $row->dob . "</center></td><td><center>" . $row->addr .
                "</center></td>";
            //echo "Rollno : " . $row->rollno . "|| Name :  " . $row->name . " ||  Gender:  " . $row->gender . " || DOB: " . $row->dob . " || Address: " . $row->addr . "<br>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
    }
    ?>
    <br>
    <!--<center><a href="index.html"><img src="button.png"></center></a>-->
</body>
</body>

</html>