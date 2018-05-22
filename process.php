<?php
require "protector.php";
$message="";
if (isset($_GET["id"]))
{
    extract($_GET);
}

if (isset($_POST["book_id"]))
{
    extract($_POST);//
    $borrow_date=date("Y-m-d");
    $date=strtotime("+7 day",time());
    $expected_return=date("Y-m-d",$date);
    require "connect.php";
    $sql_check="select *from issues where borrower_id='$borrower_id'and status='pending'";
    $result=mysqli_query($conn,$sql_check) or die(mysqli_error($conn));
    $number=mysqli_num_rows($result);
    $pattern="/^[A-Z][0-9]{2}[\/][0-9]{4}$/";
    if ($number>0)
    {
        $message="<h2 class='text-danger'>you have a pending book</h2>";
    }
    elseif (!preg_match($pattern,$borrower_id))
    {
      $message="Invalid id number fomrat" ;
    }
    else
        {
            $sql="INSERT INTO `issues`( `borrower_id`, `book_id`, `borrow_date`, `expected_return`) VALUES ('$borrower_id',$book_id,'$borrow_date','$expected_return')";
            $result=mysqli_query($conn,$sql);
            if ($result)
                $message="Book issued";
            else
                $message="failed to save";
        }
}


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

<div class="col-sm-4 col-sm-offset-4">
    <h2 class="text-center">
        <?php
        echo "$title";
        ?>

    </h2>

    <?php
    echo "$message";
    ?>

    <form role="form" action="" method="post">
        <input type="hidden" name="book_id" value="<?php echo $id?>">
        <div class="form-group">
            <input type="text" required name="borrower_id" class="form-control" placeholder="Borrower id">
</div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

</div>


</body>
</html>