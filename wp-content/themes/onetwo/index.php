<?php get_header(); ?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right hidden-md-up">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          <div class="row">
              <div class="col col-md-12">
                  <h1><?php echo get_the_title(); ?></h1>
              </div>
              <div style="text-indent: 10px;" class="col col-md-12">
            <?php 
                if(have_posts() ) : while ( have_posts() ) : the_post();

                    the_content();
                    endwhile;

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