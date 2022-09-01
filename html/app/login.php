<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>로그인</title>
</head>
<body>
  <div style="margin: 50px auto; width: 90%; border: 1px solid #ccc; padding: 50px;">
    <form action="./login_ok.php" method="post">
      <h3 style="text-align: center; font-size: 25px; font-weight: bold;">Login</h3>
      <div class="form-group">
        <label for="user_id">ID</label>
        <input type="text" name="user_id" class="form-control" placeholder="input your ID" required id="user_id">
      </div>
      <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="user_passwor" class="form-control" placeholder="input your password" required>
      </div>
      <!--div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </!--div-->
      <div style="text-align: center;">
        <button type="submit" class="btn-primary btn">Login</button>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>