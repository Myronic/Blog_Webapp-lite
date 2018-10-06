<?php
    require('config/config.php');
    require('config/db.php');

     #get id
     $id = mysqli_real_escape_string($conn,$_GET['id']);
     #create query
     $query = 'SELECT * FROM post WHERE id='.$id;
     #get result
     $result = mysqli_query($conn,$query);
     #fetch data
     $post= mysqli_fetch_assoc($result);
   

    #check submit
    if(isset($_POST['submit'])){
        $m="your post has been added!";
        echo "<script type='text/javascript'>alert('$m');</script>";

        $update_id = mysqli_real_escape_string($conn,$_POST['update_id']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $body = mysqli_real_escape_string($conn,$_POST['body']);
        $author = mysqli_real_escape_string($conn,$_POST['author']);

    

        $query = "UPDATE post SET
            title='$title',
            author='$author',
            body='$body'
            WHERE id= {$update_id}";

        if(mysqli_query($conn,$query)){
            header('location: '.ROOT_URL.'');
        }else {
            echo "ERROR: ".mysqli_error($conn);
        }
    }
    #free result
    mysqli_free_result($result);
    #close connection
    mysqli_close($conn);
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
                    <input type="text" name="title" class="form-control" style="max-width:400px" value="<?php echo $post['title']?>">
                </div>
                
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" style="max-width:400px" value="<?php echo $post['author']?>">
                </div>

                <div class="form-group">
                    <label>Body</label>
                    <textarea rows="5" type="text" name="body" class="form-control" style="max-width:400px" ><?php echo $post['body']?>"</textarea>
                </div>


                <div class="row justify-content-around">
                <input type="hidden" name="update_id" value="<?php echo $post['id']?>">
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