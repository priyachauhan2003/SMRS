<?php
require('header.php');
session_start();  ?>
<!DOCtype html>
<html>

<head>
  <title>DELETE</title>
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
      ;
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
      padding: 50px;
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

<body>
  <center><?php
          if (isset($_SESSION["actionstatus"]) && !empty(isset($_SESSION["actionstatus"]))) {
            echo $_SESSION["actionstatus"];
          }
          ?></center>
  <form method="POST" action="delete.php">
    <h4>
      <!--<div class="header">
        <center><h2>Delete student record</h2></center>
        </div>
      -->
      <div class="row">
        <div class="column side">

          <img src="" width="110%">
        </div>
        <div class="column middle">
          <center>
            <h2>Delete student record:</h2>
          </center>
          <center>
            <table>
              <tr>
                <td>Student rollno :</td>
                <td><input type="int" name="s_rol" size="20" checked></td>
              </tr>

              <td>Student name :</td>
              <td><input type="text" name="s_name" size="20"></td>
              </tr>

              <tr>
                <td colspan="2">
                  <center><input type="submit" value="DELETE"></center>
                </td>
              </tr>
            </table>
          </center>
        </div>
        <div class="column side">
          <center><img src=" " width="100%"></center>
        </div>
      </div>
    </h4>
  </form>

  <br>
  <br>
  <br>
  <br>
  <br>

  <div class="footer">
    <h1> </h1>
  </div>
</body>

</html>