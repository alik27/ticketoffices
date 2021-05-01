<?php
// Страница регистрации нового пользователя

// Соединямся с БД
$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");

      $link = sqlsrv_connect($serverName, $connectionInfo);

if(isset($_POST['submit']))
{
    $err = [];

    $sql = "SELECT id FROM users WHERE email='".$_POST['email']."'";
    $query = sqlsrv_query( $link, $sql);

    if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $email = $_POST['email'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $password = crypt($_POST['password'], '$1$rasmusle$');

        sqlsrv_query($link,"INSERT INTO users (email, password) VALUES ('".$email."','".$password."')");
        header("Location: aside-auto.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    sqlsrv_free_stmt( $query);
    sqlsrv_close($link);
}
?>