<?php
include('connectdb.php');
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM data_qna WHERE id= $id");
$result = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Question</title>
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

<!-- Main Body -->
<div class="container-fluid">
  <div class="row" id="wrapper">
        <div class="col-2 pt-4 -grid gap-2 d-md-flex justify-content-md-end" id="left-sidebar">
          <div id="left-menu">
            <ul>
              <li><a class="link-dark" href="./">Home</a></li>
              <li><a class="link-dark" href="#">New Questions</a></li>
              <li><a class="link-dark" href="#">Popular Questions</a></li>
            </ul>
            <div class="-grid gap-2 d-md-flex justify-content-md-end">
              <a class="link-dark" href="./question/ask.php">
                <button class="btn btn-primary" type="button">Ask a Question</button>
              </a>             
            </div>
            <div class="register pt-2 -grid gap-2 d-md-flex justify-content-md-end">
                <a class="link-dark" href="./users/signin.php">
                    <button type="button" class="btn btn-danger btn-sm">Sign In</button>
                </a>
                <a class="link-dark" href="./users/signup.php">
                    <button type="button" class="btn btn-success btn-sm">Register</button>
                </a>             
            </div>  
          </div>
        </div>

        <div class="col py-3" id="question-summary">
        <div class="question-title">
            <div class="row summary">
              <h3 class="align-self-start" >
                <?php echo $result['question'];?>
              </h3>
            </div>
            <div class="row px-4 excerpt">
              <?php echo $result['detail'];?>
            </div>
            <div class="row px-4 tags">
                #CSS , #HTML
            </div>
            <div class="row total-summary">
                <div class="col-6 ps-5 total-like">
                  <strong>10</strong>
                  like
                </div>
                <div class="col-6 total-answer">
                  <strong>10</strong>
                  answer
                </div>
            </div>
          </div>
          <h4 class="mt-4">Your Answer</h4>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a answer here" id="floatingTextarea2" style="height: 300px"></textarea>
            <label for="floatingTextarea2">Answer here</label>
          </div>
          <div class="col-4 mt-2">
            <button class="btn btn-danger" type="button">Post Your Answer</button>
          </div>
        </div>
        <div class="col-2 pt-4" id="right-sidebar">
          <div class="related-tag">
            <h4 id="h-related-tags">Related Tags</h4>
            <div class="javascript">Javascript</div>
            <div class="css">CSS</div>
            <div class="html">HTML</div>
          </div>
        </div>
  </div>   
</div>
 
  

<!-- Footer -->
<footer class="container pt-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
      <small class="d-block mb-3 text-muted">© 2021</small>
      <p> Created by <a href="./">QNA Academy</a></p>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Cool stuff</a></li>
        <li><a class="link-secondary" href="#">Random feature</a></li>
        <li><a class="link-secondary" href="#">Team feature</a></li>
        <li><a class="link-secondary" href="#">Stuff for developers</a></li>
        <li><a class="link-secondary" href="#">Another one</a></li>
        <li><a class="link-secondary" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Resource name</a></li>
        <li><a class="link-secondary" href="#">Resource</a></li>
        <li><a class="link-secondary" href="#">Another resource</a></li>
        <li><a class="link-secondary" href="#">Final resource</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Business</a></li>
        <li><a class="link-secondary" href="#">Education</a></li>
        <li><a class="link-secondary" href="#">Government</a></li>
        <li><a class="link-secondary" href="#">Gaming</a></li>
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