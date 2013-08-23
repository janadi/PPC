<?php
function spg_get_def_settings()
{
	$spg_settings = array('bannerWidth' => '600',
			'bannerHeight' => '600',
			'wmode' => 'transparent',
			'baseColor' => '000000',
			'fullscreen' => '1',
			'autoSlide' => '1',
			'transitionTime' => '1.5',
			'autoSlideTimer' => '3',
			'autoScale' => '1',
			'autoScaleThumb' => '0',
			'autoAlign' => '1',
			'showPlay' => '1',
			'showNextPrev' => '1',
			'arrowsColor' => '666666',
			'ImageHeight' => '400',
			'ImageWidth' => '550',
			'ThumbRows' => '3',
			'thumbWidth' => '90',
			'thumbHeight' => '90',
			'thumbColor' => '000000',
			'thumbSelectedColor' => '000000',
			'descAlpha' => '1.5',
			'descColorBack' => '000000',
			'descTextColor' => 'ffffff',
			'descTextSize' => '12',
			'tooltipColor' => 'CCCCCC',
			'tooltipTextColor' => '000000',
			'scrollArrowsColor' => '9ADE0A',
			'scrollBackColor' => 'ffffff',
			'scrollButtonColor' => 'C9C4AD',
			'transitionType' => '3',
			'gradient1' => 'ff0000',
			'gradient2' => 'ffffff',
			'nextprevBackColor' => '9F3811',
			'nextprevArrowColor' => 'ffffff',
			'nextprevArrowOverColor' => '91FF00',
			'show_desc' => 'yes',
			'thumb_tooltip_text_show' => 'yes',
			'target' => '_self'		
			);
	return $spg_settings;
}
function __get_spg_xml_settings()
{
	$ops = get_option('spg_settings', array());
	
	$xml_settings = '<baseDef
	fullscreen="'.trim($ops['fullscreen']).'"
	transitionTime="'.trim($ops['transitionTime']).'"
	autoSlideTimer="'.trim($ops['autoSlideTimer']).'"
	autoScale="'.trim($ops['autoScale']).'"
	autoScaleThumb="'.trim($ops['autoScaleThumb']).'"
	autoAlign="'.trim($ops['autoAlign']).'"
	showPlay="'.trim($ops['showPlay']).'"
	showNextPrev="'.trim($ops['showNextPrev']).'"
	arrowsColor= "0x'.trim($ops['arrowsColor']).'"
	ImageHeight="'.trim($ops['ImageHeight']).'"
	ImageWidth="'.trim($ops['ImageWidth']).'" 
	ThumbRows="'.trim($ops['ThumbRows']).'"
	thumbWidth="'.trim($ops['thumbWidth']).'"
	thumbHeight="'.trim($ops['thumbHeight']).'"
	thumbColor="0x'.trim($ops['thumbColor']).'"
	thumbSelectedColor="0x'.trim($ops['thumbSelectedColor']).'"
	descAlpha="'.trim($ops['descAlpha']).'"
	descColorBack="0x'.trim($ops['descColorBack']).'"
	descTextColor="0x'.trim($ops['descTextColor']).'"
	descTextSize="'.trim($ops['descTextSize']).'"
	tooltipColor="0x'.trim($ops['tooltipColor']).'"
	tooltipTextColor="0x'.trim($ops['tooltipTextColor']).'"
	scrollArrowsColor="0x'.trim($ops['scrollArrowsColor']).'"

	scrollBackColor="0x'.trim($ops['scrollBackColor']).'"
	scrollButtonColor="0x'.trim($ops['scrollButtonColor']).'"
	nextprevBackColor="0x'.trim($ops['nextprevBackColor']).'"
	nextprevArrowColor="0x'.trim($ops['nextprevArrowColor']).'"
	nextprevArrowOverColor="0x'.trim($ops['nextprevArrowOverColor']).'"
	transitionType = "'.trim($ops['transitionType']).'"
	backgroundColor= "0x'.trim($ops['gradient1']).'"
	backgroundColor1= "0x'.trim($ops['gradient2']).'"
	autoSlide= "'.trim($ops['autoSlide']).'"
	/>';
	return $xml_settings;
}
function spg_get_album_dir($album_id)
{
	global $gspl;
	$album_dir = SPL_PLUGIN_UPLOADS_DIR . "/{$album_id}_uploadfolder";
	return $album_dir;
}
/**
 * Get album url
 * @param $album_id
 * @return unknown_type
 */
