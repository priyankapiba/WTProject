<?php 
include_once('includes/db.php');
require('includes/function.php');
if(isset($_GET['page'])){
  $page=$_GET['page'];
}else{
  $page=1;
}
$intPage = (int) $page;
$post_per_page = 5;
$result=($intPage-1) * $post_per_page;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body style = "background: #dde5f4">
       <?php include_once('includes/navbar.php'); ?>
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-8">

      <?php
        // SEARCH
        if(isset($_GET['search'])){
          $keyword = $_GET['search'];
          // $postQuery = "SELECT * FROM posts WHERE title LIKE '%$keyword%' ORDER BY id DESC LIMIT $result,$post_per_page";
          $postQuery = "SELECT * FROM posts WHERE title LIKE '%$keyword%'ORDER BY id DESC";
        }else{
          // $postQuery = "SELECT * FROM posts ORDER BY id DESC LIMIT $result,$post_per_page";
          $postQuery = "SELECT * FROM posts ORDER BY id DESC";
        }
        //PAGINATION
        
        $conn = mysqli_connect('localhost','root','','firstProject');
        $runPQ = mysqli_query($conn, $postQuery);
        while($posts = mysqli_fetch_assoc($runPQ)){
        ?>
          <div class="card mb-3" style="max-width: 800px;">
          <a href="post.php?id=<?=$posts['id']?>" style="text-decoration:none;color:black">
            <div class="row g-0">
              <div class="col-md-5" style="background-size: cover">
                <img src="data:image/jpeg;base64,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" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $posts['title']; ?></h5>
                  <p class="card-text text-truncate"><?php echo $posts['content']; ?></p>
                  <p class="card-text"><small class="text-muted">Posted on <?php echo date('F jS, Y', strtotime($posts['created_at'])) ; ?></small></p>
                </div>
              </div>
            </div>
          </div>
      </a>  
        <?php
      }
      ?>
        
        
    </div>
    <?php include_once('includes/sidebar.php') ?>
    </div>
    <?php
    //to find total number of pages
    $q = "SELECT * FROM posts";
    $conn = mysqli_connect('localhost','root','','firstProject');
    $r = mysqli_query($conn,$q);
    $total_posts = mysqli_num_rows($r);  //to find total number of posts
    $total_pages = ceil($total_posts/$post_per_page)
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php
          for($page = 1; $page <= $total_pages; $page++){
            ?>
              <li class="page-item"><a class="page-link" href="?page=<?php echo $page ?>"> </a></li>
            <?php
          }
          ?>
          
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
      
      
    <?php include_once('includes/footer.php') ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>