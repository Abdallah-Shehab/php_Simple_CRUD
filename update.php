<?php
require'style.php';
$id = $_REQUEST[ 'id' ];
$db = 'mysql:host=localhost;dbname=Task_1';
$con = new PDO( $db, 'root', '' );
$query = "SELECT * from users where id=$id";
$sql = $con->prepare( $query );
$result = $sql->execute();
$user = $sql->fetch( PDO::FETCH_ASSOC );

?>
<div class = 'container'>
<form action = '' method = 'post' enctype = 'multipart/form-data'>
<h1>Update Data</h1>
<input type = 'hidden' name = 'id' value = <?php echo $user[ 'id' ];
?>>
<input class = 'form-control' type = 'text' name = 'name' value = "<?php echo $user['name'] ?>">
<input class = 'form-control' type = 'email' name = 'email' value = "<?php echo $user['email'] ?>">
<input class = 'form-control' type = 'text' name = 'address' value = "<?php echo $user['address'] ?>">
<input class = 'form-control' type = 'number' name = 'age' value = "<?php echo $user['age'] ?>">
<input class = 'form-control'  type = 'number' name = 'phone' value = "<?php echo $user['phone'] ?>">
<br>
<input type = 'file' name = 'image'>
<br>
<br>
<input class = 'btn btn-warning' type = 'submit' name = 'submit' value = 'Update'>

<a class = 'btn btn-primary' href = './home.php'>Back</a>

</form>
</div>

<?php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $id = $_POST[ 'id' ];
    $name = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $age = $_POST[ 'age' ];
    $address = $_POST[ 'address' ];
    $phone = $_POST[ 'phone' ];
    $pic = $_FILES[ 'image' ];
    $picName = $pic[ 'name' ];
    $picTemp = $pic[ 'tmp_name' ];
    // echo $in_name, $in_email;

    $db = 'mysql:host=localhost;dbname=Task_1';
    $con = new PDO( $db, 'root', '' );
    $oldPic = $user[ 'img' ];

    if ( $pic[ 'name' ] == null ) {
        $in_query = "update users set name='$name' ,email='$email',
        age= '$age', address='$address', phone='$phone'   WHERE id='$id'";
    } else {
        $in_query = "update users set name='$name' ,email='$email',
        age= '$age', address='$address', phone='$phone'  , img='$picName' WHERE id='$id'";
    }

    // var_dump( $in_query );

    $sql = $con->prepare( $in_query );
    // var_dump( $sql );
    $result = $sql->execute();

    if ( $result ) {
        move_uploaded_file( $picTemp, "uploads/$picName" );
        // unlink( "uploads/$oldPic" );
    }

}

?>
<!--
<style>
* {
    background-color: #d8d3d6;
}

div {
    width: 100%;

    display: flex;
    align-items: center;
    justify-content: center;
}

form {
    position: absolute;
    bottom: 20%;
    width: 100px;
    height: 600px;
    background-color: #434343;

    display: flex;
    flex-direction: column;
    color: white;
    border-radius: 15px;
    box-shadow: 10px 10px 30px 2px black;
    width: 20%;

}

a {
    text-align: center;
    font-size: 20px;
    height: 40px;
    border-radius: 15px;
    border: 1px solid white;
    margin: 15px;
    padding: 5px;
    background-color: #6d6c6c;
    color: #ddd;
    border: none;
    text-decoration: none;
}

input {
    text-align: center;
    font-size: 20px;
    height: 40px;
    border-radius: 15px;
    border: 1px solid white;
    margin: 15px;
    padding: 5px;
}

input:focus {
    color: red;
    border: 1px solid red;
    outline: solid 2px red;
}

input[ type = 'submit' ] {
    background-color: #6d6c6c;
    color: #ddd;
    border: none;

}

input[ type = 'submit' ]:hover {
    cursor: pointer;
    background-color: #aaa;
    color: black;
}

h1 {
    color: #6d6c6c;
    margin-top: 5px;
    padding: 5px;
    text-align: center;
    border-radius: 15px;
    width: 60%;
    margin-left: 20%;
}
</style>
-->
