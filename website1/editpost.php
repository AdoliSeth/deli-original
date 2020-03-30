<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['submit'])){
    echo "Submitted";

    //  get form data
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $query = "UPDATE posts SET
                    title = '$title',
                    description = '$description',
                    price = '$price'
                    WHERE id = {$update_id}";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}


//  get ID
if (!empty($_GET["id"])) {
    $id = mysqli_real_escape_string($conn,
        $_GET["id"]);
}

//  create query
if (!empty($id)) {
    $query = 'SELECT * FROM posts WHERE id = '.$id;
}

// get result
if (!empty($query)) {
    $result = mysqli_query($conn, $query) ;
}

//fetch data
if (!empty($result)) {
    $posts = mysqli_fetch_assoc($result);
}

//free result
if (!empty($result)) {
    mysqli_free_result($result);
}

//close the connection
mysqli_close($conn);

?>

<?php include ('inc/header.php') ?>

<div class="container">
    <h1>Edit Posts</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="font-weight: bold; color: orange">
        <fieldset>
            <div class="form-group">
                <label style="color: darkorange" for="">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $posts['title']; ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea type="body" name="description" class="form-control" ><?php echo $posts['description']; ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $posts['price']; ?>">
            </div>
            <input type="hidden" name="update_id" value="<?php echo $posts['id']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </fieldset>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>

