<!DOCtype html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: #04AA6D;
    }
  </style>
</head>

<body>
  <!--<header style="color:darkorchid; border-left: 6px solid; border-color:#AD02D6; background-color: rgb(228, 168, 228);">
    <h1 style="color:blueviolet"><center><img src="premium-student-icon-download-png-369774.png" width="30px">Students Record Management System</center></h1>
    </header>-->
  <div class="w3-container w3-teal">
    <h1>
      <center>Student Record Management System</center>
    </h1>
  </div>
  <ul>
    <li><a href="" class="active">Menu</a></li>
    <li><a href="addstudent.php">Add Student</a></li>
    <!--<li><a href="updatestudent.php">Update Student Record</a></li>-->
    <li><a href="showstudent.php">Show all Students</a></li>
    <!--<li><a href="delstudent.php">Delete Student</a></li>-->
    <li><a href="searchstudent.php">Search Student</a></li>
    <li><a href="index.html">Home</a></li>
  </ul>


</body>

</html>