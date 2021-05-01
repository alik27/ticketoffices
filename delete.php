<?php
$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
$connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");

$link = sqlsrv_connect($serverName, $connectionInfo);

	$err = [];

if(isset($_GET['id-kassir'])){
    $sql = "SELECT [Код кассира] FROM Кассир WHERE [Код кассира]='".$_GET['id-kassir']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) != 0)
    {
        sqlsrv_query($link, "DELETE FROM Кассир WHERE [Код кассира]='".$_GET['id-kassir']."'");
        header("Location: aside-kassirs.php"); exit();

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
if(isset($_GET['id-punkt'])){
        $sql = "SELECT [код нас. пункта] FROM Населенные_пункты WHERE [код нас. пункта]='".$_GET['id-punkt']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) != 0)
    {
        sqlsrv_query($link, "DELETE FROM Населенные_пункты WHERE [код нас. пункта]='".$_GET['id-punkt']."'");
        header("Location: aside-punkt.php"); exit();

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
if(isset($_GET['bilet-punkt-otpr'])){
        $sql = "SELECT [№ билета] FROM Пункт_отправления WHERE [№ билета]='".$_GET['bilet-punkt-otpr']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) != 0)
    {
        sqlsrv_query($link, "DELETE FROM Пункт_отправления WHERE [№ билета]='".$_GET['bilet-punkt-otpr']."'");
        header("Location: aside-punkt-otpr.php"); exit();

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
if(isset($_GET['bilet-punkt-prib'])){
        $sql = "SELECT [№ билета] FROM Пункт_прибытия WHERE [№ билета]='".$_GET['bilet-punkt-prib']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) != 0)
    {
        sqlsrv_query($link, "DELETE FROM Пункт_прибытия WHERE [№ билета]='".$_GET['bilet-punkt-prib']."'");
        header("Location: aside-punkt-prib.php"); exit();

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
if(isset($_GET['id-priznak'])){
        $sql = "SELECT [Код признака] FROM [Признак типа участка маршрута] WHERE [Код признака]='".$_GET['id-priznak']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) != 0)
    {
        sqlsrv_query($link, "DELETE FROM [Признак типа участка маршрута] WHERE [Код признака]='".$_GET['id-priznak']."'");
        header("Location: aside-priznak.php"); exit();

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
if(isset($_GET['id-reis'])){
        $sql = "SELECT [№ рейса] FROM Расписание WHERE [№ рейса]='".$_GET['id-reis']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) != 0)
    {
        sqlsrv_query($link, "DELETE FROM Расписание WHERE [№ рейса]='".$_GET['id-reis']."'");
        header("Location: aside-raspisanie.php"); exit();

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
if(isset($_GET['id-marsh'])){
        $sql = "SELECT [№ рейса] FROM Маршрут WHERE [№ рейса]='".$_GET['id-marsh']."'
            and [признак типа участка маршрута]='".$_GET['priznak-uchastka']."'
            and [№ участка рейса]='".$_GET['id-uchastka-marsh']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

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
        sqlsrv_query($link, "DELETE FROM Маршрут WHERE [№ рейса]='".$_GET['id-marsh']."'
            and [признак типа участка маршрута]='".$_GET['priznak-uchastka']."'
            and [№ участка рейса]='".$_GET['id-uchastka-marsh']."'");
        header("Location: aside-marshrut.php"); exit();

    }
}
if(isset($_GET['id-vagon'])){
        $sql = "SELECT [Код типа вагона] FROM [Тип вагона] WHERE [Код типа вагона]='".$_GET['id-vagon']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

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
        sqlsrv_query($link, "DELETE FROM [Тип вагона] WHERE [Код типа вагона]='".$_GET['id-vagon']."'");
        header("Location: aside-vagon.php"); exit();

    }
}
if(isset($_GET['id-reis-mesta'])){
        $sql = "SELECT [№ рейса] FROM Места WHERE [№ рейса]='".$_GET['id-reis-mesta']."'
        and [№ вагона]='".$_GET['id-vagon-mesta']."'
        and [№ места]='".$_GET['id-mesta']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

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
        sqlsrv_query($link, "DELETE FROM Места WHERE [№ рейса]='".$_GET['id-reis-mesta']."'
        and [№ вагона]='".$_GET['id-vagon-mesta']."'
        and [№ места]='".$_GET['id-mesta']."'");
        header("Location: aside-mesta.php"); exit();

    }
}
if(isset($_GET['id-bilet'])){
        $sql = "SELECT [№ билета] FROM Билет WHERE [№ билета]='".$_GET['id-bilet']."'";
    $query = sqlsrv_query( $link, $sql);

if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

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
        sqlsrv_query($link, "DELETE FROM Билет WHERE [№ билета]='".$_GET['id-bilet']."'");
        header("Location: index.php"); exit();

    }
}

?>