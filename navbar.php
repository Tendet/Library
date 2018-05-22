
<ul class="nav navbar-nav">
    <?php
    if ($_SESSION["role"]=="Admin")
    {
        echo '<li ><a href="home.php">Dashboard</a></li>';
        echo '<li ><a href="add.php">Add Books</a></li>';
        echo '<li ><a href="fines.php">Fines</a></li>';
        echo '<li ><a href="roles.php">Roles</a></li>';
        echo '<li ><a href="register.php"> Add user</a></li>';
    }
    ?>


            <li><a href="return.php">Return Books</a></li>
    <li><a href="issue.php">Issue Books</a></li>

        </ul>

<ul class="nav navbar-nav navbar-right">
    <li><a href="#"><?php echo  $_SESSION["names"];?></a></li>
    <li><a href="logout.php">Log out</a></li>

</ul>
