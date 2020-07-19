<?php
// Add bootstrap classes
// add_filter("gform_field_content", "bootstrap_styles_for_gravityforms_fields", 10, 5);
// function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){
// 	// Currently only applies to most common field types, but could be expanded.

// 	if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
// 		$content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
// 	}

// 	if($field["type"] == 'name' || $field["type"] == 'address') {
// 		$content = str_replace('<input ', '<input class=\'form-control\' ', $content);
//     }
    
//     if($field["type"] == 'text') {
// 		$content = str_replace('<input ', '<input class=\'form-control\' ', $content);
// 	}

// 	if($field["type"] == 'textarea') {
// 		$content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
// 	}

// 	if($field["type"] == 'checkbox') {
// 		$content = str_replace('li class=\'', 'li class=\'form-check ', $content);
// 		$content = str_replace('<input ', '<input style=\'margin-top:-2px\' ', $content);
// 		$content = str_replace('<label ', '<label class=\'form-check-label\' ', $content);
// 	}

// 	if($field["type"] == 'radio') {
// 		$content = str_replace('li class=\'', 'li class=\'radio ', $content);
// 		$content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
// 	}

// 	return $content;

// } // End bootstrap_styles_for_gravityforms_fields()
// add_filter("gform_submit_button", "form_submit_button", 10, 2);
// function form_submit_button($button, $form){
//     return "<button class='button btn btn-primary' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";
// }

// add_filter( 'gform_field_container', 'my_field_container', 10, 6 );
// function my_field_container( $field_container, $field, $form, $css_class, $style, $field_content ) {
//     return '<div class="form-group">{FIELD_CONTENT}</div>';
//}