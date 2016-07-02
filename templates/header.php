<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.0.0.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container">
    <ul class="nav navbar-nav">
        
        <li><a href="?">Home</a></li>
        <?php if (IS_ADMIN): ?>
        <li><a href="?act=logout">Log out</a></li>
        <?php else: ?>
        <li><a href="?act=login">Log in</a></li>
        <?php endif?>
    </ul>
  </div>
</nav>
<div class="container">
	
