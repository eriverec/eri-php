<?php session_start(); ?>

<?php
if (isset($_SESSION['valid'])) {
  include("connection.php");
  $result = mysqli_query($mysqli, "SELECT * FROM login");
?>
  <?php include_once("tpl/head.php"); ?>
  <?php include_once("tpl/nav.php"); ?>
  <section class="hero is-warning">
    <div class="hero-body">
      <p class="title">
        ¡Bienvenido
      </p>
      <p class="subtitle">
        <?php echo $_SESSION['name'] ?>
      </p>
    </div>
  </section>

<?php } else { ?>
  <?php include_once("tpl/head.php"); ?>

  <article class="message is-danger">
    <div class="message-body">
      Usted debe estar conectado para ver esta página.
      <a href='login.php'>Login</a>"
    </div>
  </article>
<?php include_once("tpl/footer.php"); ?>

<?php } ?>



<?php include_once("tpl/footer.php"); ?>