<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new thst_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="thst-popup">

	<div id="thst-shortcode-wrap">
		
		<div id="thst-sc-form-wrap">
		
			<div id="thst-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#thst-sc-form-head -->
			
			<form method="post" id="thst-sc-form">
			
				<table id="thst-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary thst-insert">Insert Shortcode</a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#thst-sc-form-table -->
				
			</form>
			<!-- /#thst-sc-form -->
		
		</div>
		<!-- /#thst-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#thst-shortcode-wrap -->

</div>
<!-- /#thst-popup -->

</body>
</html>