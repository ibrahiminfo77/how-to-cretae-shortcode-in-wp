<?php 

// Single tag shortcode with default parameters

function alpha_single_button($attributes){ 
	$default = array( 
		'type' => 'primary', 
		'title' => __('Button', 'alpha'), 
		'url' => '', 
	); 

	$button_attributes = shortcode_atts( $default, $attributes); 

	return sprintf('<a target="_blank" class="btn btn-%s" href="%s">%s</a> ', 
		$button_attributes['type'], 
		$button_attributes['url'], 
		$button_attributes['title'], 
	); 
} 

add_shortcode( 'button', 'alpha_single_button' );

// Double tag shortcode with default parameters

function alpha_double_button($attributes, $content=''){
	$default = array( 
		'type' => 'primary', 
		'title' => __('Button2', 'alpha'), 
		'url' => '', 
	); 

	$button_attributes = shortcode_atts( $default, $attributes);

	return sprintf('<a target="_blank" class="btn btn-%s" href="%s">%s</a> ', 
		$button_attributes['type'], 
		$button_attributes['url'], 
		do_shortcode( $content ) ); 
	} 
add_shortcode( 'button2', 'alpha_double_button' );

// Double tag nested shortcode with default parameters

function alpha_nested_button($attributes, $content=''){ 
	$default = array( 
		'type' => 'primary', 
		'title' => __('Button2', 'alpha'), 
		'url' => '', 
	); 

	$button_attributes = shortcode_atts( $default, $attributes); 

	return sprintf('<a target="_blank" class="btn btn-%s" href="%s">%s</a> ', 
		$button_attributes['type'], 
		$button_attributes['url'], 
		do_shortcode( $content ) ); 
} 
add_shortcode( 'button2', 'alpha_nested_button' ); 

function alpha_uppercase($attributes, $content=''){ 
	return strtoupper(do_shortcode( $content )); 
} 

add_shortcode( 'uc', 'alpha_uppercase' );


// Google Map Shortcode

function alpha_gmap_shortcode($attributes){ 
	$default = array( 
		'place' => 'Dhaka', 
		'width' => '800', 
		'height' => '500', 
		'zoom' => '14' 
	); 

	$params = shortcode_atts( $default, $attributes ); 
	$map =<<<EOD 
<div> 
	<div> 
		<iframe width="{$params['width']}" height="{$params['height']}" src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> 
		</iframe> 
	</div> 
</div> 
EOD; 

return $map;

} 

add_shortcode( 'gmap', 'alpha_gmap_shortcode' );

// Google Map Shortcode UI 
// Must Need Plugin: https://wordpress.org/plugins/shortcode-ui/

function alpha_gmap_ui(){

	$fields = array(
		array(
			'label' => __('place', 'alpha'),
			'attr' => 'place',
			'type' => 'text',
			'meta' => array(
				'placeholder' => __('place', 'alpha')
			),
		),
		array(
			'label' => __('Width', 'alpha'),
			'attr' => 'width',
			'type' => 'text',
			'meta' => array(
				'placeholder' => __('Width', 'alpha')
			),
		),
		array(
			'label' => __('Height', 'alpha'),
			'attr' => 'height',
			'type' => 'text',
			'meta' => array(
				'placeholder' => __('Height', 'alpha')
			),
		),
		array(
			'label' => __('Zoom', 'alpha'),
			'attr' => 'zoom',
			'type' => 'text',
			'meta' => array(
				'placeholder' => __('Zoom', 'alpha')
			),
		),
	);

	$settings = array(
		'label' => __('Google Map', 'alpha'),
		'listItemImage' => 'dashicons-admin-site-alt3',
		'post_type' => array('post', 'page'),
		'attrs' => $fields
	);

	shortcode_ui_register_for_shortcode('gmap', $settings);

}
add_action('register_shortcode_ui', 'alpha_gmap_ui');