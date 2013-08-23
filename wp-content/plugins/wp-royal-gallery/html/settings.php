<?php
global $wpdb, $gspl;
$ops = get_option('spg_settings', array());
//$ops = array_merge($spg_settings, $ops);
?>
<div class="wrap">
	<h2><?php _e('Create XML File'); ?></h2>
	<form action="" method="post">
		<input type="hidden" name="task" value="save_spg_settings" />
		<table>
				<tr>
			<td title="<?php _e('Width of object .'); ?>"><?php _e('Gallery Width (px)'); ?></td>
			<td><input type="text" name="settings[bannerWidth]"  value="<?php print @$ops['bannerWidth']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Height of object '); ?>"><?php _e('Gallery Height (px)'); ?></td>
			<td><input type="text" name="settings[bannerHeight]"  value="<?php print @$ops['bannerHeight']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Select the wmode of flash'); ?>"><?php _e('wmode'); ?></td>
			<td>
				<select name="settings[wmode]">
					<option value="opaque" <?php print (@$ops['wmode'] == 'opaque') ? 'selected' : ''; ?>><?php _e('opaque'); ?></option>
					<option value="transparent" <?php print (@$ops['wmode'] == 'transparent') ? 'selected' : ''; ?>><?php _e('transparent'); ?></option>
					<option value="window" <?php print (@$ops['wmode'] == 'window') ? 'selected' : ''; ?>><?php _e('window'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Pre-loader color'); ?>"><?php _e('Background color'); ?></td>
			<td><input type="text" name="settings[baseColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['baseColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Fullscreen'); ?>"><?php _e('Fullscreen'); ?></td>
			<td>
				<select name="settings[fullscreen]">
					<option value="1" <?php print (@$ops['fullscreen'] == '1') ? 'selected' : ''; ?>><?php _e('yes'); ?></option>
					<option value="0" <?php print (@$ops['fullscreen'] == '0') ? 'selected' : ''; ?>><?php _e('no'); ?></option>
				</select>
			</td>
		</tr>	
		<tr>
			<td title="<?php _e('Start auto slider when slide show loads'); ?>"><?php _e('Start auto slider'); ?></td>
			<td>
				<input type="radio" name="settings[autoSlide]" value="1" <?php print (@$ops['autoSlide'] == '1') ? 'checked' : ''; ?>><span><?php _e('yes'); ?></span>
				<input type="radio" name="settings[autoSlide]" value="0" <?php print (@$ops['autoSlide'] == '0') ? 'checked' : ''; ?>><span><?php _e('no'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Transition Time'); ?>"><?php _e('Transition Time'); ?></td>
			<td><input type="text" name="settings[transitionTime]"  value="<?php print @$ops['transitionTime']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Auto Slide Timer'); ?>"><?php _e('Auto Slide Timer'); ?></td>
			<td><input type="text" name="settings[autoSlideTimer]"  value="<?php print @$ops['autoSlideTimer']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Auto Scale'); ?>"><?php _e('Auto Scale'); ?></td>
			<td>
				<select name="settings[autoScale]">
					<option value="1" <?php print (@$ops['autoScale'] == '1') ? 'selected' : ''; ?>><?php _e('yes'); ?></option>
					<option value="0" <?php print (@$ops['autoScale'] == '0') ? 'selected' : ''; ?>><?php _e('no'); ?></option>
				</select>
			</td>
		</tr>	
		<tr>
			<td title="<?php _e('Auto Scale Thumb'); ?>"><?php _e('Auto Scale  Thumb'); ?></td>
			<td>
				<select name="settings[autoScaleThumb]">
					<option value="1" <?php print (@$ops['autoScaleThumb'] == '1') ? 'selected' : ''; ?>><?php _e('yes'); ?></option>
					<option value="0" <?php print (@$ops['autoScaleThumb'] == '0') ? 'selected' : ''; ?>><?php _e('no'); ?></option>	
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Auto Align'); ?>"><?php _e('Auto Align'); ?></td>
			<td>
				<select name="settings[autoAlign]">
					<option value="1" <?php print (@$ops['autoAlign'] == '1') ? 'selected' : ''; ?>><?php _e('yes'); ?></option>
					<option value="0" <?php print (@$ops['autoAlign'] == '0') ? 'selected' : ''; ?>><?php _e('no'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('showPlay'); ?>"><?php _e('showPlay'); ?></td>
			<td>
				<select name="settings[showPlay]">
					<option value="1" <?php print (@$ops['showPlay'] == '1') ? 'selected' : ''; ?>><?php _e('yes'); ?></option>
					<option value="0" <?php print (@$ops['showPlay'] == '0') ? 'selected' : ''; ?>><?php _e('no'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('show Next Previous Thumbs'); ?>"><?php _e('showNextPrev'); ?></td>
			<td>
				<select name="settings[showNextPrev]">
					<option value="1" <?php print (@$ops['showNextPrev'] == '1') ? 'selected' : ''; ?>><?php _e('yes'); ?></option>
					<option value="0" <?php print (@$ops['showNextPrev'] == '0') ? 'selected' : ''; ?>><?php _e('no'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Arrows color'); ?>"><?php _e('Arrows color'); ?></td>
			<td><input type="text" name="settings[arrowsColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['arrowsColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Image height'); ?>"><?php _e('Image height'); ?></td>
			<td><input type="text" name="settings[ImageHeight]"  value="<?php print @$ops['ImageHeight']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Image width'); ?>"><?php _e('Image width'); ?></td>
			<td><input type="text" name="settings[ImageWidth]"  value="<?php print @$ops['ImageWidth']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumb rows'); ?>"><?php _e('Thumb rows'); ?></td>
			<td><input type="text" name="settings[ThumbRows]"  value="<?php print @$ops['ThumbRows']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumb width'); ?>"><?php _e('Thumb width'); ?></td>
			<td><input type="text" name="settings[thumbWidth]"  value="<?php print @$ops['thumbWidth']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumb height'); ?>"><?php _e('Thumb height'); ?></td>
			<td><input type="text" name="settings[thumbHeight]"  value="<?php print @$ops['thumbHeight']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumb color'); ?>"><?php _e('Thumb color'); ?></td>
			<td><input type="text" name="settings[thumbColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['thumbColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumb Selected color'); ?>"><?php _e('Thumb Selected color'); ?></td>
			<td><input type="text" name="settings[thumbSelectedColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['thumbSelectedColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description Alpha'); ?>"><?php _e('Description Alpha color'); ?></td>
			<td><input type="text" name="settings[descAlpha]"  value="<?php print @$ops['descAlpha']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description background color'); ?>"><?php _e('Description back color'); ?></td>
			<td><input type="text" name="settings[descColorBack]" class="color {hash:false,caps:false}" value="<?php print @$ops['descColorBack']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description text color'); ?>"><?php _e('Description text color'); ?></td>
			<td><input type="text" name="settings[descTextColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['descTextColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description text size'); ?>"><?php _e('Description text size'); ?></td>
			<td><input type="text" name="settings[descTextSize]"  value="<?php print @$ops['descTextSize']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Tooltip color'); ?>"><?php _e('Tooltip color'); ?></td>
			<td><input type="text" name="settings[tooltipColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['tooltipColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Tooltip text color'); ?>"><?php _e('Tooltip text color'); ?></td>
			<td><input type="text" name="settings[tooltipTextColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['tooltipTextColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Scroll Arrows Color'); ?>"><?php _e('Scroll Arrows Color'); ?></td>
			<td><input type="text" name="settings[scrollArrowsColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['scrollArrowsColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Scroll back color'); ?>"><?php _e('Scroll back color'); ?></td>
			<td><input type="text" name="settings[scrollBackColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['scrollBackColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Scroll button color'); ?>"><?php _e('Scroll button color'); ?></td>
			<td><input type="text" name="settings[scrollButtonColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['scrollButtonColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Transition Type'); ?>"><?php _e('Transition Type'); ?></td>
			<td>
				<select name="settings[transitionType]">
					<option value="1" <?php print (@$ops['transitionType'] == '1') ? 'selected' : ''; ?>><?php _e('Squares'); ?></option>
					<option value="2" <?php print (@$ops['transitionType'] == '2') ? 'selected' : ''; ?>><?php _e('Vertical bars sequence'); ?></option>
					<option value="3" <?php print (@$ops['transitionType'] == '3') ? 'selected' : ''; ?>><?php _e('alpha transition'); ?></option>
					<option value="4" <?php print (@$ops['transitionType'] == '4') ? 'selected' : ''; ?>><?php _e('MultiLines'); ?></option>
					<option value="5" <?php print (@$ops['transitionType'] == '5') ? 'selected' : ''; ?>><?php _e('Horizontal bars'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Gradient Color1'); ?>"><?php _e('Gradient Color1'); ?></td>
			<td><input type="text" name="settings[gradient1]" class="color {hash:false,caps:false}" value="<?php print @$ops['gradient1']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Gradient Color2'); ?>"><?php _e('Gradient Color2'); ?></td>
			<td><input type="text" name="settings[gradient2]" class="color {hash:false,caps:false}" value="<?php print @$ops['gradient2']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('next previous BackGround Color'); ?>"><?php _e('Nextprev BG Color'); ?></td>
			<td><input type="text" name="settings[nextprevBackColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['nextprevBackColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('next previous Arrow Color '); ?>"><?php _e('Nextprev Arrow Color'); ?></td>
			<td><input type="text" name="settings[nextprevArrowColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['nextprevArrowColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('next previous ArrowOver Color'); ?>"><?php _e('Next prev ArrowOver Color'); ?></td>
			<td><input type="text" name="settings[nextprevArrowOverColor]" class="color {hash:false,caps:false}" value="<?php print @$ops['nextprevArrowOverColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('show/hide image titles on top'); ?>"><?php _e('Show title'); ?></td>
			<td>
				<input type="radio" name="settings[show_desc]" value="yes" <?php print (@$ops['show_desc'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[show_desc]" value="no" <?php print (@$ops['show_desc'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Enable/Disable tootip on thumb image'); ?>"><?php _e('Show thumb tooltip'); ?></td>
			<td>
				<input type="radio" name="settings[thumb_tooltip_text_show]" value="yes" <?php print (@$ops['thumb_tooltip_text_show'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[thumb_tooltip_text_show]" value="no" <?php print (@$ops['thumb_tooltip_text_show'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Where do you load the target url when user clicks on the image'); ?>"><?php _e('Target Link'); ?></td>
			<td>
				<select name="settings[target]">
					<option value="_blank" <?php print (@$ops['target'] == '_blank') ? 'selected' : ''; ?>><?php _e('_blank'); ?></option>
					<option value="_self" <?php print (@$ops['target'] == '_self') ? 'selected' : ''; ?>><?php _e('_self'); ?></option>
				</select>
			</td>
		</tr>
		</table>
	<p><button type="submit" class="button-primary"><?php _e('Save Config'); ?></button></p>
	</form>
</div>