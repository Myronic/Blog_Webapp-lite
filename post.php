<?php
    require('config/config.php');
    #checking if connection is successful or not.
    require('config/db.php');

     #check submit
     if(isset($_POST['delete'])){
        $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);
        $query = "DELETE from post WHERE id= {$delete_id}";

        if(mysqli_query($conn,$query)){
            header('location: '.ROOT_URL.'');
        }else {
            echo "ERROR: ".mysqli_error($conn);
        }
    }
    #get id
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    #create query
    $query = 'SELECT * FROM post WHERE id='.$id;
    #get result
    $result = mysqli_query($conn,$query);
    #fetch data
    $post= mysqli_fetch_assoc($result);
    #free result
    mysqli_free_result($result);
    #close connection
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php Blog</title>
    <?php  require('inc/header.php');?>
</head>
<body>
<?php require('inc/navbar.php');?>
   <div class="container-fluid" style="background-color:burlywood; padding:20px; height:100vh">
    <div class="container">
    <div class="row justify-content-between">
        <div class='col-2' ><a href="<?php echo ROOT_URL; ?>"><button class="btn btn-alert">back</button></a></div>
        <div class='col-8'><h1 class="text-right"><?php echo $post['title'];?>|</h1></div>
    </div>
    <hr>
    <div class="jumbotron bg-dark" style="color:ghostwhite"> 
            <h3>"<?php echo $post['body'];?>"</h3>
            <br><br>
            <p class="text-right" style="font-size:1.2vw">
                Created On: 
                    <?php echo $post['created_at'];?>
                <br>-
                    <span style="color:yellow"><?php echo $post['author'];?></span>
            </p>
            <hr>
           
            <div class="row justify-content-between">
                <div class="col-3">
                    <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id'] ?>"><button class="btn btn-alert ">Edit Blog</button></a>
                </div>
                <div class="col-3"> 
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
                        <input type="submit" name="delete" value="Delete Blog" class="btn btn-danger">
                    </form>
                </div>
            </div>
                
        </div>
    </div>
    </div>
    <?php  require('inc/footer.php');?>
</body>
</html>