<?php require('./config/config.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item active"><a class="nav-link" href=<?php echo ROOT_URL; ?>>Home</a></li>
                <li><a class="nav-link" href=<?php echo ROOT_URL . 'addpost.php'; ?>>Add Post</a></li>
            </ul>
        </div>
    </div>
</nav>