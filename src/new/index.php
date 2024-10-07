<?php
// Function to return error messages as JSON
const STRATEGY = "strategy";
$file_Name = "tojson.txt";

//$url = 'https://www.cs.utep.edu/cheon/cs3360/project/omok/new/';
//$strategy = 'Smart';
//$response = @file_get_contents("$url?strategy=$strategy");
//if ($response) {
//    echo $response;
//} else {
//    echo "Failed to get response.";
//}

function sendResponse($response,$reason_Id,$out) {
    $response = array(
        "response" => $response,
        $reason_Id=>$out,

    );

    echo json_encode($response);
}

//function sendError($reason,$response) {
//    $response = array(
//        "response" => $response,
//        "pid"=>$pid,
//        "reason" => $reason
//    );

//    echo json_encode($response);
//}
if(array_key_exists(STRATEGY,$_REQUEST)) {
    sendResponse("false","reason","Strategy not specified");
}
else  {
    $strategy = "random";
    if($strategy == "random") {
        $pid = uniqid();
        sendResponse("true","pid",$pid);
        $file = fopen("$file_Name", "w");
        fputs($file, json_encode(array('pid' => $pid, 'strategy' => $strategy, 'player' => [], 'Bot' => [])));
        fclose($file);
    }
    else if($strategy == "smart") {
        $pid = uniqid();
        sendResponse("true","pid",$pid);
        $file = fopen("$file_Name", "w");
        fputs($file, json_encode(array('pid' => $pid, 'strategy' => $strategy, 'player' => [], 'Bot' => [])));
        fclose($file);
    }
    else {
        sendResponse("false","reason","Unknown Strategy");
    }

}
//else if($_REQUEST[STRATEGY] == "strategy") {
//    sendError(1,1,0);
//
//}





// Output the JSON response



