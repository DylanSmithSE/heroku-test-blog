<?php
require('./config/config.php');
require('./config/db.php');

//Create our query
$query = 'SELECT * FROM posts ORDER BY date DESC';

//Get result, conn was established in db.php which we have included/required
$result = $conn->query($query);
// $result = mysqli_query($conn, $query);

//fetch_all() gets all results
//fetch_assoc() gets 1 row at a time I think
$posts = $result->fetch_all(MYSQLI_ASSOC);
// $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//not sure if this is necessary or not but frees memory
$result->free();
// mysqli_free_result($result);

//close connection
$conn->close();
?>

<?php include('./inc/header.php') ?>
<?php include('inc/navbar.php') ?>

<body>
    <div class="container">
        <h1>Posts</h1>
        <?php foreach ($posts as $post) : ?>
            <div style="margin: 1em 0; padding: 0.5em 1em; background-color: #dcdfe3;">
                <h3><?php echo $post['title'] ?></h3>
                <small>Created on <?php echo $post['date']; ?> by <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <a class="btn  btn-info" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include('./inc/footer.php') ?>