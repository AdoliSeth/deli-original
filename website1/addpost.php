<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['submit'])){
    echo "Submitted";

    //  get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $query = "INSERT INTO posts(title, description, price) VALUES('$title', '$description', '$price')";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}



?>

<?php include ('inc/header.php') ?>
    <div class="container">
        <h1>Add Posts</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="font-weight: bold; color: orange">
        <fieldset>
                <div class="form-group">
                    <label style="color: darkorange" for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="body" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <button class="btn btn-warning btn-block" name="submit" value="Submit" type="submit">Add</button>
        </fieldset>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>

