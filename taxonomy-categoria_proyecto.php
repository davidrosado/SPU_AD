<?php get_header(); ?>

<?php 
    $term = get_queried_object();
    // vars
    //$image = get_field('imagen_portada', $term);
    //$titulo = get_field('titulo_portada', $term);
    $nombre = $term->name;
    $slug = $term->slug;
?>

<section class="banner-pagina">
	<div class="container">
		<div class="row">
			<div class="titulo-banner-pagina col-12 color-blanco">
				<h2>Proyectos</h2>
				<h1><?php echo $nombre ?></h1>
			</div>
		</div>
	</div>
</section>

<section id="listado-bottom" class="seccion-page seccion-contenido">
    <div class="container">
        <div class="row">
          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_per_page = 3;
            $custom_args_3 = array(          
                'post_type' => 'proyecto',           
                'posts_per_page' => 9,
                'order' => 'DESC',
                'paged' => $paged,  
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria_proyecto', // the custom vocabulary
                        'field'    => 'name',                 
                        'terms'    => $term,      // provide the term slugs
                    ),
                ),              
              );

            $custom_query_3 = new WP_Query( $custom_args_3 ); ?>

          <?php if ( $custom_query_3->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $custom_query_3->have_posts() ) : $custom_query_3->the_post(); ?>
              <div class="col-md-4 item-cat-proy mb-5">
                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium') ?>"></a>
                <p class="cat-item mt-3"><?php echo $nombre ?></p>
                <h3 class="my-3"><a href="<?php the_permalink() ?>" style="color: #4c4c4c; text-decoration: none;"><?php the_title() ?></a></h3>
                <div class="parrafo"><?php the_excerpt(); ?></div>
              </div>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <div class="col-md-12 paginacion text-center">
              <!-- The pagination component -->
              <?php 
              custom_pagination($custom_query_3->max_num_pages,"",$paged);
              //juristic_posts_navigation();
              ?>
            </div>   

          <?php wp_reset_postdata(); ?>

          <?php else:  ?>
              <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
          <?php endif; ?>         
        </div>
    </div>
</section>

<style type="text/css">
	.banner-pagina, #cabecera-site.menu-fijo {
		background-color: #6666ff;
	}
</style>	

<?php get_footer(); ?>