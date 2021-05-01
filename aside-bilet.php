<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Билеты</h1>
      </div>

        <div class="table-responsive">
        <table class="table table-striped table-sm">
<?php
      $serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
      $connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");

      $link = sqlsrv_connect($serverName, $connectionInfo);
      if (isset($_COOKIE['id'])){$sql = "exec bilet3;";}
      else{$sql = "exec bilet1;";}

      $query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ билета</th>
              <th>№ рейса</th>
              <th>Признак продажи/возврата</th>
              <th>Дата продажи/возврата</th>
              <th>Дата отправления</th>";
      if (isset($_COOKIE['id']))
      {
              echo "<th>ФИО пассажира</th>
              <th>Номер паспорта</th>
              <th>Код кассира</th>";
      }
              echo "<th>Сумма</th>
              <th>№ вагона</th>
              <th>№ места</th>
              <th>Тип вагона</th>
              <th></th>
              <th></th>
            </tr>
          </thead>";


      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if (isset($_COOKIE['id'])){
        for ($j = 0; $j < 12 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
      else
      {
        for ($j = 0; $j < 9 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        if (isset($_COOKIE['id']))
        {
          echo '<td><a href="edd.php?id-bilet='.$row[0].'&amp;id-reis-bilet='.$row[1].'&amp;id-prizn-prod-bilet='.$row[2].'&amp;date-prob-bilet='.$row[3].'&amp;date-otpr-bilet='.$row[4].'&amp;fio-pass-bilet='.$row[5].'&amp;num-pasp-bilet='.$row[6].'&amp;kassir-bilet='.$row[7].'&amp;summa='.$row[8].'&amp;id-vag='.$row[9].'&amp;id-mest='.$row[10].'&amp;tip-vagon-bilet='.$row[11].'" class="nav-link px-2 link-secondary">Изменить</a></td>';
          echo '<td><a href="delete.php?id-bilet='.$row[0].'" class="nav-link px-2 link-secondary">Удалить</a></td>';
        }
        echo "</tr><tbody>";
      }
      sqlsrv_free_stmt( $query);
      sqlsrv_close($link);

?>

        </table>
        <?php if (isset($_COOKIE['id'])): ?>
        <a href="add.php?id-bilet=bilet" class="nav-link px-2 link-secondary">Добавить</a>
        <a href="poisk.php?id-bilet=bilet" class="nav-link px-2 link-secondary">Поиск</a>
        <a href="poisk.php?id-bilet-date=bilet" class="nav-link px-2 link-secondary">Поиск дата продажи</a>
        <?php endif; ?>
      </div>
    </aside>
      </div>
</div>
</aside>