<h1>Bienvenido al mundial Sudáfrica 2010</h1>

<?php if( !$usuario->campeon ): ?>
<h2 class="tit">Campeones</h2>
<div class="campeones">Usted no ha definido su campeón, goleador y la balla invicta, haga click <?php echo link_to("aquí", "/campeones") ?></div>
<?php endif; ?>

<?php if( !$usuario->capitanes ): ?>
<h2 class="tit">Capitanes</h2>
<div class="campeones">Usted no ha seleccionado sus capitanes, haga click <?php echo link_to("aquí", "/capitanes") ?></div>
<?php endif; ?>

<?php if( !$usuario->clasificados ): ?>
<h2 class="tit">Clasificados</h2>
<div class="campeones">Usted no ha seleccionado los clasificados a los octavos de final, haga click <?php echo link_to("aquí", "/clasificados") ?></div>
<?php endif; ?>
