<?php
  /*Template Name: Página de Inicio*/
  get_header(); 
	$isLocalStorage = FALSE;
	$redirect = get_bloginfo('url').'/gracias';
	$carreras = get_field('carreras','option');
	/* Tipo de dispositivo */
	$es_movil = '0';
	if (preg_match('/(android|wap|phone|ipad)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		$es_movil++;
	}
	if ($es_movil > 0) {
		$DISPOSITIVO = "MOBILE";
	} else {
		$DISPOSITIVO = "PC";
	}  
?>

<?php include 'template_parts/i_banner_inicio.php' ?>

<?php include 'template_parts/i_bloque_ii_inicio.php' ?>

<?php include 'template_parts/i_bloque_eventos_inicio.php' ?>

<div id="ver-eventos" class="wow fadeIn" data-wow-duration="5s">
  <a href="#eventos-inicio" class="cta-btn go-to">VER EVENTOS</a>
</div>

<?php 
  $c = -1;
  $custom_args = array('post_type' => 'evento','posts_per_page' => -1,'orderby'	=> 'date','order'	=> 'ASC', 'paged' => $paged);
  $custom_query = new WP_Query( $custom_args ); 
  if ( $custom_query->have_posts() ) : ?>
  <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); $c++?>
    <?php
    // VARIABLES DE LOS POSTS
      $idPost = get_the_ID();
      $contador = (int) get_field('field_6255b33c14d70',$_POST_ID);

      $link = get_the_permalink();
      $titulo = get_the_title();
      $slug = basename(get_permalink($idPost));
      $zoom = get_field('campo_zoom');
      $texto_gracias_evento = get_field('texto_gracias_evento');
      $campo_1 = get_field('campo_1');
      $campo_2 = get_field('campo_2');
      $campo_3 = get_field('campo_3');
      $campo_4 = get_field('campo_4');

      $terms = get_the_terms( $post->ID , 'categoria_evento');
      if($terms) {
        foreach( $terms as $term ) {
          $cat_obj = get_term($term->term_id, 'categoria_evento');
          $cat_slug = $cat_obj->slug;
        }
      }

      //FORMATEANDO FECHAS Y HORAS  PARA ENVIAR A GOOGLE CALENDAR
      $START_DATE = get_field('fecha_evento',false,false); $date_start = new DateTime($START_DATE); $new_start_date = $date_start->format('Ymd');
      $END_DATE = get_field('fecha_final_evento',false,false); $date_end = new DateTime($END_DATE); $new_end_date = $date_end->format('Ymd');
      $START_TIME = get_field('hora_evento',false,false); $time_start = new DateTime($START_TIME); $new_start_time = $time_start->format('His');
      $END_TIME = get_field('hora_final_evento',false,false); $time_end = new DateTime($END_TIME); $new_end_time = $time_end->format('His');
      $FECHA = get_field('fecha_evento');
      $HORA = get_field('hora_evento');

      $data[] = array(
        'indice' => $c,
        'idPost' => $idPost,
        'titulo' => $titulo,
        'link'  => $link,
        'cat_slug' => $cat_slug,
        'start_date' => $FECHA,
        //'end_date' => $END_DATE,
        'start_time' => $HORA,
        //'end_time' => $END_DATE,
        'new_start_date' => $new_start_date,
        'new_end_date' => $new_end_date,
        'new_start_time' => $new_start_time,
        'new_end_time' => $new_end_time,
        'contador'  => $contador,
        'texto_gracias_evento' => $texto_gracias_evento,
        'zoom' => $zoom,
        'campo_1' => $campo_1,
        'campo_2' => $campo_2,
        'campo_3' => $campo_3,
        'campo_4' => $campo_4                        
      );

      //$resData = 	array_unique($data, SORT_REGULAR);
    ?>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else:  ?>
    <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
<?php endif; ?>	

<script>
  selectEventos = document.getElementById("CARRERA_INTERES");
  listEventos = <?php echo json_encode($data, JSON_PRETTY_PRINT) ?>;
  //console.log(listEventos)
  for (var i = 0; i < listEventos.length; i++) {
    // POPULATE SELECT ELEMENT WITH JSON.
    selectEventos.innerHTML = selectEventos.innerHTML +
    '<option data-fecha="'+listEventos[i]['start_date']+'" data-indice="'+listEventos[i]['indice']+'" value="'+listEventos[i]['titulo']+'">'+listEventos[i]['titulo']+'</option>';
       // '<option data-idpost="' +listEventos[i]['idPost']+ '" data-link="' +listEventos[i]['link']+ '"  data-catslug="' +listEventos[i]['cat_slug']+ '" data-contador="' +listEventos[i]['contador']+ '" data-textogracias="' +listEventos[i]['texto_gracias_evento']+ '" data-zoom="' +listEventos[i]['zoom']+ '" data-campo1="' +listEventos[i]['campo_1']+ '" data-campo2="' +listEventos[i]['campo_2']+ '" data-campo3="' +listEventos[i]['campo_3']+ '" data-campo4="' +listEventos[i]['campo_4']+ '"  value="' + listEventos[i]['titulo'] + '">' + listEventos[i]['titulo'] + '</option>';
  }  


</script>

<script src="//descubre.usil.edu.pe/CDN/disclaimerV2/dist/usilterms.min.js?v=406"></script>
<script>
	var termsOptions = {
		formid : "frm-registro", //Atributo id del formulario <form id="xxxx">
		contentid : "appdpdc", //Donde se contendrá los input option
		inputname : "ACEPTO_POLITICAS", //Atributo name de los input option
		inputid : "acepto", //Atributo id de los input option
		inputvalue : "S", //Atributo value de los input option
		isrequired : false //True: agrega a los imput option el atributo required
	};
	new UsilTerms(termsOptions).init();
</script>

<script type="text/javascript">
  document.getElementById("DISPOSITIVO").value = '<?php echo $DISPOSITIVO; ?>';
  document.getElementById("utm_origin").value = '<?php echo $link; ?>';

  var getParams = function (url) {
      var params = {};
      var parser = document.createElement('a');
      parser.href = url;
      var query = parser.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
         var pair = vars[i].split('=');
         params[pair[0]] = decodeURIComponent(pair[1]);
      }
      return params;
  };

  var curr_url = document.URL;
  var params_url = getParams(curr_url);

  // GET UTMS DE URL
  if(params_url.utm_source != ""){
    document.getElementById("utm_source").value = params_url.utm_source;
  }
  if(params_url.utm_medium != ""){
    document.getElementById("utm_medium").value = params_url.utm_medium;
  }
  if(params_url.utm_campaign != ""){
    document.getElementById("utm_campaign").value = params_url.utm_campaign;
  }
  if(params_url.utm_term != ""){
    document.getElementById("utm_term").value = params_url.utm_term;
  }
  if(params_url.utm_content != ""){
    document.getElementById("utm_content").value = params_url.utm_content;
  }

  // VARIABLE PARA REDIFIRIGIR LUEGO DE EVENTO SENT DE CF7
  urlredirect = '<?php echo $redirect ?>'
  //console.log(urlredirect)
  carreras = document.getElementById("CODIGO_CARRERA");
  carreras.innerHTML = '<?php echo $carreras ?>'
</script>

<style>
	.formulario-evento #frm-registro select optgroup {
		background: #0facc4;
	}
</style>

<?php get_footer(); ?>