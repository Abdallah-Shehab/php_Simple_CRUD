<?php require'style.php'?>

<div  class = 'container'>
<form method = 'post' action = '' enctype = 'multipart/form-data'>
<h1>Insert Data</h1>
<label for = 'name'>Name</label>
<input
required
type = 'text'

class = 'form-control'
id = 'name'
aria-describedby = 'emailHelp'
placeholder = 'Enter Name ....'
name = 'name'
/>

<label for = 'email'>Email</label>
<input
required
type = 'email'

class = 'form-control'
id = 'email'
aria-describedby = 'emailHelp'
placeholder = 'Enter Email ....'
name = 'email'
/>

<label for = 'age'>Age</label>
<input
required
type = 'number'

class = 'form-control'
id = 'age'
aria-describedby = 'emailHelp'
placeholder = 'Enter Age ....'
name = 'age'
/>

<label for = 'address'>Address</label>
<input
required
type = 'text'

class = 'form-control'
id = 'address'
aria-describedby = 'emailHelp'
placeholder = 'Enter Address ....'
name = 'address'
/>

<label for = 'phone'>Phone</label>
<input
required
type = 'number'

class = 'form-control'
id = 'phone'
aria-describedby = 'emailHelp'
placeholder = 'Enter Phone ....'
name = 'phone'
/>
<br>
<input type = 'file' name = 'image' />
<br>
<br>
<input class = 'btn btn-primary' type = 'submit' name = 'submit' value = 'Insert' />

<a class = 'btn btn-warning' href = './home.php'>Back</a>
</form>
</div>
<?php
$db = 'mysql:host=localhost;dbname=Task_1';

$con = new PDO( $db, 'root', '' );

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $in_name = $_POST[ 'name' ];
    $in_email = $_POST[ 'email' ];
    $age = $_POST[ 'age' ];
    $address = $_POST[ 'address' ];
    $phone = $_POST[ 'phone' ];
    $pic = $_FILES[ 'image' ];
    $picName = $pic[ 'name' ];
    $picTemp = $pic[ 'tmp_name' ];
    $in_query = "insert into users (name, email, age, address, phone , img) values('$in_name','$in_email',$age,'$address',$phone,'$picName')";
    // var_dump( $in_query );

    $sql = $con->prepare( $in_query );
    // var_dump( $sql );
    $result =
    $sql->execute();

    if ( $result ) {
        // mkdir( 'uploads' );
        move_uploaded_file( $picTemp, "uploads/$picName" );
    }
    // if
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
    width: 50%;
    margin-left: 25%;
}
</style> -->
