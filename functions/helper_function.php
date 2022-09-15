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

function add($tableName, $parameters, $values)
{
    # code...
    global $conn;
    $sql = "INSERT INTO $tableName $parameters VALUES $values";
    $result = $conn->query($sql);
    $result = $conn->insert_id;
    return $result;
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
?>