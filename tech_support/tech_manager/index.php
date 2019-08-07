<?php
require('../model/database.php');
require('../model/tech_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_techs';
    }
}

if ($action == 'under_construction') {
    include('../under_construction.php');
}

else if ($action == 'list_techs'){
  $technicians = get_techs();

  include('../tech_manager/tech_list.php');
}
else if ($action == 'delete_techs') {
  $tech_id= filter_input(INPUT_POST, 'tech_id');{
    delete_tech($tech_id);

    header("Location: index.php");
  }
}
else if ($action == 'show_add_form') {
  include('tech_add.php');
}
else if ($action == 'add_tech') {
  $first_name = filter_input(INPUT_POST, 'first_name');
  $last_name = filter_input(INPUT_POST, 'last_name');
  $email = filter_input(INPUT_POST, 'email');
  $phone = filter_input(INPUT_POST, 'phone');
  $password = filter_input(INPUT_POST, 'password');

  if($first_name == NULL || $last_name == NULL || $email == NULL || $phone == NULL || $password == NULL){
    $error = "Invaild technician data. Check all fields and try again.";
    include('../errors/error.php');
  }
 else {
    add_tech($tech_id, $first_name, $last_name, $email, $phone, $password);
    header("Location: index.php");
  }


}
?>
