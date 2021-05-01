<?php include_once ("header.php");?>
<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php 
        if(isset($_GET['id'])){
          echo '<h1 class="h2">Кассиры</h1>';
        }
        if(isset($_GET['id-punkt'])){
          echo '<h1 class="h2">Населенные пункты</h1>';
        }
        if(isset($_GET['bilet-punkt-otpr'])){
          echo '<h1 class="h2">Пункт отправления</h1>';
        }
        if(isset($_GET['bilet-punkt-prib'])){
          echo '<h1 class="h2">Пункт прибытия</h1>';
        }
        if(isset($_GET['id-priznak'])){
          echo '<h1 class="h2">Признак типа участка маршрута</h1>';
        }
        if(isset($_GET['id-reis']))
        {
        echo '<h1 class="h2">Расписание</h1>';
        }
        if(isset($_GET['id-marsh']))
        {
          echo '<h1 class="h2">Маршрут</h1>';
        }
        if(isset($_GET['id-vagon']))
        {
          echo '<h1 class="h2">Тип вагона</h1>';
        }
        if(isset($_GET['id-m']))
        {
          echo '<h1 class="h2">Места</h1>';
        }
        if(isset($_GET['id-bilet']))
        {
          echo '<h1 class="h2">Билеты</h1>';
        }

        ?>
      </div>
        <div class="table-responsive">
        <table class="table table-striped table-sm">

