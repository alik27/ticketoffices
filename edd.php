<?php include_once ("header.php");?>
<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php 
        if(isset($_GET['id-kassir']))
        {
        echo '<h1 class="h2">Кассиры</h1>';
      }
      if(isset($_GET['id-punkt']))
      {
        echo '<h1 class="h2">Населенные пунт</h1>';
      }
      if(isset($_GET['bilet-punkt-otpr']))
      {
        echo '<h1 class="h2">Пункт отправления</h1>';
      }
      if(isset($_GET['bilet-punkt-prib']))
      {
        echo '<h1 class="h2">Пункт прибытия</h1>';
      }
      if(isset($_GET['id-priznak']))
      {
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
      if(isset($_GET['id-kassir']))
        {
      echo '<main class="container">
    <form action="check-edd.php?id-kassir='.$_GET['id-kassir'].'" method="post">
    <div class="form-floating">
      <input name="fio" type="fio" class="form-control"required="" autofocus="" value="'.$_GET['fio-kassir'].'">      
      <label for="floatingPassword">Изменить</label>
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="kassir">Изменить</button>
  </form>
</main>';
}
if(isset($_GET['id-punkt']))
{
  echo '<main class="container">
    <form action="check-edd.php?id-punkt='.$_GET['id-punkt'].'" method="post">
    <div class="form-floating">
      <input name="kod" class="form-control" required="" value="'.$_GET['id-punkt'].'">      
      <input name="punkts" class="form-control" required="" value="'.$_GET['name-punkt'].'">      
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt">Изменить</button>
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
    <form action="check-edd.php?bilet-punkt-otprs='.$_GET['bilet-punkt-otpr'].'" method="post">
    <div class="form-floating">
      <select size="3" multiple name="bilet">';
      echo '<option selected>'.$_GET['bilet-punkt-otpr'].'</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>    
      <select size="3" multiple name="id">';
      echo '<option selected>'.$_GET['id-punkt-otpr'].'</option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>    
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt-otpr">Изменить</button>
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
    <form action="check-edd.php?bilet-punkt-pribs='.$_GET['bilet-punkt-prib'].'" method="post">
    <div class="form-floating">
      <select size="3" multiple name="bilet">';
      echo '<option selected>'.$_GET['bilet-punkt-prib'].'</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>     
      <select size="3" multiple name="id">';
      echo '<option selected>'.$_GET['id-punkt-prib'].'</option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>    
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt-prib">Изменить</button>
  </form>
</main>';
}
if(isset($_GET['id-priznak']))
{
  echo '<main class="container">
    <form action="check-edd.php?id-priznak='.$_GET['id-priznak'].'" method="post">
    <div class="form-floating">
      <input name="kod" class="form-control" required="" value="'.$_GET['id-priznak'].'">      
      <select size="3" multiple name="priznak">
      <option selected>'.$_GET['name-priznak'].'</option>
      <option>начальный</option>
      <option>промежуточный</option>
      <option>конечный</option>
      </select>      
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="priznaks">Изменить</button>
  </form>
</main>';
}
if(isset($_GET['id-reis']))
{
  echo '<main class="container">
    <form action="check-edd.php?id-reis='.$_GET['id-reis'].'" method="post">
    <div class="form-floating">
      <input name="day-nedeli-otpr" class="form-control" required="" value="'.$_GET['day-nedeli-otpr'].'">
      <input name="vrema-otpr" class="form-control" required="" value="'.$_GET['vrema-otpr'].'">
      <input name="day-nedeli-prib" class="form-control" required="" value="'.$_GET['day-nedeli-prib'].'">
      <input name="vrema-prib" class="form-control" required="" value="'.$_GET['vrema-prib'].'"> 
      <input name="vrema-v-puty" class="form-control" required="" value="'.$_GET['vrema-v-puty'].'">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="reis">Изменить</button>
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
    <form action="check-edd.php?id-marsh='.$_GET['id-marsh'].'&amp;priznak-uchastka='.$_GET['priznak-uchastka'].'&amp;id-uchastka-marsh='.$_GET['id-uchastka-marsh'].'" method="post">
    <div class="form-floating">
<select size="2" multiple name="id">';
      echo '<option selected>'.$_GET['id-marsh'].'</option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
             <select size="2" multiple name="priznak-uchastka">';
      echo '<option selected>'.$_GET['priznak-uchastka'].'</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
            <select size="2" multiple name="id-uchastka-marsh">';
      echo '<option selected>'.$_GET['id-uchastka-marsh'].'</option>';
      echo '<option>1</option>';
      echo '<option>2</option>';
      echo '<option>3</option>';
      echo '</select>
            <select size="2" multiple name="name">';
      echo '<option selected>'.$_GET['name'].'</option>';
      while ($row = sqlsrv_fetch_array($query3)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="kilometr" class="form-control" required="" value="'.$_GET['kilometr'].'">
            <select size="2" multiple name="vrema-otpr">';
      echo '<option selected>'.$_GET['vrema-otpr'].'</option>';
      while ($row = sqlsrv_fetch_array($query2)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>       
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="marsh">Изменить</button>
  </form>
</main>';
}
if(isset($_GET['id-reis-mesta']))
{
    $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
      $link = sqlsrv_connect($serverName, $connectionInfo);

      $sql = "exec raspisanie2;";
      $query = sqlsrv_query( $link, $sql);
      $sql1 = "exec vagon2;";
      $query1 = sqlsrv_query( $link, $sql1);

  echo '<main class="container">
    <form action="check-edd.php?id-reis-mesta='.$_GET['id-reis-mesta'].'&amp;id-vagon-mesta='.$_GET['id-vagon-mesta'].'&amp;id-mesta='.$_GET['id-mesta'].'" method="post">
    <div class="form-floating">
          <select size="3" multiple name="id-reis-mesta">';
      echo '<option selected>'.$_GET['id-reis-mesta'].'</option>';
      while ($row = sqlsrv_fetch_array($query)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="id-vagon-mesta" class="form-control" required="" value="'.$_GET['id-vagon-mesta'].'">
          <select size="3" multiple name="tip-vagon">';
      echo '<option selected>'.$_GET['tip-vagon'].'</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="date-otpr" class="form-control" required="" value="'.$_GET['date-otpr'].'">  
      <input name="id-mesta" class="form-control" required="" value="'.$_GET['id-mesta'].'">
        <select size="3" multiple name="prizn">';
      echo '<option selected>продано</option>';
      echo '<option>свободно</option>';
      echo '</select>   
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="mest">Изменить</button>
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
    <form action="check-edd.php?id-bilet='.$_GET['id-bilet'].'" method="post">
    <div class="form-floating">
          <select size="3" multiple name="id-reis-bilet">';
      echo '<option selected>'.$_GET['id-reis-bilet'].'</option>';
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
      <input name="date-prob-bilet" class="form-control" required="" value="'.$_GET['date-prob-bilet'].'">
      <input name="date-otpr-bilet" class="form-control" required="" value="'.$_GET['date-otpr-bilet'].'">
      <input name="fio-pass-bilet" class="form-control" required="" value="'.$_GET['fio-pass-bilet'].'">
      <input name="num-pasp-bilet" class="form-control" required="" value="'.$_GET['num-pasp-bilet'].'">
          <select size="3" multiple name="kassir-bilet">';
      echo '<option selected>'.$_GET['kassir-bilet'].'</option>';
      while ($row = sqlsrv_fetch_array($query2)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
      <input name="summa" class="form-control" required="" value="'.$_GET['summa'].'">
      <input name="id-mest" class="form-control" required="" value="'.$_GET['id-mest'].'">
        <select size="3" multiple name="tip-vagon-bilet">';
      echo '<option selected>'.$_GET['tip-vagon-bilet'].'</option>';
      while ($row = sqlsrv_fetch_array($query1)) 
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row[$j].'</option>';
          }
        }
    echo '</select>
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="bil">Изменить</button>
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