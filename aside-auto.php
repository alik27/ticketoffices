<?php include_once ("header.php");?>
<aside>
  <div class="container-fluid">
  <div class="row">
    <?php include_once ("article.php");?>
<aside class="col-md-0 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Авторизация</h1>
      </div>

        <div class="table-responsive">
    <form action="check-auto.php" method="post">
    <div class="form-floating">
      <input name="email" type="email" id="inputEmail" class="form-control"placeholder="Email address" required="" autofocus="">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-50 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
  </form>
      </div>
    </aside>
      </div>
</div>
</aside>
<?php include_once ("footer.php");?>