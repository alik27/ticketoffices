<?php
// Скрипт проверки
// Соединямся с БД
$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

if (isset($_COOKIE['id']))
{
    $query = sqlsrv_query($link, "SELECT * FROM users WHERE id = '".$_COOKIE['id']."'");
    $userdata = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);

    if($userdata['id'] == $_COOKIE['id'])
    {
        header("Location: index.php"); exit();
    }
    else
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось".$_COOKIE['id'];
        
    }
}
else
{
    print "Включите куки";
}
?>