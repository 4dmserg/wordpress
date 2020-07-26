<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php wp_head(); ?>
    <title><?php the_title(); ?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a style="color: #66ff00;" class="navbar-brand">&#9883;</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <?php wp_nav_menu(  [
            'menu'            => 3, 
            'container'       => '', 
            'container_class' => '', 
            'container_id'    => '',
            'menu_class'      => 'navbar-nav mr-auto', 
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
            'add_li_class'    => 'nav-item',
        ]  ); ?>
      </div>
    </nav>