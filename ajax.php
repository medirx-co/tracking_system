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
    
    if($component == 'adminLogin') {
        // $data = explode(",", $_REQUEST['data']);
        $whereClause = "WHERE username = '".$_REQUEST['ecode']."' AND password = '".$_REQUEST['password']."'";
        $result = getRow("auth" , $whereClause);       
        $response['result'] = $result ?? throw new Exception("Invalid Credentials");
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

    if($component == 'all_records') {
        // // $data = explode(",", $_REQUEST['data']);
        // $whereClause = "WHERE na_id = '".$_REQUEST['id']."'";
        $query = "SELECT na_id, nutrition_advisor_name, COUNT(date_of_call_request) call_back_requests, COUNT(call_back_date) call_back_responses, count(date_of_call) direct_calls FROM `[CALL RECORDS]` GROUP BY na_id";
        $result = getCustomRows($query);
        $response['result'] = $result ?? throw new Exception("No data found");
    }
    if($component == 'url_visit') {
        // // $data = explode(",", $_REQUEST['data']);
        // $whereClause = "WHERE na_id = '".$_REQUEST['id']."'";
        $query = "SELECT COUNT(*) url_visit FROM `[CHEMIST DETAILS]` WHERE is_url_visited = 1 AND campaign_id = 1";
        $result = getCustomRows($query);
        $response['result'] = $result ?? throw new Exception("No data found");
    }
    if($component == 'chemistCount') {
        // // $data = explode(",", $_REQUEST['data']);
        // $whereClause = "WHERE na_id = '".$_REQUEST['id']."'";
        $query = "SELECT COUNT(*) chemist FROM `[CHEMIST DETAILS]` WHERE campaign_id = 1";
        $result = getCustomRows($query);
        $response['result'] = $result ?? throw new Exception("No data found");
    }
    if($component == 'allCallRecords') {
        // // $data = explode(",", $_REQUEST['data']);
        // $whereClause = "WHERE na_id = '".$_REQUEST['id']."'";
        $query = "SELECT COUNT(date_of_call_request) call_request, COUNT(date_of_call) call_by_chemist, COUNT(call_back_date) call_back FROM `[CALL RECORDS]`";
        $result = getCustomRows($query);
        $response['result'] = $result ?? throw new Exception("No data found");
    }
    if($component == 'detail_call') {
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