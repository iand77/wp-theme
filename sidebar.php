<div class="col-md-4 text-right">
              <!--<?php echo $PAGESIDEBAR; ?>-->
              <p><br/>
                  
                  <?php 
                  $special_offer = get_theme_mod('setting-special-offer-img');
                  if ($special_offer != ""):
                  ?>
                  <img width="250" src="<?php echo $special_offer; ?>" alt="Special Offer"/>
                  <?php
                  else:
                  ?>
                  <img style="margin-left:-2px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/special-offer.png" alt="Special Offer"/>
                  <?php
                  endif;
                  ?>
                  <!--
                  <h2 ><?php _e('Categories'); ?></h2>
<ul >
<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
</ul>
<h2 ><?php _e('Archives'); ?></h2>
<ul >
<?php wp_get_archives('type=monthly'); ?>
</ul>-->
              </p>
          </div>
