<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $codigo = $_POST['codigo'];
    $resumen = $_POST['resumen'];
    $precio = $_POST['precio'];

    // checking empty fields
    if (empty($codigo) || empty($resumen) || empty($precio)) {
        if (empty($codigo)) {
            echo "<font color='red'>codigo field is empty.</font><br/>";
        }

        if (empty($resumen)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }

        if (empty($precio)) {
            echo "<font color='red'>precio field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET codigo='$codigo', resumen='$resumen', precio='$precio' WHERE id=$id");

        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $codigo = $res['codigo'];
    $resumen = $res['resumen'];
    $precio = $res['precio'];
}
?>
<?php include_once("tpl/head.php"); ?>
<?php include_once("tpl/nav.php"); ?>

<div class="tabs is-centered">
  <ul>
    <li><a href="view.php">Lista</a></li>
  </ul>
</div>

<form class="formulario" name="form1" method="post" action="edit.php">
    <div class="field">

        <label class="label">Codigo</label>
        <input class="input is-primary" type="text" name="codigo" value="<?php echo $codigo; ?>">


        <label class="label">Resumen</label>
        <input class="input is-primary" type="text" name="resumen" value="<?php echo $resumen; ?>">


        <label class="label">Precio</label>
        <input class="input is-primary" type="text" name="precio" value="<?php echo $precio; ?>">


        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
        <input class="button is-link" type="submit" name="update" value="Guardar">

    </div>
</form>

<?php include_once("tpl/footer.php"); ?>