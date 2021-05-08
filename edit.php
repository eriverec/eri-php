<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("connection.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $codigo = $_POST['codigo'];
    $resumen = $_POST['resumen'];
    $precio = $_POST['precio'];    
    
    // checking empty fields
    if(empty($codigo) || empty($resumen) || empty($precio)) {                
        if(empty($codigo)) {
            echo "<font color='red'>codigo field is empty.</font><br/>";
        }
        
        if(empty($resumen)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
        
        if(empty($precio)) {
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
 
while($res = mysqli_fetch_array($result))
{
    $codigo = $res['codigo'];
    $resumen = $res['resumen'];
    $precio = $res['precio'];
}
?>
<?php include_once("tpl/head.php"); ?>

    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>codigo</td>
                <td><input type="text" name="codigo" value="<?php echo $codigo;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="resumen" value="<?php echo $resumen;?>"></td>
            </tr>
            <tr> 
                <td>precio</td>
                <td><input type="text" name="precio" value="<?php echo $precio;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <?php include_once("tpl/footer.php"); ?>
