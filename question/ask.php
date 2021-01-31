<?php
 include('processForm.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Ask a Question</title>
</head>
<body>
<header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="../">QNA Academy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="../">Home</a>
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
<div class="container-fluid">
  <div class="row mt-5" id="wrapper">
      <div class="col-8" id="ask-form">
        <form id="login-form" action="ask.php" method="GET">
                  <h3 class="h3 mb-3 fw-normal">Ask a public question</h3>
                  <label for="inputTitle">ចំណងជើង - Title</label>
                    <input type="text" id="inputtitle" name="question" class="form-control" placeholder="ចំណងជើង - Type something here...." required="" autofocus="">
                  <label for="inputText">បន្ថែមលំអិត - More Detail</label>
                    <textarea name="detail" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                  <div class="col-4 my-2">
                    <button name="post" class="btn btn-lg btn-danger" type="submit">Post Your Answer</button>
                  </div>
                  <?php if(!empty($msg)):?>
                    <div class="alert <?php echo $css_class; ?>">
                    <?php echo $msg; ?>
                    </div>    
                  <?php endif ?>
        </form>
      </div>  
      <div class="col" id="note">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Note</h5>
          </div>
          <p class="mb-1">Write what do you wanna know.</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Firstly , Write about title</h5>
          </div>
          <p class="mb-1">Don't forget write down.</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Then, Explain more information details</h5>
          </div>
          <p class="mb-1">Write at least 20 character.</p>
        </a>
      </div>
    </div>
</div>
</body>
</html>