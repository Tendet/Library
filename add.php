<?php
require "protector.php";
if ($_SESSION["role"] !="Admin")
{
    die("<h1 class='text-danger text-uppercase text-center'>Access denied</h1>");
}
$message="";
if (isset($_POST["title"]))
{
    extract($_POST);
    require "connect.php";
    $sql="INSERT INTO books VALUES (NULL , '$title', '$author', '$category', $price ,$quantity )";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
$message="<p class='text-success'>Book added</p>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Books</title>
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

<div class="col-sm-4 col-sm-offset-4">
    <h2 class="text-center">Add Books Here</h2>

    <form action="" method="post">

        <div class="form-group">
            <select name="category" class="form-control">
            <option value="English">English</option>
            <option value="Maths">Maths</option>
            <option value="Chemistry">Chemistry</option>
            <option value="Biology">Biology</option>
            <option value="History">History</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" required name="title" class="form-control" placeholder="Book title">
        </div>
        <div class="form-group">
            <input type="text" required name="author" class="form-control" placeholder="Book author">
        </div>

        <div class="form-group">
            <input type="number" required name="price" class="form-control" placeholder="Book price">
        </div>
        <div class="form-group">
            <input type="number" required name="quantity" class="form-control" placeholder="Book quantity">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

</div>



</body>
</html>