<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>



<?php
//including the database connection file
include_once("connection.php");
 
if(isset($_POST['Submit'])) {    
    $codigo = $_POST['codigo'];
    $resumen = $_POST['resumen'];
    $precio = $_POST['precio'];
    $loginId = $_SESSION['id'];
        
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
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO products(codigo, resumen, precio, login_id) VALUES('$codigo','$resumen','$precio', '$loginId')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
    }
}
?>