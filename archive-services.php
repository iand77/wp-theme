<?php get_header() ?>


   
      <div class="row">
     
          <div class="col-md-12">
              <h1>Hire Services &amp; Pricing</h1>
              <p class="lead">Punctuality, food quality, and presentation are our keys to success. And that's how we maintain 100% customer satisfaction - we take pride in our work&hellip;<p>
              <p>
                  Booking with Pop N Floss is simple! Once you have chosen your desired package, please contact us by telephone, email or via our enquiry form available on our <a href="<?php print get_site_url(); ?>/contact">contact</a> page. </p>
              <p>We will work closely with you to make sure all your sweet treat needs are met! Once you have selected and confirmed your package, a non refundable deposit of £50.00 will be required to secure the date of your event. The remaining balance will need to be paid on the day before we begin. 
              </p>
              <p>&nbsp;</p>
              <div id="packages-table">
                          <ul class="clearfix">
              <?php

$args = array( 'post_type' => 'services', 'posts_per_page' => 10, 'orderby' => 'menu',
	'order'   => 'ASC' );
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) : 
   while ( $the_query->have_posts() ) : $the_query->the_post(); 

// Proportional crop mode = false
set_post_thumbnail_size( 197, 197, false );

$thumnail = get_the_post_thumbnail();
if (!strlen($thumnail)) {
   $thumnail = '<img src="'.get_template_directory_uri().'/assets/images/fill.png"/>';
} 
$thumnail = str_replace('class="', 'class="desaturate ', $thumnail);


$title = get_the_title();
$link = get_the_permalink();
$hover_img = get_template_directory_uri().'/assets/images/footer-logo.png';

$figure =<<<HEREDOC
<figure class="imghvr-fold-up">{$thumnail}
      <figcaption>
       <div class="text-center" style="text-align:center !important; margin-top:5px;"><img height="90" src="{$hover_img}"/></div>
      </figcaption><a href="{$link}"></a>
    </figure>
HEREDOC;
//var_dump(array_slice(explode("\n",get_the_excerpt()), 0, 4));
?>
              
              
                                  <li class="clearfix">
                                      <div class="col-sm-3"><?php print $figure; ?></div>
                                      <div class="col-sm-6">
                                          <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                             <?php the_excerpt(); ?>
                                      </div>
                                          <div class="col-sm-3">
                                              <span class="price-from">From &pound;<?php 
                                              
                                              $price = get_post_meta(get_post()->ID, 'Price', true);
                                              print (strlen($price) && is_numeric($price) ? $price : 'N/A');
                                              
                                              ?></span>
                                              <span class="call-now">Call: <?php print get_theme_mod('setting-contact-telephone', 'N/A'); ?></span>
                                                 <div class="buttons">
                                                     <a href="<?php the_permalink() ?>" class="btn btn-default btn-xs">More Info</a>
                                                     <a href="<?php print get_site_url(); ?>/contact" class="btn btn-default btn-xs">Make an Enquiry</a>
                                              </div> 
                                      </div>
                                      
                              </li>
              
<?php 
wp_reset_postdata();
endwhile;

?>
  </ul>
              </div>
              
<p><?php 
else:
_e( 'Sorry, no posts matched your criteria.' ); 
?></p>
<?php 
endif; 
?>
              <p>&nbsp;</p>
                  <p class="small-text">
                     Call us today on <?php print get_theme_mod('setting-contact-telephone', '0208 144 4000'); ?> for our latest prices.
                      
              </p>
              <p>&nbsp;</p>
          </div>
          
      </div>
         
<?php get_footer() ?>