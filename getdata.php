<?php
include 'connection.php';

$q=$_GET["varieties"];
$p=$_GET["farms"];

$result = mysqli_query($conn, "SELECT * FROM `fruit` WHERE variety = '$q' AND no = '$p' ");

$users=array();
//use while to get array
if (mysqli_num_rows ( $result ) != 0) {
    while ( $arr_item = mysqli_fetch_assoc ( $result ) ) {
        $itmes = array();
        $itmes[] = $arr_item['date'];
        $itmes[] = $arr_item['buds'];
        $itmes[] = $arr_item['bloom'];
        $itmes[] = $arr_item['immature'];
        $itmes[] = $arr_item['mature'];
        $itmes[] = $arr_item['stbuds'];
        $itmes[] = $arr_item['stbloom'];
        $itmes[] = $arr_item['stimmature'];
        $itmes[] = $arr_item['stmature'];
        $users[] = $itmes;
    }
}

echo json_encode($users);

?>