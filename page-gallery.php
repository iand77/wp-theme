<?php get_header() ?>

      <div class="row">
     
          <div class="col-md-12">
              <?php 
              
              if (have_posts()):
                 
                 while( have_posts() ):
                 
                  the_post();
              
              ?><h1><?php the_title(); ?></h1><?php
                  
                  ?><?php the_content(); ?><?php
              
                 endwhile;
                 
              endif;
              
              
              ?>
              
          </div>
          
      </div>
         
<?php get_footer() ?>