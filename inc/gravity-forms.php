<?php

// tab index with multiple forms fix
add_filter('gform_tabindex', 'change_tabindex', 10, 2);
function change_tabindex($tabindex, $form)
{
    return false;
}

add_filter('gform_field_content', 'add_sr_only_to_labels', 10, 5);
function add_sr_only_to_labels($field_content, $field, $value, $lead_id, $form_id)
{
    // Replace '1' with your specific Form ID
    if ($form_id == 1 || $form_id == 3) {
        $field_content = preg_replace('/(<label.*?class=["\'])(.*?)(["\'].*?>)/', '$1$2 sr-only$3', $field_content);
}
return $field_content;
}

function create_pestroutes_customer($auth_key, $auth_token, $first_name, $last_name, $email, $phone, $zip, $address =
null, $city = null, $state = null)
{
$create_user_endpoint_url = 'https://simplepest.pestroutes.com/api/customer/create?authenticationToken=' . $auth_token .
'&authenticationKey=' . $auth_key;

$create_user_endpoint_url = $create_user_endpoint_url . '&fname=' . $first_name . '&lname=' . $last_name . '&phone1=' .
preg_replace("/[^0-9]+/", "", $phone) . '&email=' . $email . '&zip=' . $zip . '&address=' . $address . '&city=' . $city
. '&state=' . $state . '&sourceID=16';

$response = wp_remote_post($create_user_endpoint_url);
$decoded_response = json_decode(wp_remote_retrieve_body($response), true);

return $decoded_response['result'];
}

function create_pestroutes_note($auth_key, $auth_token, $customer_id, $pest_type, $pest_type_other)
{
$add_note_endpoint = 'https://simplepest.pestroutes.com/api/note/create?authenticationToken=' . $auth_token .
'&authenticationKey=' . $auth_key . '&customerID=' . $customer_id . '&date=' . date("Y-m-d") . '&contactType=28&notes='
. $pest_type . $pest_type_other . '&showOnInvoice=0';

$note_response = wp_remote_post($add_note_endpoint);
}

function create_pestroutes_subscription($auth_key, $auth_token, $customer_id, $pest_type)
{

$services = [
'Ants' => 4,
'Spiders' => 4,
'Silverfish' => 4,
'Beetles' => 4,
'Grain Bugs' => 4,
'Wasps' => 4,
'Bees' => 4,
'Flies' => 4,
'Mosquitos' => 18,
'Cockroaches' => 13,
'Rodents' => 28,
'Gophers' => 20,
'Bed Bugs' => 7,
'Other' => 9,
'web-1' => 30,
'web-2' => 31,
'web-3' => 32,
];

$service_id = $services[$pest_type];

$create_sub_endpoint_url = 'https://simplepest.pestroutes.com/api/subscription/create?authenticationToken=' .
$auth_token . '&authenticationKey=' . $auth_key;

$create_sub_endpoint_url = $create_sub_endpoint_url . '&serviceID=' . $service_id . '&customerID=' . $customer_id .
'&active=0&sourceID=16';

$response = wp_remote_post($create_sub_endpoint_url);
$decoded_response = json_decode(wp_remote_retrieve_body($response), true);

return $decoded_response['result'];
}

function update_pestroutes_subscription_to_lead($auth_key, $auth_token, $sub_id)
{
$update_sub_endpoint_url = 'https://simplepest.pestroutes.com/api/subscription/updateLeadStage?authenticationToken=' .
$auth_token . '&authenticationKey=' . $auth_key . '&status=0&subscriptionID=' . $sub_id;
$response = wp_remote_post($update_sub_endpoint_url);
}

add_action('gform_after_submission_1', 'submit_estimate_form_to_pestroutes', 10, 2);

add_action('gform_after_submission_3', 'submit_estimate_form_to_pestroutes', 10, 2);

// subscribe form
add_action('gform_after_submission_4', 'submit_subscribe_form_to_pestroutes', 10, 2);

