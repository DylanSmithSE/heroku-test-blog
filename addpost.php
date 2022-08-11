<?php
require('./config/config.php');
require('./config/db.php');

//check the number of posts, want a limit of 10
//if there are 10, disable the submit button and display message
$query_count = "SELECT * FROM posts ";
$result = $conn->query($query_count);
$num_of_posts = $result->num_rows;

//check for submit
if (isset($_POST['submit'])) {
    //Get form data
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $body = $conn->real_escape_string($_POST['body']);

    $query = "INSERT INTO posts(title, body, author) VALUES('$title','$body','$author')";
    if ($conn->query($query) === TRUE) {
        header('Location: ' . ROOT_URL . '');
    } else {
        echo 'Error' . $conn->error;
    }
}
?>


<?php include('inc/header.php') ?>
<?php include('inc/navbar.php') ?>

<body>
    <div class="container">
        <h1>Add Post</h1>
        <?php if ($num_of_posts > 9) : ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                You can only have 10 posts saved at once. Consider deleting older posts in order to make new ones.
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary <?php if ($num_of_posts > 9) {
                                                                                            echo "disabled";
                                                                                        } ?>">
        </form>

    </div>
    <?php include('inc/footer.php') ?>