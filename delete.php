<?php
$id = $_REQUEST[ 'id' ];
$db = 'mysql:host=localhost;dbname=Task_1';
$con = new PDO( $db, 'root', '' );
$query = " delete  from users where id=$id";
$sql = $con->prepare( $query );
$result = $sql->execute();

?>

<script>   var url = 'http://localhost/task/home.php';
window.location = url;

</script>