<?php 
if(isset($_GET['id'])){
      echo '<main class="container">
    <form action="check-add.php" method="post">
    <div class="form-floating">
      <input name="fio" type="fio" class="form-control"required="">      
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="kassir">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-punkt']))
{
    echo '<main class="container">
    <form action="check-add.php?id-punkt='.$_GET['id-punkt'].'" method="post">
    <div class="form-floating">
      <input name="kod" class="form-control" required="">
      <input name="name" class="form-control"required="">           
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['bilet-punkt-otpr']))
{
  $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

      $sql = "exec punktotpr2;";
      $query = sqlsrv_query( $link, $sql);
      $sql1 = "exec bilet2;";
      $query1 = sqlsrv_query( $link, $sql1);

    echo '<main class="container">
    <form action="check-add.php?bilet-punkt-otprs='.$_GET['bilet-punkt-otpr'].'" method="post">
    <div class="form-floating">
      <select size="3" multiple name="bilet">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
     echo '</select>         
     <select size="3" multiple name="id">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>    
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt-otpr">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['bilet-punkt-prib']))
{
  $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

      $sql = "exec punktotpr2;";
      $query = sqlsrv_query( $link, $sql);
      $sql1 = "exec bilet2;";
      $query1 = sqlsrv_query( $link, $sql1);

    echo '<main class="container">
    <form action="check-add.php?bilet-punkt-pribs='.$_GET['bilet-punkt-prib'].'" method="post">
    <div class="form-floating"> 
      <select size="3" multiple name="bilet">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
     echo '</select>        
     <select size="3" multiple name="id">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>    
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt-prib">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-priznak']))
{
    echo '<main class="container">
    <form action="check-add.php?id-punkt='.$_GET['id-priznak'].'" method="post">
    <div class="form-floating">
      <input name="kod" class="form-control" required="">
      <select size="3" multiple name="name">';
      echo '<option selected>начальный</option>';
      echo '<option>промежуточный</option>';
      echo '<option>конечный</option>';
      echo '</select>           
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="priznak">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-reis']))
{
  echo '<main class="container">
    <form action="check-add.php?id-reis='.$_GET['id-reis'].'" method="post">
    <div class="form-floating">
      <input name="day-nedeli-otpr" class="form-control" required="" value="Пн">
      <input name="vrema-otpr" class="form-control" required="" value="10:00:00">
      <input name="day-nedeli-prib" class="form-control" required="" value="Вт">
      <input name="vrema-prib" class="form-control" required="" value="09:00:00"> 
      <input name="vrema-v-puty" class="form-control" required="" value="23:00:00">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="reis">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-marsh']))
{
  $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

      $sql = "exec raspisanie2;";
      $query = sqlsrv_query( $link, $sql);
      $sql1 = "exec priznak2;";
      $query1 = sqlsrv_query( $link, $sql1);
      $sql2 = "exec raspisanie3;";
      $query2 = sqlsrv_query( $link, $sql2);
      $sql3 = "exec punktotpr2;";
      $query3 = sqlsrv_query( $link, $sql3);

  echo '<main class="container">
    <form action="check-add.php?id-marsh='.$_GET['id-marsh'].'" method="post">
    <div class="form-floating">
         <select size="2" multiple name="id">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
             <select size="2" multiple name="priznak-uchastka">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
            <select size="2" multiple name="id-uchastka-marsh">';
      echo '<option selected>1</option>';
      echo '<option>2</option>';
      echo '<option>3</option>';
      echo '</select>
            <select size="2" multiple name="name">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query3)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="kilometr" class="form-control" required="" value="24">
            <select size="2" multiple name="vrema-otpr">';
      echo '<option selected></option>';
      while ($row = sqlsrv_fetch_array($query2)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>        
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="marsh">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-vagon']))
{
  echo '<main class="container">
    <form action="check-add.php?id-punkt='.$_GET['id-vagon'].'" method="post">
    <div class="form-floating">
      <input name="id" class="form-control" required="" value="3К">      
      <input name="names" class="form-control" required="" value="Купеиный">      
      <input name="kol" class="form-control" required="" value="36">  
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="vagon">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-m']))
{
    $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

      $sql = "exec raspisanie2;";
      $query = sqlsrv_query( $link, $sql);
      $sql1 = "exec vagon2;";
      $query1 = sqlsrv_query( $link, $sql1);

  echo '<main class="container">
    <form action="check-add.php" method="post">
    <div class="form-floating">
          <select size="3" multiple name="id-reis-mesta">';
      echo '<option selected>1</option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="id-vagon-mesta" class="form-control" required="" value="1">
          <select size="3" multiple name="tip-vagon">';
      echo '<option selected>1A</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="date-otpr" class="form-control" required="" value="2020-11-21">  
      <input name="id-mesta" class="form-control" required="" value="1">
        <select size="3" multiple name="prizn">';
      echo '<option selected>продано</option>';
      echo '<option>свободно</option>';
      echo '</select>   
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="mest">Добавить</button>
  </form>
</main>';
}
if(isset($_GET['id-bilet']))
{
    $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

      $sql = "exec raspisanie2;";
      $query = sqlsrv_query( $link, $sql);
      $sql1 = "exec vagon2;";
      $query1 = sqlsrv_query( $link, $sql1);
      $sql2 = "exec kassirs2;";
      $query2 = sqlsrv_query( $link, $sql2);

  echo '<main class="container">
    <form action="check-add.php" method="post">
    <div class="form-floating">
          <select size="3" multiple name="id-reis-bilet">';
      echo '<option selected>1</option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
          <select size="3" multiple name="id-prizn-prod-bilet">';
      echo '<option selected>возврат</option>';
      echo '<option>продажа</option>';
      echo '</select>
      <input name="date-prob-bilet" class="form-control" required="" value="2020-10-01">
      <input name="date-otpr-bilet" class="form-control" required="" value="2020-11-21">
      <input name="fio-pass-bilet" class="form-control" required="" value="Альтмеров Ферри Зимерович">
      <input name="num-pasp-bilet" class="form-control" required="" value="255222">
          <select size="3" multiple name="kassir-bilet">';
      echo '<option selected>1</option>';
      while ($row = sqlsrv_fetch_array($query2)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="summa" class="form-control" required="" value="5000">  
      <input name="id-vag" class="form-control" required="" value="1">
      <input name="id-mest" class="form-control" required="" value="1">
        <select size="3" multiple name="tip-vagon-bilet">';
      echo '<option selected>1A</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="bil">Добавить</button>
  </form>
</main>';
}

?>
        </table>
      </div>
    </aside>
      </div>
</div>
</aside>
<?php include_once ("footer.php");?>