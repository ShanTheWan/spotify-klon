<?php
include 'connection.php';
?>
<html lang="en">
<head>
  <title>Izbris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!--Header se začne-->
<section class="header">

    <p>Pozdravljeni, admin!</p>

    <nav class="navbar">
        <div class="box">
            <a href="odjava.php">Odjava</a>
            <a href="admin2.php">Izbris</a>
            <a href="admin3.php">Uredi</a>
        </div>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!--Header se konča-->

<div class="container">
<div class="col-lg-4">
  <h2>Uporabnik: </h2>
  <form action="" name="form" method="post">
    <div class="form-group">
      <input type="text" class="form-control" id="email" placeholder="Vnesite ime" name="ime">
    </div>
    <button type="submit" name="delete" class="btn btn-default">Izbris</button>
  </form>
</div>
</div>

<div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Ime</th>
        <th>Email</th>
        <th>Geslo</th>
        <th>Telefon</th>
        <th>Admin</th>
      </tr>
    </thead>
    <tbody>

    <?php

    $res = mysqli_query($link, "SELECT * FROM uporabniki");
    while($row = mysqli_fetch_array($res)){

        echo "<tr>";
        echo "<td>"; echo $row["uporabnik_id"]; echo "</td>";
        echo "<td>"; echo $row["up_ime"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["geslo1"]; echo "</td>";
        echo "<td>"; echo $row["telefon"]; echo "</td>";
        echo "<td>"; echo $row["admin"]; echo "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
  </table>
</div>
</body>

<?php
if(isset($_POST["delete"])){

    mysqli_query($link, "DELETE FROM users WHERE uime='$_POST[ime]'") or die(mysqli_error($link));

}
?>
</body>

<?php
if(isset($_POST["delete"])){

    mysqli_query($link, "DELETE FROM book_form WHERE ime='$_POST[ime]'") or die(mysqli_error($link));

}
?>
</html>