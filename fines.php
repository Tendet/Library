<?php
require "protector.php";

if ($_SESSION["role"] !="Admin")
{
    die("<h1 class='text-danger text-uppercase text-center'>Access denied</h1>");
}

if (isset($_GET["id"]))
{
    extract($_GET);
    require "connect.php";
    $sql="update issues set status='cleared' WHERE borrower_id='$id'";
    mysqli_query($conn,$sql);


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
    <link rel="stylesheet" href="datatables/css/jquery.datatables.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="datatables/js/jquery.datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sample').DataTable();
        } );

    </script>
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
    <table class="table" id="sample">
        <thead>
        <tr>
            <th>ID</th>
            <th>BORROWER_ID</th>
            <th>TOTAL FINE</th>
            <th>CLEAR</th>

        </tr>
        </thead>
        <tbody>



        <?php
        require "connect.php";
        $sql="SELECT id,borrower_id,SUM(fine) as total FROM issues WHERE  status!=cleared GROUP BY borrower_id";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        while ($row=mysqli_fetch_assoc($result))
        {
            extract($row);
            echo "
        <tr>
            <td>$id</td>
            <td>$borrower_id</td>
           <td>$total</td>
            <td><a class='btn btn-info btn-sm' href='fines.php?id=$borrower_id'>Clear Book</a></td>
        </tr>";
        }
        ?>


        </tbody>




    </table>







</div>




</body>
</html>
