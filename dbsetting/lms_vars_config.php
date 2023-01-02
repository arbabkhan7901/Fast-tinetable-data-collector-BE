<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();
ob_clean();

define('LMS_HOSTNAME'		, 'localhost');
define('LMS_NAME'			, 'spmm_project');
define('LMS_USERNAME'		, 'root');
define('LMS_USERPASS'		, '');

//DB Tables
define('ROOMS'				, 'pr_rooms');
define('ROOMS_ALLOCATION'	, 'pr_rooms_allocation');

//Variables
$route 			= (isset($_REQUEST['route']) && $_REQUEST['route'] != '') ? $_REQUEST['route'] : '';
$control 		= (isset($_REQUEST['control']) && $_REQUEST['control'] != '') ? $_REQUEST['control'] : '';
?>