<?php get_header();

$slider = array();
for($i=1; $i<=3; $i++) {
   $slider[$i] = array(
      'img'=>get_theme_mod("setting-homepage-slider{$i}_img"),
      'txt'=>get_theme_mod("setting-homepage-slider{$i}_text")
   );
}
?>


   
<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
      <?php
      for($i=1; $i<=3; $i++):
      ?>
      
      <div class="item<?php if ($i===1) print ' active'; ?>">
        
      <img class='img-responsive' width="100%" src="<?php print $slider[$i]['img']; ?>" alt="<?php print $slider[$i]['txt']; ?>">
      <div class="carousel-caption">
      	<h3><?php print $slider[$i]['txt']; ?></h3>
      </div>
      </div>
      
      <?php
      endfor;
      ?>
     
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
      <div class="row">
     
          <div class="col-md-8">
              <?php 
              
              if (have_posts()):
                 
                 while( have_posts() ):
                 
                  the_post();
              
              ?><h1><?php the_title(); ?></h1><?php
                  
                  ?><?php the_content(); ?><?php
              
                 endwhile;
                 
              endif;
              
              
              ?>
              <p>&nbsp;</p>
                  <p>
                      <a class="btn btn-default" href="<?php print get_post_type_archive_link( 'services' ); ?>">Our Services</a>
                      <a class="btn btn-default" href="<?php print get_site_url(); ?>/contact">Contact Us</a>
                      
              </p>
              <p>&nbsp;</p>
          </div>
          <?php get_sidebar() ?>
          
      </div>
         
<?php get_footer() ?>