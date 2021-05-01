<?php include_once ("header.php");?>
<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php 
        if(isset($_GET['id-bilet'])){
          echo '<h1 class="h2">Билеты</h1>';}
        if(isset($_GET['id-reis'])){
          echo '<h1 class="h2">Расписание</h1>';}
        if(isset($_GET['id-marsh'])){
          echo '<h1 class="h2">Маршрут</h1>';}
        if(isset($_GET['id-mesta'])){
          echo '<h1 class="h2">Места</h1>';}
        if(isset($_GET['id'])){
          echo '<h1 class="h2">Кассиры</h1>';}
        if(isset($_GET['id-punkt'])){
          echo '<h1 class="h2">Населенные пункты</h1>';}
        ?>
      </div>
        <div class="table-responsive">
        <table class="table table-striped table-sm">

<?php 
$serverName = "WIN-EITNC7KU5MN\\SQLEXPRESS";
$connectionInfo = array("Database"=>"Билетные кассы", "CharacterSet" => "UTF-8");
$link = sqlsrv_connect($serverName, $connectionInfo);

if(isset($_GET['id-bilet']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
    <label>Поиск билета</label>
      <input name="bilet-input" class="form-control" required="">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="bilet">Поиск</button>
  </form>
</main>';

if(isset($_POST['bilet'])){
$sql = "exec bilet3;";
$query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ билета</th>
              <th>№ рейса</th>
              <th>Признак продажи/возврата</th>
              <th>Дата продажи/возврата</th>
              <th>Дата отправления</th>
              <th>ФИО пассажира</th>
              <th>Номер паспорта</th>
              <th>Код кассира</th>
              <th>Сумма</th>
              <th>№ вагона</th>
              <th>№ места</th>
              <th>Тип вагона</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[0]==$_POST['bilet-input']){
        for ($j = 0; $j < 12 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}
if(isset($_GET['id-bilet-date']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
    <label>Поиск билета о дате продажи</label>
      <input name="bilet-input" class="form-control" required="">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="bilet">Поиск</button>
  </form>
</main>';

if(isset($_POST['bilet'])){
$sql = "exec bilet3;";
$query = sqlsrv_query( $link, $sql);



      echo "<thead><tr>
              <th>№ билета</th>
              <th>№ рейса</th>
              <th>Признак продажи/возврата</th>
              <th>Дата продажи/возврата</th>
              <th>Дата отправления</th>
              <th>ФИО пассажира</th>
              <th>Номер паспорта</th>
              <th>Код кассира</th>
              <th>Сумма</th>
              <th>№ вагона</th>
              <th>№ места</th>
              <th>Тип вагона</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[3]==$_POST['bilet-input']){
        for ($j = 0; $j < 12 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}
if(isset($_GET['id-reis']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
    <label>Поиск рейса</label>
      <input name="reis-input" class="form-control" required="">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="reis">Поиск</button>
  </form>
</main>';

if(isset($_POST['reis'])){
$sql = "exec raspisanie1;";
$query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ рейса</th>
              <th>день недели отправления</th>
              <th>время отправления</th>
              <th>день недели прибытия</th>
              <th>время прибытия</th>
              <th>время в пути</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[0]==$_POST['reis-input'])
        {
        for ($j = 0; $j < 6 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}


if(isset($_GET['id-marsh']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
      <label>Поиск участка рейса</label>
      <input name="marsh-input" class="form-control" required="">
      <input name="marsh-uchastka-input" class="form-control" required="">            
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="marsh">Поиск</button>
  </form>
</main>';

$sql4 = "SELECT COUNT([№ рейса]) FROM Маршрут";
$query4 = sqlsrv_query( $link, $sql4);
while ($row4 = sqlsrv_fetch_array($query4)) 
{
  for ($j = 0; $j < 1 ; ++$j)
{
echo "\n$row4[$j]";
}
}

if(isset($_POST['marsh'])){
$sql = "exec marshrut1;";
$query = sqlsrv_query( $link, $sql);

$sql4 = "SELECT COUNT([№ рейса]) FROM Маршрут WHERE [№ рейса]='".$_POST['marsh-input']."'
            and [№ участка рейса]='".$_POST['marsh-uchastka-input']."'";
$query4 = sqlsrv_query( $link, $sql4);
while ($row4 = sqlsrv_fetch_array($query4)) 
{
  for ($j = 0; $j < 1 ; ++$j)
{
  echo "\n$row4[$j]";
}
}
      echo "<thead><tr>
              <th>№ рейса</th>
              <th>Признак типа участка маршрута</th>
              <th>№ участка рейса</th>
              <th>Наименование</th>
              <th>Километраж участка</th>
              <th>Время отправления</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[0]==$_POST['marsh-input'] and $row[2]==$_POST['marsh-uchastka-input']){
        for ($j = 0; $j < 6 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}


if(isset($_GET['id-mesta']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
    <label>Поиск рейсов</label>
      <input name="mesta-input" class="form-control" required="">
      <select size="3" multiple name="uchastok-input">';
      echo '<option selected>продано</option>';
      echo '<option>свободно</option>';
      echo '</select>          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="mesta">Поиск</button>
  </form>
</main>';

if(isset($_POST['mesta'])){
$sql = "exec mesta1;";
$query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ рейса</th>
              <th>№ вагона</th>
              <th>Тип вагона</th>
              <th>Дата отправления</th>
              <th>№ места</th>
              <th>Признак</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[0]==$_POST['mesta-input'] and $row[5]==$_POST['uchastok-input']){
        for ($j = 0; $j < 6 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}


if(isset($_GET['id']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
    <label>Код кассира</label>
      <input name="kassir-input" class="form-control" required="">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="kassir">Поиск</button>
  </form>
</main>';

if(isset($_POST['kassir'])){
$sql = "exec bilet3;";
$query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ билета</th>
              <th>№ рейса</th>
              <th>Признак продажи/возврата</th>
              <th>Дата продажи/возврата</th>
              <th>Дата отправления</th>
              <th>ФИО пассажира</th>
              <th>Номер паспорта</th>
              <th>Код кассира</th>
              <th>Сумма</th>
              <th>№ вагона</th>
              <th>№ места</th>
              <th>Тип вагона</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[7]==$_POST['kassir-input']){
        for ($j = 0; $j < 12 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}

if(isset($_GET['id-punkt']))
{
    echo '<main class="container">
    <form method="post">
    <div class="form-floating">
    <label>Код населенного пункта</label>
      <input name="punkt-input" class="form-control" required="">          
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="punkt">Поиск</button>
  </form>
</main>';

if(isset($_POST['punkt'])){
$sql = "exec marshrut1;";
$query = sqlsrv_query( $link, $sql);

      echo "<thead><tr>
              <th>№ рейса</th>
              <th>Признак типа участка маршрута</th>
              <th>№ участка рейса</th>
              <th>Код населенного пункта</th>
              <th>Километраж участка</th>
              <th>Время отправления</th>
            </tr>
          </thead>";

      while ($row = sqlsrv_fetch_array($query)) 
      {
        echo "<tbody><tr>";
        if($row[3]==$_POST['punkt-input']){
        for ($j = 0; $j < 6 ; ++$j)
        {
            echo "<td>$row[$j]</td>";
        }
      }
        echo "</tr><tbody>";
      }
}
}

?>
        </table>
      </div>
    </aside>
      </div>
</div>
</aside>
<?php include_once ("footer.php");?>