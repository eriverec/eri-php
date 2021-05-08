<?php include_once("tpl/head.php"); ?>
<?php include_once("tpl/nav.php"); ?>

<div class="tabs is-centered">
  <ul>
    <li><a href="view.php">Lista</a></li>
  </ul>
</div>


<form class="formulario" action="add.php" method="post" name="form1">
  <div class="field">
    <label class="label">Codigo</label>
    <input class="input is-success" type="text" name="codigo" />

    <label class="label">Resumen</label>
    <input class="input is-success" type="text" name="resumen" />

    <label class="label">Precio</label>
    <input class="input is-success" type="text" name="precio" />

    <input class="button is-link" type="submit" name="Submit" value="Guardar" />

    </table>
</form>