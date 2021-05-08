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


<div class="tabs is-centered">
  <ul>
    <li><a href="client-add.php">Add</a></li>
  </ul>
</div>

<center><h2 class="title is-2">Productos</h2></center> 

<table class="table table is-bordered table is-striped" width='80%' >
  <tr bgcolor='#CCCCCC'>
    <td>Codigo</td>
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