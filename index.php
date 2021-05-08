<?php session_start(); ?>

<?php
if (isset($_SESSION['valid'])) {
  include("connection.php");
  $result = mysqli_query($mysqli, "SELECT * FROM login");
  ?>
  <?php include_once("tpl/head.php"); ?>
  <section class="hero is-success is-fullheight">
    <!-- Hero head: will stick at the top -->


    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
        <p class="title">
          ¡Bienvenido a mi página! <?php echo $_SESSION['name'] ?><br />
<?php
} else {
  echo "Usted debe estar conectado para ver esta página.<br/><br/>";
  echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
}
?>
        </p>

      </div>
    </div>

  </section>



<?php include_once("tpl/footer.php"); ?>