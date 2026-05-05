<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

// users dropdown
$users = mysqli_query($connect, "SELECT * FROM users");

// categories dropdown
$categories = mysqli_query($connect, "SELECT * FROM categories");

// posts data
$select_query = "SELECT * FROM posts";
$result = mysqli_query($connect, $select_query);
$data = mysqli_fetch_all($result);

// INSERT
if(isset($_POST['title']) && !empty($_POST['title'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];

    if(!empty($content) && !empty($user_id) && !empty($category_id)){
        $insert_query = "INSERT INTO posts (title, content, user_id, category_id) 
                         VALUES ('$title', '$content', '$user_id', '$category_id')";
        mysqli_query($connect, $insert_query);

        header("location: posts.php");
        exit;
    } else {
        echo "ყველა ველი შეავსე!";
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
    Title: <input type="text" name="title"><br><br>
    Content: <input type="text" name="content"><br><br>

    User:
    <select name="user_id">
        <option value=""></option>
        <?php while($u = mysqli_fetch_assoc($users)){ ?>
            <option value="<?= $u['id'] ?>">
                <?= $u['name'] ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    Category:
    <select name="category_id">
        <option value=""></option>
        <?php while($c = mysqli_fetch_assoc($categories)){ ?>
            <option value="<?= $c['id'] ?>">
                <?= $c['name'] ?>
            </option>
        <?php } ?>
    </select>

    <br><br>
    <button>Add Post</button>
</form>

<hr><hr>

<table>
<tr>
    <th>ID</th>
    <th>User ID</th>
    <th>Category ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Created at</th>
    <th>Updated at</th>
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
</tr>
<?php } ?>
</table>