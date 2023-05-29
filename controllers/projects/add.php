<?php 
require_once("../../helpers/db_connect.php");
include_once('../../api/vp_api.php');

$api = new VP_API($conn);

$data = $_POST;

if(!empty($data['title']) && !empty($data['description']) &&
!empty($data['screen_lists'])){    

    $api->project_title = $data['title'];
    $api->project_desc = $data['description'];
    $api->project_screens = $data['screen_lists'];
    $api->createdat = date('Y-m-d H:i:s'); 
    $api->updatedat = date('Y-m-d H:i:s'); 

    
    if($api->create_project()){         
        http_response_code(200);         
        echo json_encode(array("status" => "200"));
    } else{         
        http_response_code(503);        
        echo json_encode(array("status" => "503"));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("status" => "400"));
}