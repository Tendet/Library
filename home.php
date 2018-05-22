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
    <title>Add Books</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="libu/jquery.countTo.js"></script>
    <style>
        body{color: }
        .panel{background-color:#2aabd2;
            color: #c9302c;}

    </style>
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
    <h1>Numbers</h1>
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Books in our library</div>
                <div class="panel-body">
                    <?php
                    require "connect.php";
                    $sql = "select sum(quantity) as total_books from books";
                    $results = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($results);
                    extract($row);
                    ?>
                    <h2 class="users" data-from="0" data-to="<?php echo $total_books;?>" data-speed="3000"></h2>


                </div>
            </div>
        </div>
            <div class="col-sm-2">

                    <div class="panel panel-default">
                        <div class="panel-heading">Total Fines</div>
                        <div class="panel-body">

                            <?php
                            require "connect.php";
                            $sql = "select sum(fine)as total_fines from issues";
                            $results = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($results);
                            extract($row);
                            ?>
                           <h2 class="users" data-from="0" data-to="<?php echo $total_fines;?>" data-speed="3000"></h2>


                        </div>
                    </div>
                </div>
                <div class="col-sm-2">

                        <div class="panel panel-default">
                            <div class="panel-heading">Books Borrowed</div>
                            <div class="panel-body">


                                <?php
                                require "connect.php";
                                $sql = "select COUNT(id) as books_borrowed from books";
                                $results = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($results);
                                extract($row);
                                ?>
                                <h2 class="users" data-from="0" data-to="<?php echo $books_borrowed;?>" data-speed="3000"></h2>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">

                            <div class="panel panel-default">
                                <div class="panel-heading">No of users</div>
                                <div class="panel-body">
                                    <?php
                                    require "connect.php";
                                    $sql = "select COUNT(id) as total_users from users";
                                    $results = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($results);
                                    extract($row);
                                    ?>
                                    <h2 class="users" data-from="0" data-to="<?php echo $total_users;?>" data-speed="3000"></h2>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">

                                <div class="panel panel-default">
                                    <div class="panel-heading">Worth ofBooks</div>
                                    <div class="panel-body">
                                        <?php
                                        require "connect.php";
                                        $sql = "select sum(price) as total_price from books";
                                        $results = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($results);
                                        extract($row);
                                        ?>
                                        <h2 class="users" data-from="0" data-to="<?php echo $total_price;?>" data-speed="3000"></h2>


                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <script type="text/javascript">
                        $('.users').countTo();

                    </script>

</body>
</html>
