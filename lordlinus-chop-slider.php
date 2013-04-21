<?php
/* 	Plugin Name: Lordlinus Chop Slider
	Plugin Uri: http://businessadwings.com
	Description: This plugin gives you the facility to add a good slider on your site with a simple shortcode [CHOP_SLIDER_LODLINUS]
	Version: 1.3
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
	if(isset($_POST['submit_chop']))
	{
		$target_path = ABSPATH .'/wp-content/plugins/lordlinus-chop-slider/upload/';
		$chop_slider = array();
	  for($i=1;$i<=4;$i++) {
	    $attach = 'pic'.$i;
		$FileName = $_FILES[$attach]['name'];
		if($FileName != "") {
		$FileType = $_FILES[$attach]['type'];
		$FileExtension = strtolower(substr($FileName,strrpos($FileName,'.')+1));
		// Check for supported file formats
		if($FileExtension != "gif" && $FileExtension != "jpg" && $FileExtension != "png")
		{
			echo "<script type='text/javascript'>alert('Supported File format is gif, jpg and png only ... ');</script>";
		}
		else
		{
			$FileSize = round($_FILES[$attach]['size']/1024);
			//echo $FileSize;
			// Check for file size
			if($FileSize > 100)
			{
			  echo "<script type='text/javascript'>alert('Supported file size is 100 KB only ... ');</script>";
			}
			 else {
				  $FileTemp = $_FILES[$attach]['tmp_name'];
				  $FileLocation = $target_path.basename($FileName);
				  // Finally Upload
				  if(move_uploaded_file($FileTemp,$FileLocation))
				  {
					$chop_slider[] = $FileName;
					echo "File Uploaded Successfully ... ";
				  }
				  else
				  {
					echo "Uploading error ..... ";
				  }
			}
		}
		}
	}
	//$chop_slider = serialize($chop_slider);
	update_option('lord_linus_chop_slider',$chop_slider);
 }
	echo "<h3>To Use this slider, please use shortcode [CHOP_SLIDER_LODLINUS] in your code</h3><br/><h4>Choose Images to add to your Chop Slider</h4>";
	echo "<form method='post' action='' enctype='multipart/form-data'>";
	echo "<input type='file' name='pic1' size='30' required='required'><br/><br/><input type='file' name='pic2' size='30'><br/><br/><input type='file' name='pic3' size='30'><br/><br/><input type='file' name='pic4' size='30'><br/><br/><input type='submit' name='submit_chop' value='Add Images to chop slider'/></form>";
}
add_action( 'admin_menu','chop_slider_menu' );

add_shortcode('CHOP_SLIDER_LODLINUS','chop_form_shorcode');
function chop_form_shorcode()
{
	wp_enqueue_script('chopjquerychop', plugins_url('/js/jquery.id.chopslider-2.2.0.free.min.js' , __FILE__),array( 'jquery' ));
	wp_enqueue_script('chopjquerychoptrans', plugins_url('/js/jquery.id.cstransitions-1.2.min.js' , __FILE__));
	wp_enqueue_script('chopjquerychopmain', plugins_url('/js/main.js' , __FILE__), array('jquery'));
	?>
	<link href="<?php echo plugins_url('/lordlinus-chop-slider/css/layout.css', _FILE_); ?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo plugins_url('/lordlinus-chop-slider/css/chopslider.css', _FILE_); ?>" rel='stylesheet' type='text/css' />
	 <div class="container">

            <div class="wrapper">
              <div class="s-shadow-b"></div>
              <a id="slide-next" href="#"></a> 
              <a id="slide-prev" href="#"></a>
              <div id="slider">
			  <?php 
			  $chop_slider_get = get_option('lord_linus_chop_slider');
			  //print_r($chop_slider_get);
			  ?>
                <div class="slide cs-activeSlide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/upload/'.$chop_slider_get[0], _FILE_); ?>" width="900" height="300" alt="photo #1" /> </div>
			<?php 
				for($i=1;$chop_slider_get[$i]!='';$i++){
				?>
                <div class="slide"> <img src="<?php echo plugins_url('/lordlinus-chop-slider/upload/'.$chop_slider_get[$i], _FILE_); ?>" width="900" height="300" alt="photo #2" /> </div>
				<?php
				}
				?>
               </div>
              <div class="pagination"> 
			  <?php 
				for($i=0;$chop_slider_get[$i]!='';$i++){
				?>
                <span class="slider-pagination"></span> 
                <?php
				}
				?>
              </div>
              <div class="slide-descriptions">
                <div class="sl-descr">All Sorts of Web Development</div>
                <div class="sl-descr">Wordpress, xoomla, magento, yii development</div>
                <div class="sl-descr">Website Development</div>
                <div class="sl-descr">Web Application Development</div>
              </div>
              <div class="caption"></div>
            </div>

        </div>
	
<?php	
	
}
?>