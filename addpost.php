<?php
    require('config/config.php');
    require('config/db.php');

    #check submit
    if(isset($_POST['submit'])){
        $m="your post has been added!";
        echo "<script type='text/javascript'>alert('$m');</script>";

        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $body = mysqli_real_escape_string($conn,$_POST['body']);
        $author = mysqli_real_escape_string($conn,$_POST['author']);

        $query = "INSERT INTO post(title,author,body) VALUES ('$title','$author','$body')";

        if(mysqli_query($conn,$query)){
            header('location: '.ROOT_URL.'');
        }else {
            echo "ERROR: ".mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
<?php ?>
    <title>Php Blog</title>
  <?php  require('inc/header.php');?>
</head>
<body>
<?php require('inc/navbar.php');?>
   <div class="container-fluid" style="background-color:burlywood; padding:20px; height:100vh ">
   <div class="jumbotron bg-dark" style="max-width:450px; padding:20px 20px; color:ghostwhite; margin: auto; ">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <h1 class="text-center">---POSTS---</h1>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" style="max-width:400px">
                </div>
                
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" style="max-width:400px">
                </div>

                <div class="form-group">
                    <label>Body</label>
                    <textarea rows="5" type="text" name="body" class="form-control" style="max-width:400px"></textarea>
                </div>


                <div class="row justify-content-around">
                    <div class="col-4 text-center">
                        <input type="submit" value="submit" name="submit" class="btn btn-alert btn-md">
                    </div>
                    <div class='col-4 text-center' >
                        <a href="<?php echo ROOT_URL; ?>"><button class="btn btn-alert">back</button></a>
                    </div>
                </div>
                <div>
                </div>
        </form>
    </div>    
   </div>
   <?php  require('inc/footer.php');?>
</body>
</html>