<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- As a heading -->
<nav class="navbar navbar-light" style="background-color: #28A745;">
  <span class="navbar-brand mb-0 h1">EpicCollab</span>
</nav>

<div class="container">
  <h1>Epic Collab</h1>
  <h4>Silahkan login untuk melanjutkan</h4>

<form action="actionlogin.php" method="post">
    <div class="form-group">
      <label for="name">Nama:</label>
      <input type="text" class="form-control" id="name" name="name" required="required">
    </div>
    <div class="form-group">
      <label for="password">Tanggal Lahir [tgl/bln/tahun] [contoh : 04/02/2000]:</label>
      <input type="password" class="form-control" id="password" name="password" required="required">
    </div>
    <button type="submit" class="btn btn-success btn-lg" value="LOGIN">Login</button>
    <a href="register.php" class="btn btn-primary btn-lg">Register</a>

  </form>
</div>

<br>
<hr>
<center>
<h5>Epic Teen GBI Gajahmada 2024</h5>
</center>
 
</body>
</html>