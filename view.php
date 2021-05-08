<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
  header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC");
?>


<?php  include_once("tpl/head.php"); ?>

<a href="index.php">Home</a> | <a href="add.html">Agregar</a> | <a href="logout.php">Logout</a>
<br /><br />

<table width='80%' border=0>
  <tr bgcolor='#CCCCCC'>
    <td>codigo</td>
    <td>Description</td>
    <td>Precio</td>
    <td>Update</td>
  </tr>
  <?php
  while ($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $res['codigo'] . "</td>";
    echo "<td>" . $res['resumen'] . "</td>";
    echo "<td>" . $res['precio'] . "</td>";
    echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estas seguro que quieres borrarlo?')\">Delete</a></td>";
  }
  ?>
</table>

<?php  include_once("tpl/footer.php"); ?>