<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "game_db";
$website = "http://venci.bg"; //this var set <form> action

$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");
if($conn === false){
    die("ERROR: Lost connection to database");
}

$sql="SELECT ipaddress FROM users";
$result=mysqli_query($conn,$sql);
$arr = Array();
while($coll = mysqli_fetch_assoc($result)){
    $arr[] = $coll['ipaddress'];
}
$jsArray = json_encode($arr);

?>