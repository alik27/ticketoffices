<?php
// Страница регистрации нового пользователя

// Соединямся с БД
$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

if(isset($_POST['submit']))
{
    $sql = "SELECT id, password FROM users WHERE email='".$_POST['email']."'";
    $query = sqlsrv_query( $link, $sql);
    $data = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);

// Сравниваем пароли
    if($data['password'] === crypt($_POST['password'], '$1$rasmusle$'))
    {

        // Ставим куки
        setcookie("id", $data['id'], time()+60*60*24*30, "/");

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
    sqlsrv_free_stmt( $query);
    sqlsrv_close($link);
}
?>