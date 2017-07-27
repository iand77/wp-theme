<?php

function popnfloss_theme_includes() {
   
   wp_enqueue_style('customstyle', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0.0', 'all');
   wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/javascripts/bootstrap.min.js', array(), '1.0.0', true);
   
}

add_action( 'wp_enqueue_scripts', 'popnfloss_theme_includes');

function popnfloss_theme_setup() {
   
   add_theme_support('menus');
   
   register_nav_menu('primary', 'Primary Header Navigation');
   register_nav_menu('footer', 'Footer Navigation');
   
   add_theme_support('custom-background');
   //add_theme_support('custom-header');
   add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 160,
		'flex-width' => true,
	) );
   
}

add_action( 'init', 'popnfloss_theme_setup');

function popnfloss_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here
   
   class Ari_Customize_Textarea_Control extends WP_Customize_Control {
  public $type = 'textarea';
  public function render_content() {
?>

  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
  </label>

<?php
  }
}

/*
$wp_customize->add_setting('textarea_setting', array('default' => 'default text',));
$wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'textarea_setting', array(
  'label' => 'Telephone number',
  'section' => 'contact',
  'settings' => 'textarea_setting',
)));
 
*/

$wp_customize->add_setting('setting-contact-telephone', array('default' => '0208 144 4455',));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'setting-contact-telephone', array(
  'label' => 'Company Telephone',
  'section' => 'contact',
  'settings' => 'setting-contact-telephone',
)));
$wp_customize->add_setting('setting-contact-email', array('default' => 'hello@popnfloss.com',));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'setting-contact-email', array(
  'label' => 'Company Email',
  'section' => 'contact',
  'settings' => 'setting-contact-email',
)));
$wp_customize->add_section('contact' , array(
  'title' => __('Contact','Ari'),
));


$wp_customize->add_setting('setting-homepage-slider1_img', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'setting-homepage-slider1_img', array(
  'label' => 'Slider Image 1',
  'section' => 'homepage',
  'settings' => 'setting-homepage-slider1_img',
)));
$wp_customize->add_setting('setting-homepage-slider1_text', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'setting-homepage-slider1_text', array(
  'label' => 'Caption',
  'section' => 'homepage',
  'settings' => 'setting-homepage-slider1_text',
)));

$wp_customize->add_setting('setting-homepage-slider2_img', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'setting-homepage-slider2_img', array(
  'label' => 'Slider Image 2',
  'section' => 'homepage',
  'settings' => 'setting-homepage-slider2_img',
)));
$wp_customize->add_setting('setting-homepage-slider2_text', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'setting-homepage-slider2_text', array(
  'label' => 'Caption',
  'section' => 'homepage',
  'settings' => 'setting-homepage-slider2_text',
)));

$wp_customize->add_setting('setting-homepage-slider3_img', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'setting-homepage-slider3_img', array(
  'label' => 'Slider Image 3',
  'section' => 'homepage',
  'settings' => 'setting-homepage-slider3_img',
)));
$wp_customize->add_setting('setting-homepage-slider3_text', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'setting-homepage-slider3_text', array(
  'label' => 'Caption',
  'section' => 'homepage',
  'settings' => 'setting-homepage-slider3_text',
)));
$wp_customize->add_section('homepage' , array(
  'title' => __('Home Page','Ari'),
));

$wp_customize->add_setting('setting-special-offer-img', array('default' => '',));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'setting-special-offer-img', array(
  'label' => 'Special offer coupon',
  'section' => 'special',
  'settings' => 'setting-special-offer-img',
)));
$wp_customize->add_section('special' , array(
  'title' => __('Special Offer','Ari'),
));

}
add_action( 'customize_register', 'popnfloss_customize_register' );

function add_theme_support_ext() { 
   add_theme_support('post-thumbnails', array('slide-items','post','gallery-items','audio-items','video-items','page','event-items','services')); 
}
add_action( 'after_setup_theme', 'add_theme_support_ext' );

// Creates Movie Reviews Custom Post Type
/*
function movie_reviews_init() {
    $args = array(
      'label' => 'Movie Reviews',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'movie-reviews'),
        'query_var' => true,
        'menu_icon' => 'dashicons-video-alt',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'price',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'movie-reviews', $args );
}
add_action( 'init', 'movie_reviews_init' );
*/



