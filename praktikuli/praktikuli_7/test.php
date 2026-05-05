<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");


$roles_query = "SELECT * FROM roles";
$roles_result = mysqli_query($connect, $roles_query);


$select_query = "SELECT * FROM users";
$result = mysqli_query($connect, $select_query);
$data = mysqli_fetch_all($result);


if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];


    if(!empty($email) && !empty($role_id)){
        $insert_query = "INSERT INTO users (name, email, role_id) 
                         VALUES ('$name', '$email', '$role_id')";
        mysqli_query($connect, $insert_query);

        header("location: users.php");
        exit;
    } else {
        echo "ყველა ველი უნდა იყოს შევსებული!";
    }
}
?>

<style>
table{
    border: solid 1px black;
    border-collapse: collapse;
}
table td, th {
    border: solid 1px black;
    padding: 8px;
}
form{
    width: 300px;
    border: solid 1px black;
    margin: auto;
    padding: 10px;
}
</style>


<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>

    Role:
    <select name="role_id">
        <option value=""></option>
        <?php while($role = mysqli_fetch_assoc($roles_result)){ ?>
            <option value="<?= $role['id'] ?>">
                <?= $role['role'] ?>
            </option>
        <?php } ?>
    </select>

    <br><br>
    <button>Add User</button>
</form>

<hr><hr>


<table>
<tr>
    <th>ID</th>
    <th>Role ID</th>
    <th>Email</th>
    <th>Password</th>
    <th>Name</th>
    <th>Lastname</th>
    <th>Mobile</th>
    <th>Address</th>
    <th>Created_at</th>
    <th>Updated_at</th>
    <th>Deleted_at</th>
</tr>

<?php foreach($data as $row){ ?>
<tr>
    <td><?= $row[0]?></td>
    <td><?= $row[1]?></td>
    <td><?= $row[2]?></td>
    <td><?= $row[3]?></td>
    <td><?= $row[4]?></td>
    <td><?= $row[5]?></td>
    <td><?= $row[6]?></td>
    <td><?= $row[7]?></td>
    <td><?= $row[8]?></td>
    <td><?= $row[9]?></td>
    <td><?= $row[10]?></td>
</tr>
<?php } ?>
</table>