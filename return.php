<?php
require "protector.php";
if (isset($_GET["id"]))
{
    require "connect.php";
    extract($_GET);
    $sql="select * from issues WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    extract($row);
    $today=date("Y-m-d");

    $time1=strtotime($today);
    $time2=strtotime($borrow_date);

    $diff=$time1-$time2;

    $days=$diff/(60*60*24);
    $days=round($days);
    $fine=0;
    if ($days>7)
    {
        $fine=($days-7)*100;

    }
    $sql="update issues set actual_return='$today',fine=$fine, status='Returned' WHERE  id=$id";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
}
if (isset($_GET["lost_id"]))
{
    require "connect.php";
    extract($_GET);
    $update="update books set quantity=quantity-1 where id=$bookid";
    $update2="update issues set status='Lost' where id=$lost_id";
    mysqli_query($conn,$update) or die(mysqli_error($conn));
    mysqli_query($conn,$update2) or die(mysqli_error($conn));
    header("location:return.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Return  Books</title>
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
            <th>BORROWER_ID</th>
            <th>BORROW DATE</th>
            <th>EXPECTED RETURN</th>
            <th>ACTION</th>
            <th>LOST</th>


        </tr>
        </thead>
        <tbody>



        <?php
        require "connect.php";
        $sql="SELECT books.id as bookid,books.title, issues.id,issues.
borrower_id,issues.borrow_date,issues.expected_return
 FROM books JOIN issues ON books.id=issues.book_id
 WHERE issues.status='Pending'";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        while ($row=mysqli_fetch_assoc($result))
        {
            extract($row);
            echo "
        <tr>
            <td>$id</td>
            
           <td>$borrower_id</td>
            <td>$borrow_date</td>
            <td>$expected_return</td>
            <td><a class='btn btn-info btn-sm' href='return.php?id=$id'>Return Book</a></td>
            <td><a class='btn btn-danger btn-sm' href='return.php?lost_id=$id&bookid=$bookid'>Lost</a></td>
        </tr>";
        }
        ?>


        </tbody>




    </table>







</div>




</body>
</html>
