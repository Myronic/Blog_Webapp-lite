<?php
//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
echo (mysqli_connect_errno())? 'failed to connect to mysql '.mysqli_connect_errno() : '';
?>
