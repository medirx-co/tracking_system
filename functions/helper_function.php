<?php

function connection()
{
    $conn = new mysqli('tecmetis.com', 'admin_root_tracking', 'Metis#130922', 'admin_tracking_system');
    return $conn;
}

$conn = connection();

function getRows($tableName, $whereclause = null)
{
    global $conn;
    # code...
    $sql = "SELECT * FROM $tableName $whereclause";
    $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    return $result;
}
function getRow($tableName, $whereclause = null)
{
    global $conn;
    # code...
    $sql = "SELECT * FROM $tableName $whereclause";
    $result = $conn->query($sql)->fetch_assoc();
    return $result;
}
function add($tableName, $parameters)
{
    $keys = implode(',' , array_keys($parameters));

    $values = implode("', '" , array_values($parameters));
    // echo $values;
    # code...
    global $conn;
    $sql = "INSERT INTO $tableName ($keys) VALUES ('$values')";
    $result = $conn->query($sql);
    $result = $conn->insert_id;
    $temp = ["query"=>$sql];
    $temp["result"] = $result;
    return $temp;
}

function update($tableName, array $parameters)
{
# code...
    $key_value = keyVlaues($parameters);
    global $conn;
    $sql = "UPDATE $tableName SET $key_value";
    $result = $conn->query($sql);
    $result = $conn->insert_id;
    return $result;
}
function keyVlaues(array $parameters = null)
{
    # code...
    $parameters = ['name' => 'veena', 'address' => 'bachupally'];
    // $result = ", name = 'veena' , address = 'bachupally'"
    $string = "";
    foreach ($parameters as $key => $value) {
        # code...
        $string .= ", $key = '$value'" ;
    }
    $string = substr($string, 2);
    return $string;
}
// echo keyVlaues();

function curlRequest($data)
{
    # code...
    $ch = curl_init();
        $curlConfig = [
            CURLOPT_URL            		=> "http://localhost/ajax.php",
            CURLOPT_POST           => true,
            // CURLOPT_RETURNTRANSFER => true,
            CURLOPT_RETURNTRANSFER 		=> true,
            // CURLOPT_ENCODING 			=> ''
            // CURLOPT_MAXREDIRS 			=> 10,
            // CURLOPT_TIMEOUT 			=> 0,
            // CURLOPT_HEADER				=> 0,
            // CURLOPT_HTTPHEADER			=> $headers,
            CURLOPT_FOLLOWLOCATION 		=> true,
            CURLOPT_HTTP_VERSION 		=> CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST 		=> 'GET',
        
        // if ($isPOST) {
        //     $curlConfig[CURLOPT_CUSTOMREQUEST] = 'POST';
        //     $curlConfig[CURLOPT_POSTFIELDS] = $postFields;
        // }
        CURLOPT_POSTFIELDS     => $data,
        ];
        curl_setopt_array($ch, $curlConfig);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
}
?>