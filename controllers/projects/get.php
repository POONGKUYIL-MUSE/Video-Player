<?php 
require_once("../../helpers/db_connect.php");
include_once('../../api/vp_api.php');

$api = new VP_API($conn);

$data = $_GET;

if(!empty($data['project_id'])){    

    $api->project_id = $data['project_id'];

    if($data = $api->read_project()){         
        http_response_code(200);         
        echo json_encode(array("status" => "200", "data" => $data));
    } else{         
        http_response_code(503);        
        echo json_encode(array("status" => "503"));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("status" => "400"));
}