            <div id="footer" class="row">
                <div class="col-md-3">
                   <img height="80" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png"/>
                </div>
                <div class="col-md-5">
                    <?php //wp_nav_menu(array('theme_location'=>'footer')); ?>
                        <ul>
                           <?php
                           $menu_name = 'footer';
                           $locations = get_nav_menu_locations();
                           $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                           $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

                           foreach($menuitems as $menuitem):
                           ?>
                           <li><a href="<?php print $menuitem->url; ?>"><?php print $menuitem->title; ?></a></li>  
                           <?php
                           endforeach;
                            
                            ?>
                    </ul>
                </div>
                 <div class="col-md-4">
                         <ul class="social clearfix">
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-pinterest', 'http://www.pinterest.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-pinterest.png" alt="Google Plus"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-instagram', 'http://www.instagram.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-instagram.png" alt="Google Plus"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-googleplus', 'http://www.googleplus.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-google.png" alt="Google Plus"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-facebook', 'http://www.facebook.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-facebook.png" alt="Facebook"/></a></li>
                             <li><a target="_blank" href="<?php print get_theme_mod('setting-sm-twitter', 'http://www.twitter.com'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-social-twitter.png" alt="Twitter"/></a></li>
                     </ul>
                     <p>
                   COPYRIGHT &copy; 2016 Pop N Floss
                     </p>
                </div>
        </div>
    

    </div><!-- /.container -->
    
       


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!------<script src="assets/javascripts/bootstrap.min.js"></script>-->
    <?php wp_footer(); ?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/javascripts/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
