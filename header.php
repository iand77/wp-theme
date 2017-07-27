<?php
$PAGENAME = 'Welcome to our website';
$TITLE = 'Pop N Floss';
$PAGETITLE = $PAGENAME . ' | ' . $TITLE;
$DESCRIPTION  = 'Pop N Floss';
$AUTHOR = 'Mary';
$KEYWORDS = 'Candy, slush machine hire';

$TELEPHONE = get_theme_mod('setting-contact-telephone', '0208 144 4000');
$EMAIL = get_theme_mod('setting-contact-email', 'hello@popnfloss.com');

$PAGECONTENT =<<<HELLO
Here at Pop N Floss we specialise in providing a bespoke and professional sweet catering across London, Essex and Kent. Whilst we specialise in Candy Floss and Popcorn hire; we also offer Slush machine hire, Hot dog machine hire and Chocolate fountain hire for a variety of events no matter how big or small the celebration is.      

hese sweet treats go down a storm with both children and adults alike at weddings, birthday parties, christenings, baby showers, festivals, corporate events and other special events. If you are looking to add a unique and memorable touch to your celebration, Pop N Floss are able to offer just with a range of packages at competitive prices.      

Whatever the occasion, we pride ourselves on our reliable, friendly and professional service. Here at Pop N Floss, we understand how important it is to make sure our service fits in with your vision and this is why our personalised packages are is tailored to your individual needs and requirements. 
HELLO;

$PAGESIDEBAR =<<<HELLO
Page sidebar
HELLO;

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php echo $DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo $KEYWORDS; ?>">
    <meta name="author" content="<?php echo $AUTHOR; ?>">
    
<!-- code removed for brevity. -->
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<!-- code removed for brevity. -->
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $PAGETITLE; ?></title>

    <!-- Bootstrap core CSS -->
    <!------<link href="assets/css/app.css" rel="stylesheet">-->
    <?php 
    wp_head();
    ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body <?php print body_class(); ?>>
<div class="container">
      
         <div class="row" style="margin:10px 0px 10px 0px;">
         
             <div class="col-md-6 text-left">
                 <?php
                 $custom_logo_id = get_theme_mod( 'custom_logo' );
                 if ( function_exists( 'the_custom_logo' ) && $custom_logo_id != ""):
                 the_custom_logo();
                 else: ?>
                 
                 <a href="<?php print get_site_url(); ?>"><img src="<?php print get_template_directory_uri(); ?>/assets/images/header-logo.png" alt="Pop N Floss Logo" height="75"/></a>
                 <?php
                 endif;
                 ?>
             </div>
              <div id="contact" class="col-md-6 text-right">
                  <span class="heading">Tel:</span> <span class="value"><?php echo $TELEPHONE; ?></span> / <span class="heading">E-mail:</span> <span class="value"><?php echo $EMAIL; ?></span>
              <ul class="social clearfix" style="float:right;">
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-pinterest', 'http://www.pinterest.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-pinterest.png" alt="Google Plus"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-instagram', 'http://www.instagram.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-instagram.png" alt="Google Plus"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-googleplus', 'http://www.googleplus.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-google.png" alt="Google Plus"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-facebook', 'http://www.facebook.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-facebook.png" alt="Facebook"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-twitter', 'http://www.twitter.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-twitter.png" alt="Twitter"/></a></li>
                     </ul>
              </div>
         </div>
       
    <nav class="navbar navbar-inverse navbar">
       
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pop Corn &amp; Candy Floss Hire</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php
           
            $menu_name = 'primary';
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
            
            foreach($menuitems as $menuitem):
               $permalink = get_permalink();
               $url = $menuitem->url;
               if (preg_match('~/services(/|$)~Usi', $url)) {
                  if (preg_match('~/services(/|$)~Usi', $permalink)) {
                     $permalink = $url = get_post_type_archive_link( 'services' );
                  }
               }
            ?>
              
            <li <?php print (($permalink === $url) ?'class="active"':'') ?>><a href="<?php print $menuitem->url; ?>"><?php print $menuitem->title; ?></a></li>  
            <?php
            endforeach;
            ?>
          </ul>
          

        </div><!--/.nav-collapse -->
      </div>
    </nav>