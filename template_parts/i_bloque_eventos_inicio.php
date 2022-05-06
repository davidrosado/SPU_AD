<section id="eventos-inicio">
	<div id="top-eventos" class="seccion-page pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 color-azul d-flex flex-wrap justify-content-center position-relative">
					<div class="titulos-top-eventos wow fadeIn" data-wow-duration="3s"><?php the_field('textos_top_eventos') ?></div>
					<div class="img-top-eventos wow fadeInRight" data-wow-duration="3s">
						<img src="<?php echo get_stylesheet_directory_uri()?>/images/elipses-usil.png" width="250">
					</div>
				</div>
			</div>

			<div id="filtro-eventos" class="row pt-5">
				<div class="listado-categorias col-md-12 wow slideInLeft" data-wow-duration="4s">
					<div class="content-listado slider-filtros">
						<button id="button-all" class="boton-filtro filtrado" onclick="showall();">TODOS</button>
						<?php
						  //$args = array('number' => '1',);
						  $categorias = get_terms('categoria_evento');
						    foreach( $categorias as $categoria ){
						    	$cat_slug = $categoria->slug;
						    	$cat_name = $categoria->name;
						    	$cat_color = get_field('color_categoria', $categoria);
						    	echo '<button id="' .$cat_slug. '" class="boton-filtro" data-filtro="' .$cat_slug. '" onclick="filtrar();" style="border-color:'.$cat_color.'">' . $categoria->name . '</button>';
						    } 
						?>							
					</div>
				</div>				
			</div>			
		</div>		
	</div>

	<div id="bottom-eventos" class="seccion-page">
		<div class="container">
			<div id="listado-eventos" class="row justify-content-center">
				<?php 
					$c=0;
				  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				  $custom_args = array(
				      'post_type' => 'evento',
				      'posts_per_page' => -1,
				      'orderby'	=> 'date',
				      'order'	=> 'ASC',		      
				      'paged' => $paged
				    );

				  $custom_query = new WP_Query( $custom_args ); ?>

				<?php if ( $custom_query->have_posts() ) : ?>
				      <!-- the loop -->
				      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); $c++ ?>
						<?php 
							$terms = get_the_terms( $post->ID , 'categoria_evento' );
							if($terms) {
								foreach( $terms as $term ) {
									//Captura ID de cada term o categoría
									$term_name = $term->name;
									$term_slug = $term->slug;
									$term_url = get_term_link($term->slug, 'categoria_evento');
									$term_id = $term->term_id;
									$term_color = get_field('color_categoria', $term);
								}
							};
						?>				
						<div id="evento-orden-<?php echo $c ?>" class="item-evento <?php echo $term_slug ?> col-md-3 mb-4 wow fadeIn" data-wow-duration="3s" <?php if ($c>8): ?> style="display: none" <?php endif ?>>
							<div class="contenedor-item d-flex flex-wrap color-blanco flex-column">
								<a href="<?php the_permalink() ?>">
									<figure class="imagen-item text-center">
										<?php the_post_thumbnail('large'); ?>
									</figure>
								
									<div class="resumen-item py-3 px-3">
										<h4 class="titulo-categoria-eventos" style="background-color: <?php echo $term_color ?>"><?php echo $term_name ?></h4>

										<h3 class="titulo-item"><?php the_title() ?></h3>

										<div class="fecha-novedades d-flex justify-content-between">
											<?php if (get_field('fecha_evento')): ?>
												<span class="dia-fecha"><i class="far fa-calendar"></i> <?php the_field('fecha_evento') ?></span>
											<?php endif ?>
											
											<?php if (get_field('hora_evento')): ?>
												<span class="mes-fecha"><i class="far fa-clock"></i> <?php the_field('hora_evento') ?></span>
											<?php endif ?>
										</div>	

										<div class="cta-item text-center my-3">
											<span class="boton-cta">CONOCE MÁS</span>
										</div>		
									</div>
								</a>
							</div>					
						</div>						      	
			      <?php endwhile; ?>
			      <!-- end of the loop -->

				<?php wp_reset_postdata(); ?>

				<?php else:  ?>
				    <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
				<?php endif; ?>	

				<div class="col-12 text-center mt-5">
					<button id="ver-mas-eventos" onclick="verMasEvento();">MÁS <br>EVENTOS<br><img class="wow fadeInDown" data-wow-iteration="infinite" src="<?php echo get_stylesheet_directory_uri()?>/images/down-eventos.png"></button>
				</div>
			</div>
		</div>		
	</div>
</section>