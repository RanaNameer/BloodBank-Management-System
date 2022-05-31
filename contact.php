<?php 

    session_start();

    ?>
<!DOCTYPE html>
<html>
<?php $title="Bloodbank | About page"; ?>
<?php require 'head.php'; ?>
<head>
  <title></title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Blood Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
       
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
       
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Login/Register<span class="sr-only">(current)</span></a>
       
      </li>
     
    </ul>
 
  </div>
</nav>

<div class="jumbotron">
  <h1>Anytime!</h1>
  <p>We are always here to help you!</p>
</div>
<br/><br/>
<section class="my-5">
    <h3 class="text-center">Contact Us</h3>
  
  <div class="text-center">
    <p><strong>Muhammad Bilal- mbilal.bese19seecs@seecs.edu.pk</strong></p>
    <p><strong>Muhammad Omer Qasim- mqasim.bese19seecs@seecs.edu.pk</strong></p>
    <p><strong>Rana Nameer Hussain Khan- rkhan.bese19seecs@seecs.edu.pk</strong></p>
    <p><strong>Ghayoor Ali- gali.bese19seecs@seecs.edu.pk</strong></p>
  </div>
</section>

</body>
</html>