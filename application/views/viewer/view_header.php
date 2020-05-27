<!DOCTYPE html>
<html>
<head>
	<title>viewerpage</title>   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
</head>
<body>
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand h1" href="#">The Austro Asian Times</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"Home</a>
      </li>
    </ul>
	  <?= form_open('viewer/search', ['class'=>'navbar-form navbar-left','role'=>'search'])?>
      <input class="form-control mr-sm-2" name="query" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    <?= form_close();?> 
	  <?= form_error('query', "<p class='navbar-text text-danger'>",'</p>') ?>
	  <a class="nav-link" href="<?= base_url('login/admin_login')?>">login</a>
  </div>
</nav>

