<?php get_header() ?>


<div class="row">
     
          <div class="col-md-12">
              <h1><a href="<?php print get_site_url(); ?>/services">Hire Services &amp; Pricing</a> / <span class="subheading"><?php the_title(); ?></span></h1>
          </div> 
</div>
   
<div class="row">
      <?php 
              the_post();
              
              // Proportional crop mode = false
//set_post_thumbnail_size( 0, 300, array(100, 50, 300, 300) );

$thumnail = get_the_post_thumbnail();
if (!strlen($thumnail)) {
   $thumnail = "<img src='<?php echo get_template_directory_uri(); ?>/assets/images/header-contact-1.jpg' class='img-responsive'/>";
} else {
   $thumnail = str_replace('class="', 'class="img-responsive ', $thumnail);
}

?>
          <div class="col-md-12">
         
              
              <?php print $thumnail; ?>
          </div> 
</div>
      <div class="row">
     
          <div class="col-md-8">
              
              <p>&nbsp;</p>
             <?php
              
              the_content();
              
              $beskpoke = get_post_meta(get_post()->ID, 'Bespoke', true);
              $gifts = get_post_meta(get_post()->ID, 'Gifts/Flavours', true);
              
              if (strlen($beskpoke)) {
                 print "<h2>Bespoke Packages</h2>";
                 print "<p>{$beskpoke}</p>";
              }
              
              if (strlen($gifts)) {
                 print "<h2>Gifts/Flavours</h2>";
                 print "<p>{$gifts}</p>";
              }
              
              
              ?>
              <p>&nbsp;</p>
                  <p>
                      <a class="btn btn-default" href="<?php print get_site_url(); ?>/services"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span> Back</a>
                      
              </p>
              <p>&nbsp;</p>
          </div>
          <div class="col-md-4 text-right">
              
              <!--<?php echo $PAGESIDEBAR; ?>-->
              <p>&nbsp;</p>
              <!--
               <div class="custom-panel">
                  <img class="dogear" src="<?php echo get_template_directory_uri(); ?>/assets/images/body-sidebar-panel-dogear.png"/>
                  <span class="price-from">From &pound;<?php 
                                              
                                              $price = get_post_meta(get_post()->ID, 'Price', true);
                                              print (strlen($price) && is_numeric($price) ? $price : 'N/A');
                                              
                                              ?></span>
                                              <span class="call-now">Call: <?php print get_theme_mod('setting-contact-telephone', 'N/A'); ?></span>
                                              <ul>
                                                  <li>CRB/DBS Vetted Staff</li>
                                              </ul>
                                              
                                                 <div class="buttons">
                                                      <a href="<?php print get_site_url(); ?>/contact" class="btn btn-default btn-xs">Make an Enquiry</a>
                                              </div> 
              </div>-->
                                              
                                              <p>
                                              <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                     Summary
                                                  </div>
                                                  <div class="panel-body">
                  <span class="price-from">From &pound;<?php 
                                              
                                              $price = get_post_meta(get_post()->ID, 'Price', true);
                                              print (strlen($price) && is_numeric($price) ? $price : 'N/A');
                                              
                                              ?></span>
                                              <span class="call-now">Call: <?php print get_theme_mod('setting-contact-telephone', 'N/A'); ?></span>
                                              <ul>
                                                  <li>CRB/DBS Vetted Staff</li>
                                              </ul>
                                              
                                                 <div class="buttons">
                                                      <a href="<?php print get_site_url(); ?>/contact" class="btn btn-default btn-xs">Make an Enquiry</a>
                                              </div> 
                                                  </div>
                                                  
                                              </div>
                                              </p>
              <p>
                 <?php 
                  $special_offer = get_theme_mod('setting-special-offer-img');
                  if ($special_offer != ""):
                  ?>
                  <img src="<?php echo $special_offer; ?>" alt="Special Offer" width="250"/>
                  <?php
                  else:
                  ?>
                  <img style="margin-left:-2px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/special-offer.png" alt="Special Offer"/>
                  <?php
                  endif;
                  ?>
              </p>
              <p>&nbsp;</p>
              
          </div>
          
      </div>

   


     
             
       
         
<?php get_footer() ?>