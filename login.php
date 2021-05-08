<?php session_start(); ?>
<?php include_once("tpl/head.php"); ?>
<?php
include("connection.php");

if (isset($_POST['submit'])) {
  $user = mysqli_real_escape_string($mysqli, $_POST['username']);
  $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

  if ($user == "" || $pass == "") {
    echo "Either username or password field is empty.";
    echo "<br/>";
    echo "<a href='login.php'>Go back</a>";
  } else {
    $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
      or die("Could not execute the select query.");

    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
      $validuser = $row['username'];
      $_SESSION['valid'] = $validuser;
      $_SESSION['name'] = $row['name'];
      $_SESSION['id'] = $row['id'];
    } else {
      echo "Invalid username or password.";
      echo "<br/>";
      echo "<a href='login.php'>Go back</a>";
    }

    if (isset($_SESSION['valid'])) {
      header('Location: index.php');
    }
  }
} else {
?>
  
  <form class="formulario" name="form1" method="post" action="">
    <div class="field">
      <label class="label">Usuario</label>
      <input class="input is-primary"  type="text" name="username">
      </tr>

      <label class="label">Clave</label>
      <input class="input is-primary" type="password" name="password">
      </tr>

      &nbsp;
      <input class="button is-link" type="submit" name="submit" value="Submit">
      </tr>
    </div>
  </form>




<?php
}
?>
<?php include_once("tpl/footer.php"); ?>