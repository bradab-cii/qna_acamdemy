<?php
include('connectdb.php');

$num_row = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_qna"));
$limit_page = 4;

//if don't have page
//if(isset($_GET["Page"])){
  //$page = $_GET["Page"];
//}else{
  //$page = 1;
//}
//easy method
$page = @$_GET["Page"] ? $_GET["Page"] : 1;

$num_page = $num_row/$limit_page;
//control page
if($page > $num_page) $page = $num_page;
if(!($num_page == (int)$num_page)) $num_page = (int)$num_page+1;
$limit_start = ($page*$limit_page)-$limit_page;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Header -->
<header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="./">QNA Academy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Lessons</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">C Programming</a></li>
            <li><a class="dropdown-item" href="#">C ++</a></li>
            <li><a class="dropdown-item" href="#">HTML</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>
  
  <!-- Using PHP Loop --> 
<div class="container-fluid">  
  <div class="row">
        <div class="col pt-4 -grid gap-2 d-md-flex justify-content-md-end">
          <div id="left-sidebar">
            <ul>
              <li><a class="link-dark" href="./">Home</a></li>
              <li><a class="link-dark" href="#">New Questions</a></li>
              <li><a class="link-dark" href="#">Popular Questions</a></li>
            </ul>
            <div class="-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary" type="button">Ask a Question</button>
            </div>
            <div class="register pt-2 -grid gap-2 d-md-flex justify-content-md-end">
                <a class="link-dark" href="./users/Signin.php">
                    <button type="button" class="btn btn-danger btn-sm">Sign In</button>
                </a>
                <a class="link-dark" href="./users/signup.php">
                    <button type="button" class="btn btn-success btn-sm">Register</button>
                </a>
            </div>  
          </div>
        </div>

        <div class="col-8 py-3" id="question-summary-1">
      <?php 
      $query = mysqli_query($conn,"SELECT * FROM data_qna ORDER BY id DESC LIMIT $limit_start,$limit_page");
      while($result = mysqli_fetch_array($query)){   
      ?>
        <div class="border border-1 question-summary">
            <div class="row p-1 summary">
              <h3 class="align-self-start" >
                <a href="./questions.php?id=<?php echo $result['id']?>&question=<?php echo $result['question'];?>" style="text-decoration:none">
                  <?php echo $result['question'];?>
                </a>
              </h3>
            </div>
            <div class="row px-4 excerpt">
            ដើម្បីទទួលបានភាពជោគជ័យក្នុងពេលសម្ភាសន៍អ្នកគួរត្រៀមចម្លើយនូវសំនួរដែលអាចនឹងសួរក្នុងពេលធ្វើបទសម្ភាសន៍ ។ ប៉ុន្តែសម្រាប់កម្រងសំណួរទាំងអស់ត្រូវតែមានអ្នកសួរសំណួរ - ហើយសម្រាប់អ្នកសួរសំណួរទាំងអស់ត្រូវតែមានសំណួរ! យើងសន្មត់ថាពេលនេះវាជាអ្នក។
            </div>
            <div class="row px-4 tags">
                #CSS , #HTML
            </div>
            <div class="row total-summary">
                <div class="col-2 ps-5 total-like">
                  <strong>10</strong>
                  like
                </div>
                <div class="col-10 total-answer">
                  <strong>10</strong>
                  answer
                </div>
            </div>
          </div> 
            <?php } ?>   
        </div>
        <div class="col pt-4" id="right-sidebar">
          <div class="related-tag">
            <h4 id="h-related-tags">Related Tags</h4>
            <div class="javascript">Javascript</div>
            <div class="css">CSS</div>
            <div class="html">HTML</div>
          </div>
        </div>
  </div>   
</div>   
  <!-- Pagination -->
  <nav aria-label="...">
  <ul class="pagination justify-content-center" >
  <!---------------------------------- -->
  <?php
  if($page <= 1){
  ?>
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
  <?php }else { ?>
    <li class="page-item">
      <a class="page-link" href="?Page=<?php echo $page-1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
    </li>

  <?php } ?>
  <!---------------------------------- -->
  <?php
  //show first page with commma
  if($page > 5){
  ?>
    <li class="page-item">
      <a class="page-link" href="?Page=1">1</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">..</a>
    </li>
  <?php } ?>  
  <!------------  ---------------------- -->
    <!-- Using PHP -->
    <?php 
    //show limit page
    if($page >= 9){//control total page
      if($page <= 5){
        $num_start = 1;
        $num_stop = 9;
      }elseif ($page > $num_page-4) {
        $num_start = $num_page-8;
        $num_stop = $num_page;
      }else{
        $num_start = $page-4;
        $num_stop = $page+4;
      }
    }else{
      $num_start = 1;
      $num_stop = $num_page;
    }
    for($i=$num_start;$i<$num_stop+1;$i++){ 
      if($page == $i){
    ?>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#"><?php echo $i; ?></a>
    </li>
    <?php 
    }else{   
    ?>
    <li class="page-item"><a class="page-link" href="?Page=<?php echo $i;?>"><?php echo $i; ?></a></li>

    <?php } ?>
    <?php } ?>

  <!---------------------------------- -->
  <?php
  //show last page with commma
  if($page < $num_page-4){
  ?>
    
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">..</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="?Page=<?=$num_page?>"><?=$num_page?></a>
    </li>
  <?php } ?>  
  <!---------------------------------- -->
  <?php
  if($page >= $num_page){
  ?>
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
    </li>
  <?php }else { ?>
    <li class="page-item">
      <a class="page-link" href="?Page=<?php echo $page+1; ?>" tabindex="-1" aria-disabled="true">Next</a>
    </li>

  <?php } ?>
  <!---------------------------------- -->
  </ul>
</nav>


<!-- Footer -->
<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
      <small class="d-block mb-3 text-muted">© 2021</small>
      <p> Created by <a href="./">QNA Academy</a></p>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Cool Questions</a></li>
        <li><a class="link-secondary" href="#">New Questions</a></li>
        <li><a class="link-secondary" href="#">Popular Questions</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Lessons</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">HTML</a></li>
        <li><a class="link-secondary" href="#">CSS</a></li>
        <li><a class="link-secondary" href="#">PHP</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Business</a></li>
        <li><a class="link-secondary" href="#">Education</a></li>
        <li><a class="link-secondary" href="#">Government</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Team</a></li>
        <li><a class="link-secondary" href="#">Locations</a></li>
        <li><a class="link-secondary" href="#">Privacy</a></li>
        <li><a class="link-secondary" href="#">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>
</body>
</html>