<?php
    require('config/config.php');
    #checking if connection is successful or not.
    require('config/db.php');
    // require('inc/navbar.php');

    #create query
    $query = 'SELECT * FROM post ORDER bY created_at DESC';
    #get result
    $result = mysqli_query($conn,$query);
    #fetch data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
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
   <div class="container-fluid " style="background-color:burlywood; padding:20px">
   <h1 class="text-center h"><b>BLOGS</b></h1>
    <div class="container">
    <?php foreach($posts as $post):?>
        <hr>
        <div class="jumbotron bg-dark" style="color:ghostwhite">
            <h3>|<?php echo $post['title']; ?></h3>
            <small>
                    Created On 
                        <?php echo $post['created_at'];?>
                        <br>by 
                        <span style="color:yellow"> <?php echo $post['author'];?></span>
                
            </small><hr>
            <i><p style="padding-left:5%;padding-right:10%; font-size:2vw">"<?php echo $post['body'];?>"</p></i> <br>
            <div class="text-right">
                <a class="btn btn-success" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">read more</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
   </div>
   <?php  require('inc/footer.php');?>
</body>
</html>
