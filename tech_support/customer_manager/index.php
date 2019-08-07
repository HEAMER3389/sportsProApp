<?php

require('../model/database.php');
require('../model/customer_db.php');
require_once('../model/validate.php');
require_once('../model/fields.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('postal_code');
$fields->addField('country_code');
$fields->addField('phone', 'Use 999-999-9999');
$fields->addField('email', 'Must be a vaild email address');
$fields->addField('password');

$action = filter_input(INPUT_POST, 'action');
  if ($action === NULL) {
    $action = 'search_customers';
  } else {
    $action = strtolower($action);
  }
  $firt_name = '';
  $last_name = '';
  $address = '';
  $city = '';
  $state = '';
  $postal_code = '';
  $country_code = '';
  $phone = '';
  $email = '';
  $password = '';

  $customers = array();

switch($action) {

  case 'search_customers':
  include('../customer_manager/search_customers.php');
  break;

  case 'run_search':
  $last_name = filter_input(INPUT_POST, 'last_name');
  $customers = search_customers($last_name);
  include('search_result_list.php');
  break;

  case 'select_customer':
  $email = filter_input(INPUT_POST, 'email');
  $customer = select_customer($email);
  include('selected_customer.php');
  break;

  case 'add_customer_form':
    $first_name = '';
    $last_name = '';
    $address = '';
    $city = '';
    $state = '';
    $postal_code = '';
    $country_code = '';
    $phone = '';
    $email = '';
    $password = '';
  
    include('customer_add.php');
    break;

    case 'add_customer':
    $customer_id = trim(filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT));
    $first_name = trim(filter_input(INPUT_POST, 'first_name'));
    $last_name = trim(filter_input(INPUT_POST, 'last_name'));
    $address = trim(filter_input(INPUT_POST, 'address'));
    $city = trim(filter_input(INPUT_POST, 'city'));
    $state = trim(filter_input(INPUT_POST, 'state'));
    $postal_code = trim(filter_input(INPUT_POST, 'postal_code'));
    $country_code = trim(filter_input(INPUT_POST, 'country_code'));
    $phone = trim(filter_input(INPUT_POST, 'phone'));
    $email = trim(filter_input(INPUT_POST, 'email'));
    $password = trim(filter_input(INPUT_POST, 'password'));

    $validate->text('first_name', $first_name, true, 1, 51);
    $validate->text('last_name', $last_name, true, 1, 51);
    $validate->text('address', $address, true, 1, 51);
    $validate->text('city', $city, true, 1, 51);
    $validate->text('state', $state, true, 1, 51);
    $validate->text('postal_code', $postal_code, true, 1, 21);
    $validate->text('phone', $phone);
    $validate->text('email', $email, true, 1, 51);
    $validate->text('password', $password, true, 6, 21);

    if ($fields->hasError()) {
      include 'customer_add.php';
    } else {
      add_customer($first_name, $last_name,
      $address, $city, $state, $postal_code, $country_code,
      $phone, $email, $password);

      include('search_customers.php');

    }

    break;

    case 'update_customer':
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postal_code = filter_input(INPUT_POST, 'postal_code');
    $country_code = filter_input(INPUT_POST, 'country_code');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    update_customer($first_name, $last_name, $address, $city,
                    $state, $postal_code, $country_code, $phone, 
                    $email, $password);

  $customer = select_customer($email);

  include('../customer_manager/search_customers.php');
  break;
}



 