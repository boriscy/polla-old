<h1>Campeones</h1>

<div id="campeon">
  <h2 class="tit">Campeón del mundial (<span></span>)</h2>
  <blockquote>
    Si usted acierta al equipo campeón del mundial ganará <strong>20</strong> puntos.
  </blockquote>
  <?php $equipos = $equipos->result(); ?>

  <?php foreach($grupos as $id => $grupo): ?>
    <div class="grupo">
      <h4>Grupo <?php echo $grupo ?></h4>
      <ul>
    
      <?php for($i =0; $i < 4; $i++): ?>
        <?php $equipo = current($equipos); ?>

        <?php 
          $checked = "";
          if($equipo->id == $usuario->campeon)
            $checked = 'checked="checked"';
        ?>
        <li><label>
            <input type="radio" name="campeon" value="<?php echo $equipo->id ?>" id="equipo-<?php echo $equipo->id ?>" <?php echo $checked ?> />
            <?php echo img('equipos/' . $equipo->img_min) ?> <?php echo $equipo->nombre ?>
            <label>
        </li>
        <?php next($equipos); ?>
      <?php endfor; ?>
      </ul>
    </div>
  <?php endforeach; ?>
</div>

<div style="clear:both;"></div>

<div id="gol">
  <h2 class="tit">Goleador del mundial (<span></span>)</h2>
  <blockquote>
    Si usted acierta al equipo goleador del mundial ganará <strong>30</strong> puntos.
  </blockquote>
  
  <img src="" width="47" height="31" />
  <?php echo select("jugador_equipo", "Equipo", '', $equipos_list) ?>
  <div class="input">
    <select id="goleador" name="goleador"></select>
  </div>
</div>


<div style="clear:both;"></div>


<div id="valla">
  <h2 class="tit">Valla invicta (<span></span>)</h2>
  <blockquote>
    Cada ves que el equipo que seleccione mantenga su valla (arco) en cero ganará <strong>5</strong> puntos.
  </blockquote>
  <?php reset($equipos) ?>

  <?php foreach($grupos as $id => $grupo): ?>
    <div class="grupo">
      <h4>Grupo <?php echo $grupo ?></h4>
      <ul>
    
      <?php for($i =0; $i < 4; $i++): ?>
        <?php $equipo = current($equipos); ?>
        <?php 
          $checked = "";
          if($equipo->id == $usuario->balla_invicta)
            $checked = 'checked="true"';
        ?>
        <li><label>
            <input type="radio" name="balla_invicta" value="<?php echo $equipo->id ?>" id="valla-<?php echo $equipo->id ?>" <?php echo $checked ?> />
            <?php echo img('equipos/' . $equipo->img_min) ?> <?php echo $equipo->nombre ?>
            <label>
        </li>
        <?php next($equipos); ?>
      <?php endfor; ?>
      </ul>
    </div>
  <?php endforeach; ?>
</div>

<div style="clear:both;"></div>


<script type="text/javascript">
$(document).ready(function() {
  var jugadores = <?php echo json_encode($jugadores) ?>;
  var equipos_data = <?php echo json_encode($equipos_data) ?>;

  var base_url = "<?php echo base_url() ?>";
  // Campeón
  var campeon = $('#campeon input:radio:checked');
  if(campeon.length > 0)
    $('#campeon h2 span').html(campeon.parents("li:first").text().trim() );

  $('#campeon input:radio').click(function(e) {
    $('#campeon h2 span').html($(this).parents("li:first").text().trim() );
  });

  // Valla
  var valla = $('#valla input:radio:checked');
  if(valla.length > 0)
    $('#valla h2 span').html(valla.parents("li:first").text().trim() );

  $('#valla input:radio').click(function(e) {
    $('#valla h2 span').html($(this).parents("li:first").text().trim() );
  });

  /**
   * Crea opciones para el goleador
   */
  function crearOtionsJugadoes(val) {
    $('#goleador option').remove();
    var options = ['<option></option>'];
    for( k in jugadores[val] ) {
      options.push('<option value="' + k + '">' + jugadores[val][k] + '</option>');
    }
    $('#goleador').append(options.join());
  }

  // Goleador
  $('#jugador_equipo').change(function() {
    var val = $(this).val();
    var url_img = base_url  + 'system/images/equipos/' + equipos_data[val].img_med;
    $('#gol img').attr("src", url_img);
    crearOtionsJugadoes(val);
  });

  $('#goleador').live("change",function() {
    var jugador = $('#goleador option[value=' + $(this).val() +']').text();
    var equipo = $('#jugador_equipo option[value=' + $('#jugador_equipo').val() + ']').text();
    $('#gol h2 span').html( jugador + ' "' + equipo + '"');
  });
});
</script>
