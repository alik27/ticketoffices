<?php
// Страница регистрации нового пользователя

// Соединямся с БД
$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

if(isset($_POST['kassir']))
{
    $sql = "SELECT [Код кассира] FROM Кассир WHERE [Код кассира]='".$_GET['id-kassir']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }

    }
    else
    {
        $fio = $_POST['fio'];

        sqlsrv_query($link,"UPDATE Кассир SET [ФИО кассира] = '".$fio."' WHERE [Код кассира]='".$_GET['id-kassir']."'");
        header("Location: aside-kassirs.php"); exit();
    }
}
if(isset($_POST['punkt']))
{
    $sql = "SELECT [код нас. пункта] FROM Населенные_пункты WHERE [код нас. пункта]='".$_GET['id-punkt']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }

    }
    else
    {
        $kod = $_POST['kod'];
        $punkt = $_POST['punkts'];

        sqlsrv_query($link,"UPDATE Населенные_пункты SET [код нас. пункта] = '".$kod."', наименование =  '".$punkt."' WHERE [код нас. пункта]='".$_GET['id-punkt']."'");
        header("Location: aside-punkt.php"); exit();
    }
}
if(isset($_POST['punkt-otpr']))
{
    $sql = "SELECT [№ билета] FROM Пункт_отправления WHERE [№ билета]='".$_GET['bilet-punkt-otprs']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }

    }
    else
    {
        $bilet= $_POST['bilet'];
        $id = $_POST['id'];

        sqlsrv_query($link,"UPDATE Пункт_отправления SET [№ билета] = '".$bilet."', [Код населенного пункта] =  '".$id."' WHERE [№ билета]='".$_GET['bilet-punkt-otprs']."'");
        header("Location: aside-punkt-otpr.php"); exit();
    }
}
if(isset($_POST['punkt-prib']))
{
    $sql = "SELECT [№ билета] FROM Пункт_прибытия WHERE [№ билета]='".$_GET['bilet-punkt-pribs']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }

    }
    else
    {
        $bilet= $_POST['bilet'];
        $id = $_POST['id'];

        sqlsrv_query($link,"UPDATE Пункт_прибытия SET [№ билета] = '".$bilet."', [Код населенного пункта] =  '".$id."' WHERE [№ билета]='".$_GET['bilet-punkt-pribs']."'");
        header("Location: aside-punkt-prib.php"); exit();
    }
}
if(isset($_POST['priznaks']))
{
    $sql = "SELECT [Код признака] FROM [Признак типа участка маршрута] WHERE [Код признака]='".$_GET['id-priznak']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }

    }
    else
    {
        sqlsrv_query($link,"UPDATE [Признак типа участка маршрута] SET [Код признака] = '".$_POST['kod']."', наименование =  '".$_POST['priznak']."' WHERE [Код признака]='".$_GET['id-priznak']."'");
        header("Location: aside-priznak.php"); exit();
    }
}
if(isset($_POST['reis']))
{
    $sql = "SELECT [№ рейса] FROM Расписание WHERE [№ рейса]='".$_GET['id-reis']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    else
    {
        sqlsrv_query($link,"UPDATE Расписание SET [день недели отправления] = '".$_POST['day-nedeli-otpr']."',
            [время отправления] =  '".$_POST['vrema-otpr']."',
            [день недели прибытия] =  '".$_POST['day-nedeli-prib']."',
            [время прибытия] =  '".$_POST['vrema-prib']."', [время в пути] =  '".$_POST['vrema-v-puty']."' WHERE [№ рейса]= '".$_GET['id-reis']."'");
        header("Location: aside-raspisanie.php"); exit();
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
    }
}
if(isset($_POST['marsh']))
{
    $sql = "SELECT [№ рейса] FROM Маршрут WHERE [№ рейса]='".$_GET['id-marsh']."'
            and [признак типа участка маршрута]='".$_GET['priznak-uchastka']."'
            and [№ участка рейса]='".$_GET['id-uchastka-marsh']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    else
    {
        sqlsrv_query($link,"UPDATE Маршрут SET [№ рейса]='".$_POST['id']."'
            , [признак типа участка маршрута]='".$_POST['priznak-uchastka']."'
            , [№ участка рейса]='".$_POST['id-uchastka-marsh']."'
            , [код нас. пункта]='".$_POST['name']."'
            , [километраж участка]='".$_POST['kilometr']."'
            , [время отправления]='".$_POST['vrema-otpr']."'
            WHERE [№ рейса]='".$_GET['id-marsh']."'
            and [признак типа участка маршрута]='".$_GET['priznak-uchastka']."'
            and [№ участка рейса]='".$_GET['id-uchastka-marsh']."'");
        header("Location: aside-marshrut.php"); exit();
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
    }
}
if(isset($_POST['mest']))
{
    $sql = "SELECT [№ рейса] FROM Места WHERE [№ рейса]='".$_GET['id-reis-mesta']."' and [№ вагона]='".$_GET['id-vagon-mesta']."' and [№ места]='".$_GET['id-mesta']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    else
    {
        sqlsrv_query($link,"UPDATE Места SET [№ рейса]='".$_POST['id-reis-mesta']."'
            , [№ вагона]='".$_POST['id-vagon-mesta']."'
            , [тип вагона]='".$_POST['tip-vagon']."'
            , [дата отправления]='".$_POST['date-otpr']."'
            , [№ места]='".$_POST['id-mesta']."'
            , признак='".$_POST['prizn']."'
            WHERE [№ рейса]='".$_GET['id-reis-mesta']."' and [№ вагона]='".$_GET['id-vagon-mesta']."' 
            and [№ места]='".$_GET['id-mesta']."'");
        header("Location: aside-mesta.php"); exit();
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
    }
}
if(isset($_POST['bil']))
{
    $sql = "SELECT [№ билета] FROM Билет WHERE [№ билета]='".$_GET['id-bilet']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    else
    {
        sqlsrv_query($link,"UPDATE Билет SET [№ рейса]='".$_POST['id-reis-bilet']."'
            , [признак продажи/возврата]='".$_POST['id-prizn-prod-bilet']."'
            , [дата продажи/возврата]='".$_POST['date-prob-bilet']."'
            , [дата отправления]='".$_POST['date-otpr-bilet']."'
            , [ФИО пассажира]='".$_POST['fio-pass-bilet']."'
            , [номер паспорта]='".$_POST['num-pasp-bilet']."'
            , [код кассира]='".$_POST['kassir-bilet']."'
            , сумма='".$_POST['summa']."'
            , [№ вагона]='".$_POST['id-vag']."'
            , [№ места]='".$_POST['id-mest']."'
            , [тип вагона]='".$_POST['tip-vagon-bilet']."'
            WHERE [№ билета]='".$_GET['id-bilet']."'");
        header("Location: index.php"); exit();
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
    }
}
?>