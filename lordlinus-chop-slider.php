<?php
/* 	Plugin Name: Lordlinus Chop Slider
	Plugin Uri: http://businessadwings.com
	Description: This plugin gives you the facility to add a good slider on your site with a simple shortcode [CHOP_SLIDER_LODLINUS]
	Version: 1.2
	Author: lordlinus
	Author URI: http://businessadwings.com/contact-us
	Licence: GPVl
*/
?>
<?php

function chop_slider_menu()
{
	add_menu_page( 'Chop Slider', 'Chop Slider', 'administrator','chop-slider' ,'chop_slider');
}
function chop_slider()
{
	echo "<h3>To Use this slider, please use shortcode [CHOP_SLIDER_LODLINUS] in your code</h3>";
}
add_action( 'admin_menu','chop_slider_menu' );

add_shortcode('CHOP_SLIDER_LODLINUS','chop_form_shorcode');
function chop_form_shorcode()
{
	//wp_enqueue_script('jquery_new', plugins_url('/js/jquery-latest.min.js' , __FILE__));
	wp_enqueue_script('chopjquerychop', plugins_url('/js/jquery.id.chopslider-2.2.0.free.min.js' , __FILE__),array( 'jquery' ));
	wp_enqueue_script('chopjquerychoptrans', plugins_url('/js/jquery.id.cstransitions-1.2.min.js' , __FILE__));
	wp_enqueue_script('chopjquerychopmain', plugins_url('/js/main.js' , __FILE__), array('jquery'));
	//echo "<link href='css/layout.css' rel='stylesheet' type='text/css' /><link href='css/chopslider.css' rel='stylesheet' type='text/css' />";
	?>
	<link href="<?php echo plugins_url('/lordlinus-chop-slider/css/layout.css', _FILE_); ?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo plugins_url('/lordlinus-chop-slider/css/chopslider.css', _FILE_); ?>" rel='stylesheet' type='text/css' />
	 <div class="container">

            <div class="wrapper">
              <div class="s-shadow-b"></div>
              <a id="slide-next" href="#"></a> 
              <a id="slide-prev" href="#"></a>
              <div id="slider">
                <div class="slide cs-activeSlide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic1.jpg', _FILE_); ?>" width="900" height="300" alt="photo #1" /> </div>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic2.jpg', _FILE_); ?>" width="900" height="300" alt="photo #2" /> </div>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic3.jpg', _FILE_); ?>" width="900" height="300" alt="photo #3" /> </div>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic4.jpg', _FILE_); ?>" width="900" height="300" alt="photo #4" /> </div>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic5.jpg', _FILE_); ?>" width="900" height="300" alt="photo #5" /> </div>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic6.jpg', _FILE_); ?>" width="900" height="300" alt="photo #6" /> </div>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/slide_images/pic7.jpg', _FILE_); ?>" width="900" height="300" alt="photo #7" /> </div>
              </div>
              <div class="pagination"> 
                <span class="slider-pagination"></span> 
                <span class="slider-pagination"></span> 
                <span class="slider-pagination"></span> 
                <span class="slider-pagination"></span> 
                <span class="slider-pagination"></span> 
                <span class="slider-pagination"></span> 
                <span class="slider-pagination"></span> 
              </div>
              <div class="slide-descriptions">
                <div class="sl-descr">Thailand, There are very many different ATM in one place</div>
                <div class="sl-descr">All city colour is bright, nothing black</div>
                <div class="sl-descr">Floating market. Shopping on river</div>
                <div class="sl-descr">Sunset on Koh Phangan island</div>
                <div class="sl-descr">Shortly before sunset</div>
                <div class="sl-descr">Good sculpture on Koh Samui island</div>
                <div class="sl-descr">That is such cute barmaid you can see here</div>
              </div>
              <div class="caption"></div>
            </div>

        </div>
	
<?php	
	
}
?>