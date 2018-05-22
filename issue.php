<?php
require "protector.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Issue Books</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Library sytem</a>
        </div>
        <?php
        include "navbar.php";
        ?>
    </div>
</nav>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>CATEGORY</th>
            <th>ACTION</th>


        </tr>
        </thead>
        <tbody>



        <?php
        require "connect.php";
        $sql="select *from books";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result))
        {
            extract($row);
            echo "
        <tr>
            <td>$id</td>
            <td>$title</td>
            <td>$author</td>
            <td>$category</td>
            <td><a href='process.php?id=$id&title=$title'>Issue Book</a></td>
        </tr>";
        }
        ?>


        </tbody>




    </table>







</div>


</body>
</html>
