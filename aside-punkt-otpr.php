<?php include_once ("header.php");?>
<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пункт отправления</h1>
      </div>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
<?php
      $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");

      $link = sqlsrv_connect($serverName, $connectionInfo);
      $sql = "exec punktotpr1;";
      $query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ билета</th>
              <th>Код населенного пункта</th>
              <th></th>
              <th></th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        for ($j = 0; $j < 2 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
         echo '<td><a href="edd.php?bilet-punkt-otpr='.$row[0].'&amp;id-punkt-otpr='.$row[1].'" class="nav-link px-2 link-secondary">Изменить</a></td>';
        echo '<td><a href="delete.php?bilet-punkt-otpr='.$row[0].'" class="nav-link px-2 link-secondary">Удалить</a></td>';
        echo "</tr><tbody>";
      }
      sqlsrv_free_stmt($query);
      sqlsrv_close($link);
?>
        </table>
        <a href="add.php?bilet-punkt-otpr=npunkt" class="nav-link px-2 link-secondary">Добавить</a>
      </div>
    </aside>
      </div>
</div>
</aside>
<?php include_once ("footer.php");?>