<?php

function get_upload_field($id, $std = '', $desc = '') {

  $field = '<input id="' . $id . '" type="file" name="attachment_' . $id . '" />' .
           '<span class="submit"><input name="elal_upload" type="submit" value="Upload" class="button panel-upload-save" />
		   </span> <span class="description"> '. __($desc,'thematic') .' </span>';

  return $field;
}

load_theme_textdomain('elal');
class elal {
	function addOptions () {
	
		if (isset($_POST['elal_reset'])) { elal::initOptions(true); }
		if (isset($_POST['elal_save'])) {

			$aOptions = elal::initOptions(false);
		
			$aOptions['featured1-title'] = stripslashes($_POST['featured1-title']);
			$aOptions['featured1-image'] = stripslashes($_POST['featured1-image']);
			$aOptions['featured1-link'] = stripslashes($_POST['featured1-link']);
			$aOptions['featured1-desc'] = stripslashes($_POST['featured1-desc']);
			
			$aOptions['featured2-title'] = stripslashes($_POST['featured2-title']);
			$aOptions['featured2-image'] = stripslashes($_POST['featured2-image']);
			$aOptions['featured2-link'] = stripslashes($_POST['featured2-link']);
			$aOptions['featured2-desc'] = stripslashes($_POST['featured2-desc']);
			
			$aOptions['featured3-title'] = stripslashes($_POST['featured3-title']);
			$aOptions['featured3-image'] = stripslashes($_POST['featured3-image']);
			$aOptions['featured3-link'] = stripslashes($_POST['featured3-link']);
			$aOptions['featured3-desc'] = stripslashes($_POST['featured3-desc']);
			
			$aOptions['featured4-title'] = stripslashes($_POST['featured4-title']);
			$aOptions['featured4-image'] = stripslashes($_POST['featured4-image']);
			$aOptions['featured4-link'] = stripslashes($_POST['featured4-link']);
			$aOptions['featured4-desc'] = stripslashes($_POST['featured4-desc']);
			
			$aOptions['featured5-title'] = stripslashes($_POST['featured5-title']);
			$aOptions['featured5-link'] = stripslashes($_POST['featured5-link']);
			$aOptions['featured5-desc'] = stripslashes($_POST['featured5-desc']);
			
			$aOptions['featured6-title'] = stripslashes($_POST['featured6-title']);
			$aOptions['featured6-link'] = stripslashes($_POST['featured6-link']);
			$aOptions['featured6-desc'] = stripslashes($_POST['featured6-desc']);
			
			$aOptions['featured7-title'] = stripslashes($_POST['featured7-title']);
			$aOptions['featured7-link'] = stripslashes($_POST['featured7-link']);
			$aOptions['featured7-desc'] = stripslashes($_POST['featured7-desc']);
			
		  $aOptions['featured8-title'] = stripslashes($_POST['featured8-title']);
			$aOptions['featured8-link'] = stripslashes($_POST['featured8-link']);
			$aOptions['featured8-desc'] = stripslashes($_POST['featured8-desc']);	
			
			update_option('elal_theme', $aOptions);
		}
		if (isset($_POST['elal_upload'])) {

			$aOptions = elal::initOptions(false);

            $whitelist = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
			
			if (!$_FILES['attachment_featured1-image']['type']=='') { 
				$up_file = 'featured1-image'; 
			}
			
			if (!$_FILES['attachment_featured2-image']['type']=='') { 
				$up_file = 'featured2-image'; 
			}
			
			if (!$_FILES['attachment_featured3-image']['type']=='') { 
				$up_file = 'featured3-image'; 
			}
			
			if (!$_FILES['attachment_featured4-image']['type']=='') { 
				$up_file = 'featured4-image'; 
			}
						
            $filetype = $_FILES['attachment_' . $up_file]['type'];

            if (in_array($filetype, $whitelist)) {
              $upload = wp_handle_upload($_FILES['attachment_' . $up_file], array('test_form' => false));
			  $aOptions[$up_file] = stripslashes($upload['url']);
			  update_option('elal_theme', $aOptions);
            }
		}
		add_theme_page("elal Theme Options", "elal Options", 'edit_themes', basename(__FILE__), array('elal', 'displayOptions'));
	}
	function initOptions ($bReset) {
		$aOptions = get_option('elal_theme');
		if (!is_array($aOptions) || $bReset) {

			$aOptions['featured1-title'] = 'A perfect blend of <b>refinement</b> &#38; <b>price</b>';
			$aOptions['featured1-image'] = 'http://dl.dropbox.com/u/1933107/elal/sl.jpg';
			$aOptions['featured1-link'] = '/about/';
			$aOptions['featured1-desc'] = '<b><em>Hotel Furniture &#38; Lighting: European quality from China</em></b>';
			
			$aOptions['featured2-title'] = 'Title slider two';
			$aOptions['featured2-image'] = 'http://dl.dropbox.com/u/1933107/themes/elal.png';
			$aOptions['featured2-link'] = '/about/';
			$aOptions['featured2-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
			
			$aOptions['featured3-title'] = 'Title slider three';
			$aOptions['featured3-image'] = 'http://dl.dropbox.com/u/1933107/elal/sl.jpg';
			$aOptions['featured3-link'] = '/about/';
			$aOptions['featured3-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
			
			$aOptions['featured4-title'] = 'Title slider four';
			$aOptions['featured4-image'] = 'http://dl.dropbox.com/u/1933107/elal/sl.jpg';
			$aOptions['featured4-link'] = '/about/';
			$aOptions['featured4-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
			
      $aOptions['featured5-title'] = 'Mid box 1';
			$aOptions['featured5-link'] = '/about/';
			$aOptions['featured5-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
			
      $aOptions['featured6-title'] = 'Mid box 2';
			$aOptions['featured6-link'] = '/about/';
			$aOptions['featured6-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
			
			$aOptions['featured7-title'] = 'Mid box 3';
			$aOptions['featured7-link'] = '/about/';
			$aOptions['featured7-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
			
      $aOptions['featured8-title'] = 'Mid box 4';
			$aOptions['featured8-link'] = '/about/';
			$aOptions['featured8-desc'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum emphasised text dolor sit amet, strong text consectetur adipisicing elit, abbreviated ...';
									
			update_option('elal_theme', $aOptions);
		}
		return $aOptions;
	}
	function displayOptions () {
		$aOptions = elal::initOptions(false);
?>
<div class="wrap">
	<h2>elal Theme Options</h2>
	<p>You can edit slider options including the links and text by using the fields below.</p>

<div id="sideblock" style="float:right;width:220px;margin-left:10px;"> 
     <h3>Information</h3>
     <div id="dbx-content" style="text-decoration:none;">       
 			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/milo.png" /><a style="text-decoration:none;" href="http://3oneseven.com/"> 3oneseven</a><br /><br />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/more.png" /><a style="text-decoration:none;" href="http://3oneseven.com/projects/"> Cool design by milo</a><br /><br />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/twit.png" /><a style="text-decoration:none;" href="http://twitter.com/milo317"> Follow updates on Twitter</a><br /><br />			
</div>
</div> 
 
    <div style="margin-left:0px;">
    <form action="#" method="post" enctype="multipart/form-data" name="massive_form" id="massive_form">
		<fieldset name="general_options" class="options">
        <div style="border-bottom:1px solid #333;"></div>
        <h3 style="margin-bottom:0px;">Feature Options:</h3>
        <p style="margin-top:0px;">You can add text, link and titles by filling out the fields below.</p>
        
        
<h3>slider Article #1</h3>
        Title:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured1-title" id="featured1-title" value="<?php echo($aOptions['featured1-title']); ?>"></input>
        </div><br />
        
         Featured Image Location 200x180 pixels:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured1-image" id="featured1-image" size="30" value="<?php echo($aOptions['featured1-image']); ?>"></input> 
        </div><br />

        or upload an Image 200x180 pixels:<br />
		<tr valign="top" class="upload <?php echo ($aOptions['featured1-image']); ?>">
          <th scope="row"><label for="<?php echo ($aOptions['featured1-image']); ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
          <td>
		  <div id='imgupload'>
            <?php print get_upload_field('featured1-image', '', $aOptions['desc']); ?>
			</div>
          </td>
        </tr>
         
        Links To:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured1-link" id="featured1-link" size="30" value="<?php echo($aOptions['featured1-link']); ?>"></input>   
        </div><br />
        
        Description:<br />
		<div style="margin:0;padding:0;">
        <textarea style="margin:0;padding:0;width:80% !important;border:1px solid #ccc !important;" name="featured1-desc" cols="30" rows="2" id="featured1-desc"><?php echo($aOptions['featured1-desc']); ?></textarea>
		</div><br />
		
		<h3>slider Article #2</h3>
        Title:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured2-title" id="featured2-title" value="<?php echo($aOptions['featured2-title']); ?>"></input>
        </div><br />
       
       Featured Image Location 200x180 pixels:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured2-image" id="featured2-image" size="30" value="<?php echo($aOptions['featured2-image']); ?>"></input> 
        </div><br />

        or upload an Image 200x180 pixels:<br />
		<tr valign="top" class="upload <?php echo ($aOptions['featured2-image']); ?>">
          <th scope="row"><label for="<?php echo ($aOptions['featured2-image']); ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
          <td>
		  <div id='imgupload'>
            <?php print get_upload_field('featured2-image', '', $aOptions['desc']); ?>
			</div>
          </td>
        </tr>
        
        Links To:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured2-link" id="featured2-link" size="30" value="<?php echo($aOptions['featured2-link']); ?>"></input>   
        </div><br />
        
        Description:<br />
		<div style="margin:0;padding:0;">
        <textarea style="margin:0;padding:0;width:80% !important;border:1px solid #ccc !important;" name="featured2-desc" cols="30" rows="2" id="featured2-desc"><?php echo($aOptions['featured2-desc']); ?></textarea>
		</div><br />

<h3>slider Article #3</h3>
        Title:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured3-title" id="featured3-title" value="<?php echo($aOptions['featured3-title']); ?>"></input>
        </div><br />
       
         Featured Image Location 200x180 pixels:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured3-image" id="featured3-image" size="30" value="<?php echo($aOptions['featured3-image']); ?>"></input> 
        </div><br />

        or upload an Image 200x180 pixels:<br />
		<tr valign="top" class="upload <?php echo ($aOptions['featured3-image']); ?>">
          <th scope="row"><label for="<?php echo ($aOptions['featured3-image']); ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
          <td>
		  <div id='imgupload'>
            <?php print get_upload_field('featured3-image', '', $aOptions['desc']); ?>
			</div>
          </td>
        </tr>
        
        Links To:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured3-link" id="featured3-link" size="30" value="<?php echo($aOptions['featured3-link']); ?>"></input>   
        </div><br />
        
        Description:<br />
		<div style="margin:0;padding:0;">
        <textarea style="margin:0;padding:0;width:80% !important;border:1px solid #ccc !important;" name="featured3-desc" cols="30" rows="2" id="featured3-desc"><?php echo($aOptions['featured3-desc']); ?></textarea>
		</div><br />
		
		<h3>slider Article #4</h3>
        Title:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured4-title" id="featured4-title" value="<?php echo($aOptions['featured4-title']); ?>"></input>
        </div><br />
       
         Featured Image Location 200x180 pixels:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured4-image" id="featured4-image" size="30" value="<?php echo($aOptions['featured4-image']); ?>"></input> 
        </div><br />

        or upload an Image 200x180 pixels:<br />
		<tr valign="top" class="upload <?php echo ($aOptions['featured4-image']); ?>">
          <th scope="row"><label for="<?php echo ($aOptions['featured4-image']); ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
          <td>
		  <div id='imgupload'>
            <?php print get_upload_field('featured4-image', '', $aOptions['desc']); ?>
			</div>
          </td>
        </tr>
        
        Links To:<br />
		<div style="margin:0;padding:0;">
        <input style="margin:0;padding:0;width:80% !important;height:22px !important;border:1px solid #ccc !important;"  name="featured4-link" id="featured4-link" size="30" value="<?php echo($aOptions['featured4-link']); ?>"></input>   
        </div><br />
        
        Description:<br />
		<div style="margin:0;padding:0;">
        <textarea style="margin:0;padding:0;width:80% !important;border:1px solid #ccc !important;" name="featured4-desc" cols="30" rows="2" id="featured4-desc"><?php echo($aOptions['featured4-desc']); ?></textarea>
		</div><br />
				
		 <div style="border-bottom:1px solid #333;"></div>
     
                 
<div style="border-bottom:1px solid #333;"></div>
		</fieldset>
		<p class="submit"><input type="submit" name="elal_reset" value="Reset" /></p>
		<p class="submit"><input type="submit" name="elal_save" value="Save" /></p>
	</form>      
</div>
<?php
	}
}
// Register functions
add_action('admin_menu', array('elal', 'addOptions'));
?>