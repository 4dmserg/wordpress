<?php get_header(); ?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right hidden-md-up">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div style="padding-top: 5%;" class="row">
            <div class="col-6 col-lg-12">
        <?php 
                if(have_posts() ) : while ( have_posts() ) : the_post();   ?>  
              <h2><?php echo get_the_title(); ?></h2>
              <p><?php 
              ob_start();
                   the_content();
              echo wp_trim_words(ob_get_clean(), 50, ' [...]');
              ?> </p>
              <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">Читать далее &raquo;</a></p>
              <hr>
        <?php    endwhile;

                endif; 
            ?>
            </div>
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <?php get_sidebar( 'right' ); ?>  
        </div><!--/span-->
      </div><!--/row-->



<?php get_footer(); ?>