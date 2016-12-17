<?php
include 'connection.php';
$q=$_GET["varieties"];
$p=$_GET["farms"];
$r=$_GET["date"];
$result = mysqli_query($conn, "SELECT * FROM `fruit` WHERE variety = '$q' AND no = '0' AND date = '$r' ");
if ($result->connect_errno) {
    echo "Failed to connect to MySQL: (" . $result->connect_errno . ") " . $result->connect_error;
}
$users=array();
if (mysqli_num_rows ( $result ) != 0) {
    while ( $arr_item = mysqli_fetch_assoc ( $result ) ) { 
        $itmes = array();
        $itmes[] = $arr_item['buds'];
        $itmes[] = $arr_item['bloom'];
        $itmes[] = $arr_item['immature'];
        $itmes[] = $arr_item['mature'];
        $users[] = $itmes;
    }
}
$results = mysqli_query($conn, "SELECT * FROM `fruit` WHERE variety = '$q' AND no = '$p' AND date = '$r' ");
if (mysqli_num_rows ( $results ) != 0) {
    while ( $arr_item = mysqli_fetch_assoc ( $results ) ) {
        $itmes = array();
        $itmes[] = $arr_item['buds'];
        $itmes[] = $arr_item['bloom'];
        $itmes[] = $arr_item['immature'];
        $itmes[] = $arr_item['mature'];
        $users[] = $itmes;
    }
}
echo json_encode($users);
?>