function spg_get_album_url($album_id)
{
	global $gspl;
	$album_url = SPL_PLUGIN_UPLOADS_URL . "/{$album_id}_uploadfolder";
	return $album_url;
}
function spg_get_table_actions(array $tasks)
{
	?>
	<div class="bulk_actions">
		<form action="" method="post" class="bulk_form">Bulk action
			<select name="task">
				<?php foreach($tasks as $t => $label): ?>
				<option value="<?php print $t; ?>"><?php print $label; ?></option>
				<?php endforeach; ?>
			</select>
			<button class="button-secondary do_bulk_actions" type="submit">Do</button>
		</form>
	</div>
	<?php 
}
function shortcode_display_spg_gallery($atts)
{
	$vars = shortcode_atts( array(
									'cats' => '',
									'imgs' => '',
								), 
							$atts );
	//extract( $vars );
	
	$ret = display_spg_gallery($vars);
	return $ret;
}
function Extract_yt_video_spg($video)
{
//http://www.youtube.com/watch?v=BWzU41YxFco&feature=fvwrel
//http://www.youtube.com/watch?NR=1&feature=fvwp&v=3KNpn-XGM04
//http://www.youtube.com/watch?v=85Fc2amPf34&feature=g-vrec&context=G296558aRVAAAAAAAAAQ
	$v_str1 = strstr($video, '?v=');
	if (!$v_str1) {
		$v_str1 = strstr($video, '&v=');
		if (!$v_str1) {
			$v_str1 = strstr($video, '/v=');
		}
	}
	
	if ($v_str1) {
		$v_arr = explode('&', substr($v_str1, 3));
		$ret_v = $v_arr[0];
	} else {
		$ret_v = $video;
	}
	return $ret_v;
}
function display_spg_gallery($vars)
{
	global $wpdb, $gspl;
	$ops = get_option('spg_settings', array());
	//print_r($ops);
	$albums = null;
	$images = null;
	$cids = trim($vars['cats']);
	if (strlen($cids) != strspn($cids, "0123456789,")) {
		$cids = '';
		$vars['cats'] = '';
	}
	$imgs = trim($vars['imgs']);
	if (strlen($imgs) != strspn($imgs, "0123456789,")) {
		$imgs = '';
		$vars['imgs'] = '';
	}
	$categories = '';
	$xml_filename = '';
	if( !empty($cids) && $cids{strlen($cids)-1} == ',')
	{
		$cids = substr($cids, 0, -1);
	}
	if( !empty($imgs) && $imgs{strlen($imgs)-1} == ',')
	{
		$imgs = substr($imgs, 0, -1);
	}
	//check for xml file
	if( !empty($vars['cats']) )
	{
		$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';	
	}
	elseif( !empty($vars['imgs']))
	{
		$xml_filename = "image_".str_replace(',', '', $imgs) . '.xml';
	}
	else
	{
		$xml_filename = "spg_all.xml";
	}
	//die(SPL_PLUGIN_XML_DIR . '/' . $xml_filename);


	
	if( !empty($vars['cats']) )
	{
		$query = "SELECT * FROM {$wpdb->prefix}spg_albums WHERE album_id IN($cids) AND status = 1 ORDER BY `order` ASC";
		//print $query;
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $gspl->spg_get_album_images($album['album_id']);
			if ($images && !empty($images) && is_array($images)) {
				$album_dir = spg_get_album_url($album['album_id']);//SPL_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				foreach($images as $key => $img)
				{
					if( $img['status'] == 0 ) continue;
					
					$categories .= '		<pic url="'.((isset($img['link'])) ? trim($img['link']) : '').'" target="'.trim($ops['target']).'"';
					$categories .= ' thumb="'.(trim($album_dir."/thumb/".$img['thumb'])).'"';
					$categories .= ' pic="'.trim($album_dir."/big/".$img['image']).'"';
					if (trim($img['yvideo']) != '') {
						$c_video = Extract_yt_video_spg($img['yvideo']);
					} else {
						$c_video = '';
					}
					$categories .= '	video="'.$c_video.'" > ';
					if ($ops['show_desc'] == 'yes') {
						$product_desc = '<![CDATA['.((isset($img['description'])) ? trim($img['description']) : '').']]> ';
					}else{
						$product_desc='';
					}
					$categories .= '	<desc>'.$product_desc.'</desc>';
					if ($ops['thumb_tooltip_text_show'] == 'yes') {
						$thumb_tooltip_text = '<![CDATA['.((isset($img['title'])) ? trim($img['title']) : '').']]> ';
					}else{
						$thumb_tooltip_text='';
					}
					$categories .= ' <tip>'.$thumb_tooltip_text.'</tip> ';
					$categories .= '	</pic> ';
				}
			}
		}
		//$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';
	}
	elseif( !empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}spg_images WHERE image_id IN($imgs) AND status = 1 ORDER BY `order` ASC";
		$images = $wpdb->get_results($query, ARRAY_A);
		if ($images && !empty($images) && is_array($images)) {
			foreach($images as $key => $img)
			{
				$album = $gspl->spg_get_album($img['category_id']);
				$album_dir = spg_get_album_url($album['album_id']);//SPL_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				if( $img['status'] == 0 ) continue;
				
					$categories .= '		<pic url="'.((isset($img['link'])) ? trim($img['link']) : '').'" target="'.trim($ops['target']).'"';
					$categories .= ' thumb="'.(trim($album_dir."/thumb/".$img['thumb'])).'"';
					$categories .= ' pic="'.trim($album_dir."/big/".$img['image']).'"';
					if (trim($img['yvideo']) != '') {
						$c_video = Extract_yt_video_spg($img['yvideo']);
					} else {
						$c_video = '';
					}
					$categories .= '	video="'.$c_video.'" > ';
					if ($ops['show_desc'] == 'yes') {
						$product_desc = '<![CDATA['.((isset($img['description'])) ? trim($img['description']) : '').']]> ';
					}else{
						$product_desc='';
					}
					$categories .= '	<desc>'.$product_desc.'</desc>';
					if ($ops['thumb_tooltip_text_show'] == 'yes') {
						$thumb_tooltip_text = '<![CDATA['.((isset($img['title'])) ? trim($img['title']) : '').']]> ';
					}else{
						$thumb_tooltip_text='';
					}
					$categories .= ' <tip>'.$thumb_tooltip_text.'</tip> ';
					$categories .= '	</pic> ';	

			}
		}
	}
	//no values paremeters setted
	else//( empty($vars['cats']) && empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}spg_albums WHERE status = 1 ORDER BY `order` ASC";
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $gspl->spg_get_album_images($album['album_id']);
			$album_dir = spg_get_album_url($album['album_id']);//SPL_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
			if ($images && !empty($images) && is_array($images)) {
				foreach($images as $key => $img)
				{
					if($img['status'] == 0 ) continue;
					
					$categories .= '		<pic url="'.((isset($img['link'])) ? trim($img['link']) : '').'" target="'.trim($ops['target']).'"';
					$categories .= ' thumb="'.(trim($album_dir."/thumb/".$img['thumb'])).'"';
					$categories .= ' pic="'.trim($album_dir."/big/".$img['image']).'"';
					if (trim($img['yvideo']) != '') {
						$c_video = Extract_yt_video_spg($img['yvideo']);
					} else {
						$c_video = '';
					}
					$categories .= '	video="'.$c_video.'" > ';
					if ($ops['show_desc'] == 'yes') {
						$product_desc = '<![CDATA['.((isset($img['description'])) ? trim($img['description']) : '').']]> ';
					}else{
						$product_desc='';
					}
					$categories .= '	<desc>'.$product_desc.'</desc>';
					if ($ops['thumb_tooltip_text_show'] == 'yes') {
						$thumb_tooltip_text = '<![CDATA['.((isset($img['title'])) ? trim($img['title']) : '').']]> ';
					}else{
						$thumb_tooltip_text='';
					}
					$categories .= ' <tip>'.$thumb_tooltip_text.'</tip> ';
					$categories .= '	</pic> ';		

				}
			}
		}
		//$xml_filename = "spg_all.xml";
	}
	
	$xml_tpl = __get_spg_xml_template();
	$settings = __get_spg_xml_settings();
	$xml = str_replace(array('{settings}', '{categories}'), 
						array($settings, $categories), $xml_tpl);
	//write new xml file
	$fh = fopen(SPL_PLUGIN_XML_DIR . '/' . $xml_filename, 'w+');
	fwrite($fh, $xml);
	fclose($fh);
	//print "<h3>Generated filename: $xml_filename</h3>";
	//print $xml;
	if( file_exists(SPL_PLUGIN_XML_DIR . '/' . $xml_filename ) )
	{
		$fh = fopen(SPL_PLUGIN_XML_DIR . '/' . $xml_filename, 'r');
		$xml = fread($fh, filesize(SPL_PLUGIN_XML_DIR . '/' . $xml_filename));
		fclose($fh);
		//print "<h3>Getting xml file from cache: $xml_filename</h3>";
		$ret_str = "
		<script language=\"javascript\">AC_FL_RunContent = 0;</script>
<script src=\"".SPL_PLUGIN_URL."/js/AC_RunActiveContent.js\" language=\"javascript\"></script>

		<script language=\"javascript\"> 
	if (AC_FL_RunContent == 0) {
		alert(\"This page requires AC_RunActiveContent.js.\");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '".$ops['bannerWidth']."',
			'height', '".$ops['bannerHeight']."',
			'src', '".SPL_PLUGIN_URL."/js/wp_splendidgallery',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', '".$ops['wmode']."',
			'devicefont', 'false',
			'id', 'xmlswf_vmspl',
			'bgcolor', '".$ops['backgroundColor']."',
			'name', 'xmlswf_vmspl',
			'menu', 'true',
			'allowFullScreen', 'true',
			'allowScriptAccess','sameDomain',
			'movie', '".SPL_PLUGIN_URL."/js/wp_splendidgallery',
			'salign', '',
			'flashVars','baseColor=".$baseColor."&amp;xmlfileurl=".SPL_PLUGIN_URL."/xml/$xml_filename'
			); //end AC code
	}
</script>
";
//echo SPL_PLUGIN_UPLOADS_URL."<hr>";
//		print $xml;
		return $ret_str;
	}
	return true;
}
function __get_spg_xml_template()
{
	$xml_tpl = '<?xml version="1.0" encoding="UTF-8"?>

<slideshow >
{settings}

{categories}
</slideshow>';
	return $xml_tpl;
}
?>