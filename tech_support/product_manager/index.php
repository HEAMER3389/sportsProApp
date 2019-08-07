<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

if ($action == 'under_construction') {
    include('../under_construction.php');
}

else if ($action == 'list_products'){
  $products = get_products();

  include('../product_manager/product_list.php');
}
else if ($action == 'delete_product') {
  $product_code = filter_input(INPUT_POST, 'product_code');{
    delete_product($product_code);

    header("Location: index.php");
  }
}
else if ($action == 'show_add_form') {
  include('product_add.php');
}
else if ($action == 'add_product') {
  $product_code = filter_input(INPUT_POST, 'product_code');
  $name = filter_input(INPUT_POST, 'name');
  $version = filter_input(INPUT_POST, 'version');
  $release_date = filter_input(INPUT_POST, 'release_date');

  if($product_code == NULL || $name == NULL || $version == NULL || $release_date == NULL){
    $error = "All text boxes are required to be filled in. Please try again.";
    include('../errors/error.php');
  }else {
    add_product($product_code, $name, $version, $release_date);
    header("Location: index.php");
  }
}
?>
