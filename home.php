<?php
$db = 'mysql:host=localhost;dbname=Task_1';

$con = new PDO( $db, 'root', '' );

$query = 'SELECT * FROM users ';

$sql = $con->prepare( $query ); $result = $sql->execute(); $users =
$sql->fetchAll( PDO::FETCH_ASSOC ); ?>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous"
/>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $users as $user ):
?>
    <tr>
      <th scope="row">
        <?php echo $user[ 'id' ] ?>
      </th>
      <td>
        <?php echo $user[ 'name' ] ?>
      </td>
      <td>
        <?php echo $user[ 'email' ] ?>
      </td>
      <td>
        <?php echo $user[ 'age' ] ?>
      </td>
      <td>
        <?php echo $user[ 'address' ] ?>
      </td>
      <td>
        <?php echo $user[ 'phone' ] ?>
      </td>
      <td>
        <!-- <img
          src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['img']); ?>"
        /> -->
        <img src="uploads/<?php echo $user['img']?>" />
      </td>

      <td>
        <form action="./update.php" method="$_POST" id="table_form">
          <input type = 'hidden' name = 'id' value =
          <?php echo $user[ 'id' ];
?>>

          <button
            type="submit"
            id="table_up_butt"
            class="btn btn-warning"
            formtarget="_self"
          >
            Update
          </button>
        </form>
        <form
          action="./delete.php "
          id="table_form"
          method="$_POST"
          target="_slef"
        >
          <input type = 'hidden' name = 'id' value =
          <?php echo $user[ 'id' ];
?>>

          <button
            type="submit"
            id="table_up_butt"
            class="btn btn-danger"
            formtarget="_self"
          >
            Delete
          </button>
        </form>
      </td>
    </tr>

    <?php endforeach ?>
  </tbody>
</table>

<a class="btn btn-primary" href="insert.php">insert</a>

<style>
  table,
  td,
  tr {
    min-height: 200px;

    text-align: center;
  }
  button {
    margin: 5px;
  }

  img {
    width: 70px;
    border-radius: 20px;
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
</style>

<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"
></script>
<script
  src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"
></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"
></script>
