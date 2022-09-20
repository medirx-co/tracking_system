<?php
ob_start();
header('Content-Type: application/json');
header('Content-Type: application/json; charset=utf-8');
$component = $_REQUEST['component'] ?? null;
$response = [];
// print_r(json($component));
// print_r(json_encode($_REQUEST));
include_once('functions/helper_function.php');

try {
    //code...
    $action =  $_REQUEST['action'] ?? null;
    $id =  $_REQUEST['id'] ?? null;
    
    // echo "hi";
    if($action == 'call_action') {
        $parameters = [
           'na_id'=> $id, 
           'date_of_call' => date("Y-m-d")
        ];
        $result = add("call_records", $parameters);
        print_r((json_encode($result)));
    } else if ($action == 'call_request') {
        $parameters = [
            'na_id'=> $id, 
            'date_of_call_request' => date("Y-m-d")
         ];
         $result = add("call_records", $parameters);
         print_r((json_encode($result)));
    }
    
    if($component == 'login') {
        // $data = explode(",", $_REQUEST['data']);
        $whereClause = "WHERE ecode = '".$_REQUEST['ecode']."' AND password = '".$_REQUEST['password']."'";
        $result = getRow("`[NUTRITIONAL ADVISOR]`" , $whereClause);       
        $response['result'] = $result ?? throw new Exception("Invalid Credentials");
    }
    if($component == 'call_list') {
        // $data = explode(",", $_REQUEST['data']);
        $whereClause = "WHERE na_id = '".$_REQUEST['id']."'";
        $result = getRows("`[CALL RECORDS]`" , $whereClause);       
        $response['result'] = $result ?? throw new Exception("No data found");
    }

    $response['status'] = 'success';
} catch (\Throwable $th) {
    //throw $th;
    $response['message'] = $th->getMessage();
    $response['status'] = 'error';
}
finally {
    echo json_encode($response);
}
    
?>