function submit_estimate_form_to_pestroutes($entry, $form)
{
$auth_key = get_field('pest_routes_auth_key', 'option');
$auth_token = get_field('pest_routes_auth_token', 'option');

if ($auth_key && $auth_token) {

// get form inputs from entry
$first_name = rawurlencode(rgar($entry, '7.3'));
$last_name = rawurlencode(rgar($entry, '7.6'));
$email = rgar($entry, '2');
$phone = rgar($entry, '3');
$zip = rgar($entry, '8');
$pest_type = rgar($entry, '5');
$pest_type_other = '%20' . rawurlencode(rgar($entry, '6'));

$new_user_id = create_pestroutes_customer($auth_key, $auth_token, $first_name, $last_name, $email, $phone, $zip);

create_pestroutes_note($auth_key, $auth_token, $new_user_id, $pest_type, $pest_type_other);

$new_sub_id = create_pestroutes_subscription($auth_key, $auth_token, $new_user_id, $pest_type);

update_pestroutes_subscription_to_lead($auth_key, $auth_token, $new_sub_id);
} else {
error_log('no PR auth');
}
}

function submit_subscribe_form_to_pestroutes($entry, $form)
{
$auth_key = get_field('pest_routes_auth_key', 'option');
$auth_token = get_field('pest_routes_auth_token', 'option');

if ($auth_key && $auth_token) {

// get form inputs from entry
$first_name = rawurlencode(rgar($entry, '1.3'));
$last_name = rawurlencode(rgar($entry, '1.6'));
$email = rgar($entry, '2');
$phone = rgar($entry, '3');
$address = rgar($entry, '4.1');
$city = rgar($entry, '4.3');
$state = rgar($entry, '4.4');
$zip = rgar($entry, '4.5');
$service = rgar($entry, '5');

$new_user_id = create_pestroutes_customer($auth_key, $auth_token, $first_name, $last_name, $email, $phone, $zip,
$address, $city, $state);

$new_sub_id = create_pestroutes_subscription($auth_key, $auth_token, $new_user_id, $service);
} else {
error_log('no PR auth');
}
}

add_filter('gform_us_states', 'us_states');

function us_states($states)
{
$new_states = array();
foreach ($states as $state) {
$new_states[GF_Fields::get('address')->get_us_state_code($state)] = $state;
}

return $new_states;
}

add_filter('gform_field_validation', function ($result, $value, $form, $field) {
if ('name' === $field->type && $field->isRequired) {
// Input values.
$prefix = rgar($value, $field->id . '.2');
$first = rgar($value, $field->id . '.3');
$middle = rgar($value, $field->id . '.4');
$last = rgar($value, $field->id . '.6');
$suffix = rgar($value, $field->id . '.8');

$name_field = array('2' => $prefix, '3' => $first, '4' => $middle, '6' => $last, '8' => $suffix);

foreach ($name_field as $input_number => $input_value) {
if (strlen($input_value) > 20) {
$field->set_input_validation_state($input_number, false); // Only for Gravity Forms 2.5.10 or higher.
$result['is_valid'] = false;
$result['message'] = empty($field->errorMessage) ? __('Too many characters', 'gravityforms') : $field->errorMessage;
error_log('Too many characters in: ' . $field->id . ' ' . $input_number);
}
}
}
return $result;
}, 10, 4);

//add_filter( 'gform_field_validation_1_8', 'zip_code_validation', 10, 4 );
//add_filter( 'gform_field_validation_3_9', 'zip_code_validation', 10, 4 );

function zip_code_validation($result, $value, $form, $field)
{

$first_two = substr($value, 0, 2);
$zip_status = 0;

if ($first_two == 91 || $first_two == 92) {
$zip_status = 1;
}

if ($result['is_valid'] && $zip_status != 1) {
$result['is_valid'] = false;
$result['message'] = 'Please contact customer support at' . get_field('phone_number', 'option');
}
return $result;
}