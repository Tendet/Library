<?php
require "connect.php";
$sql="select *from books limit 2";
$result=mysqli_query($conn,$sql);
$data=[];
while ($row=mysqli_fetch_assoc($result))
{
    $data[] = $row;
}
 header("Connect-type:application/json");
echo json_encode($data);