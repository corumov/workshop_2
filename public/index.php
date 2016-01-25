<?php

header('Content-type: text/html; charset=utf-8');

require_once("../includes/database.php");
require_once("../includes/user.php");
//session_start();
//if(isset($_SESSION['user_id'])){
//    echo("User o id {$_SESSION['user_id']} zalogowany");
//}else{
//    header("login.php");
//    die();
//}
if (isset($db)) { echo "true";} else {echo "false"; }

echo $database->escape_string("it's working?");
echo "<br>";

//$sql = "INSERT INTO users (user_name, password, user_email) VALUES ('pawel_p1','{$db->encrypt_pass('coderslab')}', 'pawel.plusa1@op.pl')";
//echo "sql:".$sql."<br>";
//$result = $database->query($sql);


$test = $db->find_in_users_by_id(2);
var_dump($test);
echo $test['user_name'];
echo $test{'password'};
echo $db->compare_password("coderslab",$test["password"]);
echo "<hr>";
$test = $db->find_in_users_by_id(8);
var_dump($test);
echo $test['user_name'];
echo $test{'password'};
echo $db->compare_password("coderslab",$test["password"]);
echo "<hr>";
$test = $db->find_in_users_by_id(4);
echo $test{'password'};
echo $db->compare_password("coderslab",$test["password"]);
echo "<hr>";
$test = $db->find_in_users_by_id(5);
echo $test{'password'};
echo $db->compare_password("coderslab",$test["password"]);
echo "<hr>";
$test = $db->find_in_users_by_id(6);
echo $test{'password'};
echo $db->compare_password("coderslab",$test["password"]);
echo "<hr>";
//var_dump($db->find_one_record_in_users_by_value("user_email", "pawel.plusa@op.pl"));
echo "<hr>";
echo "test clasy user";
$user = new User();
$user->loadFromDB("pawel.plusa@op.pl");
echo "<hr>";
echo $user->getEmail();


