<?php require_once('./dbdetails.php');
require('header.php');  ?>
<!DOCtype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-image: url("5.jpg");
            background-repeat: repeat;
        }
    </style>
</head>

<body>
    <?php
    //CODE TO SHOW ALL BEGINS HERE.
    //Prepared statement is used to prevent SQLInjection attack
    //object Method

    echo "<h1><center>STUDENT'S DATA</center></h1>";

    $query = $con->prepare("SELECT * FROM stu_info");
    if ($query === false) {
        trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
    }
    if ($query->execute()) {
        $result = $query->get_result();
        //echo "<br><br>After Insertion Object Method : <br><br>";
        echo " <div class='w3-border'>";
        echo "<div class='w3-container w3-margin w3-green'>";
        echo "<table border='2' style='width: 100%; height:500px;tr:nth-child(even) {
            background-color: #D6EEEE;
          }'>";
        echo "<tr><th>Rollno.</th><th>Name</th><th>Gender</th><th>DOB</th><th>Address</th><th>Delete</th><th>Edit</th></tr>";
        while ($row = $result->fetch_object()) {
            echo "<tr>
                    <td>
                        <center>" . $row->rollno . "</center>
                    </td>
                    <td>
                        <center>" . $row->name . "</center>
                    </td>
                    <td>
                        <center>" . $row->gender . "</center>
                    </td>
                    <td>
                        <center>" . $row->dob . "</center>
                    </td>
                    <td>
                        <center>" . $row->addr . "</center>
                    </td>
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
    }
    //echo "<br><center><a href='index.html'><img src='button.png'></a><center>";
    //CODE TO SHOW ENDS HERE.

    /*echo "<hr>";

    //accosiative method
    $query = $con->prepare("SELECT * FROM stu_info");
    if ($query === false) {
        trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
    }
    if ($query->execute()) {
        $result = $query->get_result();
        echo "After Insertion Associative Method: <br>";
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . ", Address: " . $row["addr"] . "<br>";
        }
    }*/
    ?>
</body>

</html>