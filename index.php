<?php

header('Access-Control-Allow-Origin: *');

//Include Vars, DB Connection and Function Files
require_once('dbsetting/lms_vars_config.php');
require_once('dbsetting/classdbconection.php');
$dblms = new dblms();
require_once('functions/functions.php');

//Vars
$challanNo          = (isset($_REQUEST['challan_no']) && $_REQUEST['challan_no'] != '') ? $_REQUEST['challan_no'] : '';

//Authenticate User Login by given credentials
function checkCredentials($email, $password){

    global $dblms;
    global $row;

    //Check User Credentials
    $sqllmsUser	= $dblms->querylms("SELECT u.user_id 
                                        FROM ".USERS." u
                                        WHERE u.user_status = '1' AND u.user_email = '".cleanvars($email)."' 
                                        AND u.user_password = '".md5(cleanvars($password))."'
                                        LIMIT 1");
    if (mysqli_num_rows($sqllmsUser) == 1) {

        $row = mysqli_fetch_array($sqllmsUser); 
        
        $response['success'] 	= '1';
    
    } else {
        
        $response['success'] 	= '-1';
        
    }	

    return $response;

}

//$data_arr = json_decode(file_get_contents('php://input'), true);

if($route == 'rooms') {

    //$loginResponse = checkCredentials($_REQUEST['username'], $_REQUEST['password']);

    if(isset($control) && $control == 'add'){

        //Check if Record already exist
        $sqllmsCheck  = $dblms->querylms("SELECT room_id 
                                                FROM ".ROOMS." 
                                                WHERE room_code = '".cleanvars($_REQUEST['room_code'])."'");
        if(mysqli_num_rows($sqllmsCheck) == 0) {

            $columnsData = array(
                'room_status'		        => 1					                , 
                'room_code'	        		=> cleanvars($_REQUEST['room_code'])	, 
                'room_capacity'		        => cleanvars($_REQUEST['room_capacity']), 
                'department_name'		    => cleanvars($_REQUEST['department_name']), 
                'created_at'		        => date("Y-m-d H:i:s")		            , 
            );

            $sqllmsInsert  = $dblms->Insert(ROOMS, $columnsData);

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record has been added successfully!';

        } else {

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record already exists!';
        }

    } elseif(isset($control) && $control == 'update'){

        if(isset($_REQUEST['room_id'])){

            $columnsData = array(
                'room_code'	        		=> cleanvars($_REQUEST['room_code'])			, 
                'room_capacity'		        => cleanvars($_REQUEST['room_capacity'])		, 
                'department_name'		    => cleanvars($_REQUEST['department_name'])      , 
                'modified_at'		        => date("Y-m-d H:i:s")		            		, 
            );

            $sqllmsUpdate = $dblms->Update(ROOMS, $columnsData, "WHERE room_id = '".cleanvars($_REQUEST['room_id'])."'");

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record has been updated successfully!';

        } else {

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Error! Missing required data!';

        }

    } elseif(isset($control) && $control == 'delete'){

        if(isset($_REQUEST['room_id'])){

            $sqllmsDelete = $dblms->querylms("DELETE FROM ".ROOMS." WHERE room_id = '".cleanvars($_REQUEST['room_id'])."'");

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record has been deleted successfully!';

        } else {

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Error! Missing required data!';

        }
        
    } elseif(isset($control) && $control != '') {

        $jsonObj1 = array();
        $sqllmsRooms = $dblms->querylms("SELECT room_id, room_code, room_capacity, department_name
                                            FROM ".ROOMS."
                                            WHERE room_status = '1' AND department_name = '".$control."'");
        if(mysqli_num_rows($sqllmsRooms) > 0) {

            while($valueRoom = mysqli_fetch_assoc($sqllmsRooms)){

                $data1['room_id'] 	    = $valueRoom['room_id'];
                $data1['room_code'] 	= $valueRoom['room_code'];
                $data1['room_capacity'] = $valueRoom['room_capacity'];
                $data1['department_name'] = $valueRoom['department_name'];

                array_push($jsonObj1,$data1);

            }

        }

        $data['success'] 	= '00';
        $data['list'] 	    = $jsonObj1;

    }

} elseif($route == 'roomsAllocation') {

    if(isset($control) && $control == 'add'){

        if(isset($_REQUEST['room_id']) && isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && isset($_REQUEST['start_time']) && isset($_REQUEST['end_time']) && isset($_REQUEST['semester'])){

            $columnsData = array(
                'status'	        		=> 1	                            , 
                'id_room'	        		=> cleanvars($_REQUEST['room_id'])	, 
                'start_date'		        => cleanvars($_REQUEST['start_date']), 
                'end_date'		            => cleanvars($_REQUEST['end_date']), 
                'start_time'		        => cleanvars($_REQUEST['start_time']), 
                'end_time'		            => cleanvars($_REQUEST['end_time']), 
                'semester'		            => cleanvars($_REQUEST['semester']), 
                'created_at'		        => date("Y-m-d H:i:s")
            );
    
            $sqllmsInsert  = $dblms->Insert(ROOMS_ALLOCATION, $columnsData);
    
            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record has been added successfully!';

        } else {

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Error! Missing required data!';

        }

    } elseif(isset($control) && $control == 'update'){

        if(isset($_REQUEST['allocation_id'])){

            $columnsData = array(
                'id_room'	        		=> cleanvars($_REQUEST['room_id'])	, 
                'start_date'		        => cleanvars($_REQUEST['start_date']), 
                'end_date'		            => cleanvars($_REQUEST['end_date']), 
                'start_time'		        => cleanvars($_REQUEST['start_time']), 
                'end_time'		            => cleanvars($_REQUEST['end_time']), 
                'semester'		            => cleanvars($_REQUEST['semester']), 
                'modified_at'		        => date("Y-m-d H:i:s") 
            );

            $sqllmsUpdate = $dblms->Update(ROOMS_ALLOCATION, $columnsData, "WHERE id = '".cleanvars($_REQUEST['allocation_id'])."'");

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record has been updated successfully!';

        } else {

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Error! Missing required data!';

        }

    } elseif(isset($control) && $control == 'delete'){

        if(isset($_REQUEST['allocation_id'])){

            $sqllmsDelete = $dblms->querylms("DELETE FROM ".ROOMS_ALLOCATION." WHERE id = '".cleanvars($_REQUEST['allocation_id'])."'");

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Record has been deleted successfully!';

        } else {

            $data['success'] 	= '00';
            $data['MSG'] 	    = 'Error! Missing required data!';

        }
        
    } elseif(isset($control) && $control != '') {

        $jsonObj1 = array();
        $sqllmsRoomAllocation = $dblms->querylms("SELECT id, start_date, end_date, start_time, end_time, semester
                                            FROM ".ROOMS_ALLOCATION."
                                            WHERE status = '1' AND id_room = '".$control."'");
        if(mysqli_num_rows($sqllmsRoomAllocation) > 0) {

            while($valueRoomAllocation = mysqli_fetch_assoc($sqllmsRoomAllocation)){

                $data1['id'] 	        = $valueRoomAllocation['id'];
                $data1['start_date'] 	= $valueRoomAllocation['start_date'];
                $data1['end_date'] 	    = $valueRoomAllocation['end_date'];
                $data1['start_time']    = $valueRoomAllocation['start_time'];
                $data1['end_time']      = $valueRoomAllocation['end_time'];
                $data1['semester']      = $valueRoomAllocation['semester'];

                array_push($jsonObj1,$data1);

            }

        }

        $data['success'] 	= '00';
        $data['list'] 	    = $jsonObj1;

    }
    
} else { 

	http_response_code(422);
    $data['success'] 	    = '00';
    $data['MSG'] 	        = 'Not authorized';

}

//echo Respond
$set = $data;
header( 'Content-Type: application/json; charset=utf-8' );
echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
die();

?>