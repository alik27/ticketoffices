<?php

$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

if(isset($_POST['kassir'])){
	$err = [];

    $sql = "SELECT [ФИО кассира] FROM Кассир WHERE [ФИО кассира]='".$_POST['fio']."'";
    $query = sqlsrv_query( $link, $sql);
	
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
    	$fio = $_POST['fio'];
    	sqlsrv_query($link,"INSERT INTO Кассир ([ФИО кассира]) VALUES ('".$fio."')");
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
if(isset($_POST['punkt'])){
    $err = [];

    $sql = "SELECT [код нас. пункта] FROM Населенные_пункты WHERE [код нас. пункта]='".$_POST['kod']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO Населенные_пункты ([код нас. пункта],наименование) VALUES ('".$_POST['kod']."','".$_POST['name']."')");
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
if(isset($_POST['punkt-otpr'])){
    $err = [];

    $sql = "SELECT [№ билета] FROM Пункт_отправления WHERE [№ билета]='".$_GET['bilet-punkt-otprs']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO Пункт_отправления ([№ билета],[Код населенного пункта]) VALUES ('".$_POST['bilet']."','".$_POST['id']."')");
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
if(isset($_POST['punkt-prib'])){
    $err = [];

    $sql = "SELECT [№ билета] FROM Пункт_прибытия WHERE [№ билета]='".$_GET['bilet-punkt-prib']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO Пункт_прибытия ([№ билета],[Код населенного пункта]) VALUES ('".$_POST['bilet']."','".$_POST['id']."')");
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
if(isset($_POST['priznak'])){
    $err = [];

    $sql = "SELECT [Код признака] FROM [Признак типа участка маршрута] WHERE [Код признака]='".$_GET['id-priznak']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO [Признак типа участка маршрута] ([Код признака],наименование) VALUES ('".$_POST['kod']."','".$_POST['name']."')");
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
if(isset($_POST['reis'])){
    $err = [];

    $sql = "SELECT [№ рейса] FROM Расписание WHERE [день недели отправления]='".$_POST['day-nedeli-otpr']."' 
    and [время отправления]='".$_POST['vrema-otpr']."' 
    and [день недели прибытия]='".$_POST['day-nedeli-prib']."' 
    and [время прибытия]='".$_POST['vrema-prib']."'
    and [время в пути]='".$_POST['vrema-v-puty']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO Расписание ([день недели отправления],[время отправления],[день недели прибытия],[время прибытия],[время в пути]) 
            VALUES ('".$_POST['day-nedeli-otpr']."','".$_POST['vrema-otpr']."','".$_POST['day-nedeli-prib']."','".$_POST['vrema-prib']."','".$_POST['vrema-v-puty']."')");
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
if(isset($_POST['marsh'])){
    $err = [];

    $sql = "SELECT [№ рейса] FROM Маршрут WHERE [№ рейса]='".$_POST['id']."'
            and [признак типа участка маршрута]='".$_POST['priznak-uchastka']."'
            and [№ участка рейса]='".$_POST['id-uchastka-marsh']."'
            and [код нас. пункта]='".$_POST['name']."'
            and [километраж участка]='".$_POST['kilometr']."'
            and [время отправления]='".$_POST['vrema-otpr']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO Маршрут ([№ рейса],[признак типа участка маршрута],[№ участка рейса],
            [код нас. пункта],[километраж участка],[время отправления]) 
            VALUES ('".$_POST['id']."','".$_POST['priznak-uchastka']."','".$_POST['id-uchastka-marsh']."','".$_POST['name']."',
            '".$_POST['kilometr']."','".$_POST['vrema-otpr']."')");
            header("Location: aside-marshrut.php"); exit();
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
if(isset($_POST['vagon'])){
    $err = [];

    $sql = "SELECT [Код типа вагона] FROM [Тип вагона] WHERE [Код типа вагона]='".$_POST['id']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO [Тип вагона] ([Код типа вагона],наименование,[количество мест в вагоне]) 
            VALUES ('".$_POST['id']."','".$_POST['names']."','".$_POST['kol']."')");
            header("Location: aside-vagon.php"); exit();
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
if(isset($_POST['mest'])){
    $err = [];

    $sql = "SELECT [№ рейса] FROM Места WHERE [№ рейса]='".$_POST['id-reis-mesta']."' and [№ вагона]='".$_POST['id-vagon-mesta']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
        sqlsrv_query($link,"INSERT INTO Места ([№ рейса],[№ вагона],[тип вагона],[дата отправления],[№ места],признак) 
            VALUES ('".$_POST['id-reis-mesta']."','".$_POST['id-vagon-mesta']."'
            ,'".$_POST['tip-vagon']."','".$_POST['date-otpr']."'
            ,'".$_POST['id-mesta']."','".$_POST['prizn']."')");
            header("Location: aside-mesta.php"); exit();
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
if(isset($_POST['bil'])){
    $err = [];

    $sql = "SELECT [номер паспорта] FROM Билет WHERE [номер паспорта]='".$_POST['num-pasp-bilet']."'";
    $query = sqlsrv_query( $link, $sql);
    
if(sqlsrv_fetch_array($query) > 0)
        $err[] = "Пользователь уже существует в базе данных";

    if(count($err) == 0)
    {
sqlsrv_query($link,"INSERT INTO Билет ([№ рейса],[признак продажи/возврата],[дата продажи/возврата],[дата отправления],[ФИО пассажира],[номер паспорта],[код кассира],сумма,[№ вагона],[№ места],[тип вагона]) VALUES ('".$_POST['id-reis-bilet']."','".$_POST['id-prizn-prod-bilet']."','".$_POST['date-prob-bilet']."','".$_POST['date-otpr-bilet']."','".$_POST['fio-pass-bilet']."','".$_POST['num-pasp-bilet']."','".$_POST['kassir-bilet']."','".$_POST['summa']."','".$_POST['id-vag']."','".$_POST['id-mest']."','".$_POST['tip-vagon-bilet']."')");
header("Location: index.php"); exit();
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
?>