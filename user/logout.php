<?php
session_start();
session_destroy();
 // set response code - 201 created
 http_response_code(200); 
 // tell the user
 echo json_encode(array("message" => "successful operation"));
?>