<?php

/*
Plugin Name:  Product Category Slider
Plugin URI:   https://swarnatek.com/
Description:  A slider for product_cat and it works only for product post_type
Version:      1.0
Author:       Swarnatek
Author URI:   https://www.swarnatek.com
License:      GPL2
License URI:  https://www.swarnatek.com
*/

(defined('ABSPATH') || exit);
function category_product()
{
ob_start();
?>   
<div class="my-slider slider_option1">
                <?php
$wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'parent' => 0));

    foreach ($wcatTerms as $wcatTerm) :
        $thumnail_id = get_term_meta($wcatTerm->term_id, 'thumbnail_id', true);
        $url = wp_get_attachment_url($thumnail_id);
        ?>      
                    <a href="<?php echo get_term_link( $wcatTerm )?>;">
                       <div>
					     
					       <img src="<?php echo $url ?>" width="300px" height="500px" />
						  
						   <div class="categoy_name">
						   <?php echo $wcatTerm->name; ?>
						   </div>
						   
						   <div class="category-detail">
						   <h2><?php echo $wcatTerm->name;?></h2>
						   <div class="cat_descp"><?php echo $wcatTerm->description; ?></div>
						   </div>
                        
                    </div>
      </a>
                       
                <?php
    endforeach;
    ?>
          </div>  
        <?php  
        return $content = ob_get_clean();
  

}
add_shortcode('product_cat_slider', 'category_product');


function enqueue_style_js() { 
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style('slickstyle', plugins_url( '/assets/css/slick.css', __FILE__ ) );
	wp_enqueue_style('slickthemestyle', plugins_url( '/assets/css/slicktheme.css', __FILE__ ) );
    wp_enqueue_style('customfile', plugins_url( '/assets/css/style.css', __FILE__ ) );
	wp_enqueue_script('slick_lib', plugins_url( '/assets/js/slicklib.js', __FILE__ ) );
} 

add_action('wp_enqueue_scripts', 'enqueue_style_js');