<?php session_start(); ?>

<?php
if (isset($_SESSION['valid'])) {
  include("connection.php");
  $result = mysqli_query($mysqli, "SELECT * FROM login");
  ?>
  <?php include_once("tpl/head.php"); ?>
  <section class="hero is-success is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
      <header class="navbar">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item">
              <h2>LAB</h2>
            </a>
            <span class="navbar-burger" data-target="navbarMenuHeroC">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
          <div id="navbarMenuHeroC" class="navbar-menu">
            <div class="navbar-end">
              <a class="navbar-item is-active">
                Home
              </a>
              <a class="navbar-item" href='view.php'>
                Productos
              </a>
              
              <span class="navbar-item">
                Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br />
              </span>
            </div>
          </div>
        </div>
      </header>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
        <p class="title">
          ¡Bienvenido a mi página!
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