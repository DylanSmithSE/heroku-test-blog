<?php
require('./config/config.php');
require('./config/db.php');

//check for submit
if (isset($_POST['submit'])) {
    //Get form data
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $body = $conn->real_escape_string($_POST['body']);
    $update_id = $conn->real_escape_string($_POST['update_id']);

    $query = "UPDATE posts SET
                title='$title',
                body='$body',
                author='$author'
                WHERE id = {$update_id}";

    if ($conn->query($query) === TRUE) {
        header('Location: ' . ROOT_URL . '');
    } else {
        echo 'Error' . $conn->error;
    }
}

//get id
$id = $conn->real_escape_string($_GET['id']);
//Create our query
$query = 'SELECT * FROM posts WHERE id=' . $id;

//Get result, conn was established in db.php which we have included/required
$result = $conn->query($query);

//fetch_all() gets all results as a multi dimensional associative array
$post = $result->fetch_assoc();

//not sure if this is necessary or not but frees memory
$result->free();
//close connection
$conn->close();
// mysqli_close($conn);
?>


<?php include('inc/header.php') ?>
<?php include('inc/navbar.php') ?>

<body>
    <div class="container">
        <h1>Add Post</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $post['title'] ?>">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $post['author'] ?>">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control"><?php echo $post['body'] ?></textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>

    </div>
    <?php include('inc/footer.php') ?>