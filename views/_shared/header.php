<?php
$login = "<a class='nav-link login' href='/account'>Log In/Up</a>";
if(!empty($_SESSION))
{
  $login = "<div class='dropdown'>
              <a class='nav-link  login dropdown-toggle' href='#' id='userMenu' role='button' data-toggle='dropdown' aria-haspopup='true' 
              aria-expanded='false'><img class='navavatar' src='".$_SESSION["user_avatar"]."'/>Hello, ".$_SESSION["name"]."</a>
              <div class='dropdown-menu' aria-labelledby='userMenu'>
                <a class='dropdown-item' href='/account/profile'>Profile</a>
                <a class='dropdown-item' href='#'>Another action</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='#'>Something diff</a>
              </div>
            </div>
            <a class='nav-link login' href='/account/logOut'>Log out</a>";
};
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The  Cable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/image/default/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/views/_shared/mainStyle.css">
</head>
<body class="mainback">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/home"><img class="logo" src="/image/default/logo.png"/>Cable</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/home/product">Products</a>
      </li>
    </ul>
    <?=$login?>
    
  </div>
</nav>