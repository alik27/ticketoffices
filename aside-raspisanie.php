<?php include_once ("header.php");?>
<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Расписание</h1>
      </div>

        <div class="table-responsive">
        <table class="table table-striped table-sm">
<?php
      $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");

      $link = sqlsrv_connect($serverName, $connectionInfo);
      $sql = "exec raspisanie1;";
      $query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ рейса</th>
              <th>день недели отправления</th>
              <th>время отправления</th>
              <th>день недели прибытия</th>
              <th>время прибытия</th>
              <th>время в пути</th>
              <th></th>
              <th></th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        for ($j = 0; $j < 6 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
        if (isset($_COOKIE['id']))
        {
        echo '<td><a href="edd.php?id-reis='.$row[0].'&amp;day-nedeli-otpr='.$row[1].'&amp;vrema-otpr='.$row[2].'&amp;day-nedeli-prib='.$row[3].'&amp;vrema-prib='.$row[4].'&amp;vrema-v-puty='.$row[5].'" class="nav-link px-2 link-secondary">Изменить</a></td>';
        echo '<td><a href="delete.php?id-reis='.$row[0].'" class="nav-link px-2 link-secondary">Удалить</a></td>';
      }
        echo "</tr><tbody>";
      }
      sqlsrv_free_stmt( $query);
      sqlsrv_close($link);
?>

        </table>
        <?php if (isset($_COOKIE['id'])): ?>
        <a href="add.php?id-reis=reis" class="nav-link px-2 link-secondary">Добавить</a>
        <a href="poisk.php?id-reis=reis" class="nav-link px-2 link-secondary">Поиск</a>
        <?php endif; ?>
      </div>
    </aside>
      </div>
</div>
</aside>
<?php include_once ("footer.php");?>