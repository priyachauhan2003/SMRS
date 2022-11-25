<?php require_once('./dbdetails.php');
require('header.php');  ?>

<!DOCtype html>
<html>

<head>
  <title>UPDATE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
    }

    /* Style the top navigation bar */
    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    /* Style the topnav links */
    .topnav a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* Change color on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: rgb(0, 0, 0);
    }

    .header {
      background-color: #009688;
      padding: 10px;
      text-align: center;
    }

    /* Create three unequal columns that floats next to each other */
    .column {
      float: left;
      padding: 10px;
    }

    /* Left and right column */
    .column.side {
      width: 25%;
    }

    /* Middle column */
    .column.middle {
      width: 50%;
      background: url(img_man.jpg) no-repeat center fixed;
      background-size: cover;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .column.side,
      .column.middle {
        width: 100%;
      }
    }

    /* Style the footer */
    .footer {
      background-color: #009688;
      padding: 40px;
      text-align: center;
    }

    .active {
      color: white;
    }

    body {
      background-image: url("5.jpg");
      background-repeat: repeat;
    }
  </style>
</head>

<?php
$s_sno = $_POST["btn_editstudent"];
if (!isset($s_sno) || empty($s_sno)) {
  $dowork = false;
}

$query = $con->prepare("SELECT * FROM stu_info WHERE sno=?");
if ($query === false) {
  trigger_error('Wrong SQL:' . $sql . 'Error:' . $con->errno . ' ' . $con->error, E_USER_ERROR);
}

$query->bind_param('i', $s_sno);
if ($query->execute()) {
  $result = $query->get_result();
  while ($row = $result->fetch_object()) {
    /*echo "<tr><td><center>" . $row->rollno . "</center></td><td><center>" . $row->name . "</center></td><td><center>" . $row->gender . "</center></td><td><center>" . $row->dob . "</center></td><td><center>" . $row->addr .
      "</center></td><td><a href='delete.php?s_name=" . $row->name . "'><center><img src='download.png' width='20' height='30'></center></a></td></tr>";*/
    echo "<body>
        <form method='post' action='update.php'>
          <h2>
            <div class='row'>
              <div class='column side'>
      
                <img src='update.jpg' width='110%'>
              </div>
              <div class='column middle'>
                <center>
                  <h2>Update the student record :</h2>
                </center>
                <center>
                  <table>
                    <tr>
                      <td>Student rollno :</td>
                      <td><input type='int' name='s_rol' size='20' value=" . $row->rollno . "></td>
                    </tr>
                    <tr>
                      <td>Student name :</td>
                      <td><input type='text' name='s_name' size='20' value=" . $row->name . "></td>
                    </tr>
                    <tr>
                      <td>Student gender :</td>
                      <td><input type='text' name='s_gen' size='20' value=" . $row->gender . "></td>
                    </tr>
                    <tr>
                      <td>Student DOB :</td>
                      <td><input type='text' name='s_dob' size='20' value=" . $row->dob . "></td>
                    </tr>
                    <tr>
                      <td>Student address :</td>
                      <td><input type='text' name='s_addr' size='20' value=" . $row->addr . "></td>
                    </tr>
                    <tr>
                      <td colspan='2'>
                        <center><input type='submit' value='UPDATE'></center>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
              <div class='column side'>
                <center> </center>
              </div>
            </div>
          </h2>
        </form>
        <div class='footer'>
          <h1> </h1>
        </div>
      </body>
      </html>";
  }
}
?>

<!--<body>
  <form method='post' action='update.php'>
    <h2>
      <div class='row'>
        <div class='column side'>

          <img src='update.jpg' width='110%'>
        </div>
        <div class='column middle'>
          <center>
            <h2>Update the student record :</h2>
          </center>
          <center>
            <table>
              <tr>
                <td>Student rollno :</td>
                <td><input type='int' name='s_rol' size='20'></td>
              </tr>
              <tr>
                <td>Student name :</td>
                <td><input type='text' name='s_name' size='20'></td>
              </tr>
              <tr>
                <td>Student gender :</td>
                <td><input type='text' name='s_gen' size='20'></td>
              </tr>
              <tr>
                <td>Student DOB :</td>
                <td><input type='text' name='s_dob' size='20'></td>
              </tr>
              <tr>
                <td>Student address :</td>
                <td><input type='text' name='s_addr' size='20'></td>
              </tr>
              <tr>
                <td colspan='2'>
                  <center><input type='submit' value='UPDATE'></center>
                </td>
              </tr>
            </table>
          </center>
        </div>
        <div class='column side'>
          <center> </center>
        </div>
      </div>
    </h2>
  </form>
  <div class='footer'>
    <h1><a href='index.html' class='active'>HOME</a></h1>
  </div>
</body>
</html>-->