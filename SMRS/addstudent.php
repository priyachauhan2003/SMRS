<?php
require('header.php');
session_start();
?>
<!DOCtype html>
<html>

<head>
    <title>INSERT</title>
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
            background-color: #04AA6D;
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
    <form method="post" action="insert.php">
        <h4>
            <!--<div class="header">
                <strong>
                    <h1>Fill the form</h1>
                </strong>
            </div>
            <div class="topnav">
                <a href="index.html" class="active">HOME</a>
            </div>
            -->
            <div class="row">
                <div class="column side">

                    <img src="pic.png">
                </div>
                <div class="column middle">
                    <center>
                        <h2>Insert the record</h2>
                    </center>
                    <center>
                        <table>
                            <h3>
                                <tr>
                                    <td>Enter student Rollno:</td>
                                    <td><input type="int" name="s_rol" size="20" checked></td>
                                </tr>
                                <tr>
                                    <td>Enter student name:</td>
                                    <td><input type="text" name="s_name" size="20" checked></td>
                                </tr>
                                <tr>
                                    <td>Enter student Gender:</td>
                                    <td><input type="radio" name="s_gen" value="Male" checked>Male<br>
                                        <input type="radio" name="s_gen" value="FeMale">Female
                                    </td>
                                </tr>
                                <tr>
                                    <td>Enter student DOB:</td>
                                    <td><input type="date" name="s_dob" size="20" checked></td>
                                </tr>
                                <tr>
                                    <td>Enter student address:</td>
                                    <td><textarea name="s_addr" aria-checked="true"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <input type="submit" value="SUBMIT">
                                            <input type="reset" value="CLEAR">
                                        </center>
                                    </td>
                                </tr>
                            </h3>
                        </table>
                    </center>
                </div>
                <div class="column side">
                    <center><img src="images.jpg"></center>
                </div>
            </div>
        </h4>
    </form>
    <div class="footer">
        <h3> </h3>
    </div>
</body>

</html>