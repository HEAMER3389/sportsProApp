<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/tech_db.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_incidents';
    }
}
switch($action) {
    case 'list_incidents':
  
    $incidents = get_incidents_unassigned();
  
    include('incident_list.php');
	break;
	
	case 'select_incident':
	
	$_SESSION['incident_id'] = $_POST['incident_id'];
	$techIncidents = get_tech_incidents();
	include('technician_list.php');
	break;
	
	case 'assign_incident';

	$_SESSION['tech_id'] = $_POST['tech_id'];
	$incidentToAssign = get_incident($_SESSION['incident_id']);
	$technician = get_technician($_SESSION['tech_id']);
	include('incident_assign.php');
	break;
	
	case 'register_product';

	$row_count = assign_incident($_SESSION['incident_id'], $_SESSION['tech_id']);
		if ($row_count == 1) {
			$success = 'This incident was assigned to a technician.';
		} else {
			$error = 'An error has occured, and the incident was not assigned.';
		}
    $_SESSION = array();   
	session_destroy();     
	include ('result.php');
	break;
}
?>