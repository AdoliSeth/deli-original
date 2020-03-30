<?php
    require ('config/config.php');
    require ('config/db.php');
//  create query
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

   // get result
    $result = mysqli_query($conn, $query) ;

    //fetch data
if (!empty($result)) {
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

    //free result
if (!empty($result)) {
    mysqli_free_result($result);
}

    //close the connection
    mysqli_close($conn);

?>
<br>
    <?php include ('inc/header.php') ?>

            <div class="container">
                <h1>Posts</h1>
                <?php foreach($posts as $post):  ?>
                            <div class="well">
                                <h3><?php echo $post['title'] ?></h3>
                                <small>Created on <?php echo $post['created_at'] ?> by </small>
                                <small><?php echo $post['description']?></small>
                                <p><?php echo $post['price'];?></p>
                                <a class="btn btn-default" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id'];?>">Buy Now</a>
                            </div>
                    <?php endforeach; ?>
            </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include ('inc/footer.php') ?>
