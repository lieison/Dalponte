<?php
add_shortcode('cs-piechart', 'cs_piechart_render');
$piechart_callback = 0;
function cs_piechart_render($params, $content = null){
	global $piechart_callback;
	extract(shortcode_atts(array(
	'title' => '',
	'title_tag'=>'h4',
	'title_color'=>'',
	'description' => '',
	'type' => 'doughnut',
	'inner_cutout'=> '0',
	'style'=>'1',
	'width'=>'176',
	'height'=>'176',
	'el_class'=>'',
	'values' =>"{'value':300,'color':'#F7464A','highlight':'#FF5A5E','label':'Red'},{'value':50,'color':'#46BFBD','highlight':'#5AD3D1','label':'Green'},{'value':100,'color':'#FDB45C','highlight':'#FFC870','label':'Yellow'}",
	'values2'=>'JTdCJTIybGFiZWxzJTIyJTNBJTVCJTIySmFudWFyeSUyMiUyQyUyMkZlYnJ1YXJ5JTIyJTJDJTIyTWFyY2glMjIlMkMlMjJBcHJpbCUyMiUyQyUyMk1heSUyMiUyQyUyMkp1bmUlMjIlMkMlMjJKdWx5JTIyJTVEJTJDJTIyZGF0YXNldHMlMjIlM0ElNUIlN0IlMjJsYWJlbCUyMiUzQSUyMk15JTIwRmlyc3QlMjBkYXRhc2V0JTIyJTJDJTIyZmlsbENvbG9yJTIyJTNBJTIycmdiYSUyODIyMCUyQzIyMCUyQzIyMCUyQzAuMiUyOSUyMiUyQyUyMnN0cm9rZUNvbG9yJTIyJTNBJTIycmdiYSUyODIyMCUyQzIyMCUyQzIyMCUyQzElMjklMjIlMkMlMjJwb2ludENvbG9yJTIyJTNBJTIycmdiYSUyODIyMCUyQzIyMCUyQzIyMCUyQzElMjklMjIlMkMlMjJwb2ludFN0cm9rZUNvbG9yJTIyJTNBJTIyJTIzZmZmJTIyJTJDJTIycG9pbnRIaWdobGlnaHRGaWxsJTIyJTNBJTIyJTIzZmZmJTIyJTJDJTIycG9pbnRIaWdobGlnaHRTdHJva2UlMjIlM0ElMjJyZ2JhJTI4MjIwJTJDMjIwJTJDMjIwJTJDMSUyOSUyMiUyQyUyMmRhdGElMjIlM0ElNUI2NSUyQzU5JTJDODAlMkM4MSUyQzU2JTJDNTUlMkM0MCU1RCU3RCUyQyU3QiUyMmxhYmVsJTIyJTNBJTIyTXklMjBTZWNvbmQlMjBkYXRhc2V0JTIyJTJDJTIyZmlsbENvbG9yJTIyJTNBJTIycmdiYSUyODE1MSUyQzE4NyUyQzIwNSUyQzAuMiUyOSUyMiUyQyUyMnN0cm9rZUNvbG9yJTIyJTNBJTIycmdiYSUyODE1MSUyQzE4NyUyQzIwNSUyQzElMjklMjIlMkMlMjJwb2ludENvbG9yJTIyJTNBJTIycmdiYSUyODE1MSUyQzE4NyUyQzIwNSUyQzElMjklMjIlMkMlMjJwb2ludFN0cm9rZUNvbG9yJTIyJTNBJTIyJTIzZmZmJTIyJTJDJTIycG9pbnRIaWdobGlnaHRGaWxsJTIyJTNBJTIyJTIzZmZmJTIyJTJDJTIycG9pbnRIaWdobGlnaHRTdHJva2UlMjIlM0ElMjJyZ2JhJTI4MTUxJTJDMTg3JTJDMjA1JTJDMSUyOSUyMiUyQyUyMmRhdGElMjIlM0ElNUIyOCUyQzQ4JTJDNDAlMkMxOSUyQzg2JTJDMjclMkM5MCU1RCU3RCU1RCU3RA==',
	'class' => ''
			), $params));

	wp_enqueue_style('piechar', CSCORE_PLUGIN_URL . "framework/shortcodes/piechart/piechar.css");
	wp_enqueue_script('chart', CSCORE_PLUGIN_URL . "framework/shortcodes/piechart/Chart.min.js");
	wp_enqueue_script('waypoints');
	wp_enqueue_script('piechar', CSCORE_PLUGIN_URL . "framework/shortcodes/piechart/cs-piechar.js");

	if($type == 'doughnut'){
	    $inner_cutout = 50;
	}


	$objvalue = array();
	$data_value = '';
	if($type == 'doughnut' || $type == 'pie' || $type == 'polararea'){
	    $data_value = "[".strip_tags($values)."]";
	    $data_value = str_replace("'", '"', $data_value);
	    $objvalue = json_decode($data_value);
	    $data_value = rawurlencode($data_value);
	} else {
	    $data_value = $values2;
	}

	$styles = array();
	if($title_color){
		$styles[] = 'color:'.$title_color.';';
	}
	$styles = cshero_build_style($styles);

	ob_start();
	?>
	<div id="cs-full-piechart-<?php echo $piechart_callback; ?>" class="cs-full-piechart style-<?php echo $style; ?> <?php echo $el_class; ?>" data-value="<?php echo $data_value; ?>" data-type="<?php echo $type; ?>" data-cutout="<?php echo $inner_cutout; ?>">
		<div class="cs-full-piechart-content title">
		<?php if($title != '' && $style != '4' && $style != '5'): ?>
			<div class="cs-full-piechart-title"><<?php echo $title_tag; ?> <?php echo $styles; ?>><?php echo $title; ?></<?php echo $title_tag; ?>></div>
		<?php endif; ?>
		<?php if(is_array($objvalue) && $style == '2'): ?>
			<div class="cs-full-piechart-meta">
				<ul class="cs-piechart-list">
					<?php foreach ($objvalue as $value):?>
					<li><div class="item_color" style="background: <?php echo $value->color; ?>"></div><?php echo $value->label; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		<?php if($description != '' && $style == '6'): ?>
			<div class="cs-full-piechart-description"><span><?php echo $description; ?></span></div>
		<?php endif; ?>
		</div>
		<?php if($style == '5'){ echo '<div class="cs-main-style-5">'; } ?>
		<div id="canvas-holder">
			<?php if($title != '' && $style == '5'): ?>
			<div class="cs-full-piechart-title"><<?php echo $title_tag; ?> <?php echo $styles; ?>><?php echo $title; ?></<?php echo $title_tag; ?>></div>
			<?php endif; ?>
			<div class="cs-main-canvas<?php if($style == '6' || $style == '4'){ echo " cs-full-piechart-canvas"; } ?>" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;">
				<canvas id="chart-area-<?php echo $piechart_callback; ?>" class="cs-chart" width="<?php echo $width; ?>" height="<?php echo $height ?>"></canvas>
			</div>
			<?php if(is_array($objvalue) && ($style == '6' || $style == '4')): ?>
				<div class="cs-full-piechart-meta">
					<ul class="cs-piechart-list">
						<?php foreach ($objvalue as $value):?>
						<li><div class="item_color" style="background: <?php echo $value->color; ?>"></div><?php echo $value->label; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="cs-full-piechart-content">
		<?php if($title != '' && $style == '4'): ?>
			<div class="cs-full-piechart-title"><<?php echo $title_tag; ?> <?php echo $styles; ?>><?php echo $title; ?></<?php echo $title_tag; ?>></div>
		<?php endif; ?>
		<?php if(is_array($objvalue) && ($style == '1' || $style == '5')): ?>
			<div class="cs-full-piechart-meta">
				<ul class="cs-piechart-list">
					<?php foreach ($objvalue as $value):?>
					<li><div class="item_color" style="background: <?php echo $value->color; ?>"></div><?php echo $value->label; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		<?php if($description != '' && $style != '6' && $style != '5'): ?>
			<div class="cs-full-piechart-description"><span><?php echo $description; ?></span></div>
		<?php endif; ?>
		<?php if(is_array($objvalue) && $style == '3'): ?>
			<div class="cs-full-piechart-meta">
				<ul class="cs-piechart-list">
					<?php foreach ($objvalue as $value):?>
					<li><div class="item_color" style="background: <?php echo $value->color; ?>"></div><?php echo $value->label; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		</div>
		<?php if($style == '5'){ echo '</div>'; } ?>
		<?php if($description != '' && $style == '5'): ?>
			<div class="cs-full-piechart-description"><span><?php echo $description; ?></span></div>
		<?php endif; ?>
	</div>
	<?php
	$piechart_callback++;
	return ob_get_clean();
}
