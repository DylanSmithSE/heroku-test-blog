<?php
require('./config/config.php');
require('./config/db.php');

//check for delete
if (isset($_POST['delete'])) {
    //Get form data
    $delete_id = $conn->real_escape_string($_POST['delete_id']);

    $query = "DELETE from posts WHERE id={$delete_id}";

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

<body>
    <div class="container" style="margin-top: 1em;">
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-secondary">Back</a>
        <h1><?php echo $post['title']; ?></h1>
        <div>
            <small>Created on <?php echo $post['date']; ?> by <?php echo $post['author']; ?></small>
            <p><?php echo $post['body']; ?></p>
        </div>
        <hr>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="float: right;">
            <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary">Edit</a>

    </div>
    <?php include('inc/footer.php') ?>