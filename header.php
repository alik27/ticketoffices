<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Билетная касса</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="shortcut icon" href="img/shop.png" type="image/png">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-3 me-0 px-3" href="index.php">Билетная касса</a>
  <?php if (!isset($_COOKIE['id'])): ?>
  <div class="text-end">
        <a class="btn btn-outline-light me-2" href="aside-auto.php">Войти</a>
        <a class="btn btn-outline-light me-2" href="aside-registration.php">Регистрация</a>
      </div>
  <?php endif ?>
</header>