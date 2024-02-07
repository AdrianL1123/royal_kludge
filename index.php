<?php

  // start session
  session_start();

  // require the functions.php file
  require "includes/functions.php";

  // get the current path the user is on
  $path = $_SERVER["REQUEST_URI"];
  // remove all the query string from the URL
  $path = parse_url( $path, PHP_URL_PATH );
  // trim out the beginning slash
  $path = trim( $path, '/' );

  // simple router system - deciding what page to load based on the url
  // Routes
  switch ( $path ) {
    // page routes
    case 'login':
      $page_title = "Login";
      require 'pages/login.php';
      break;
    case 'signup':
      $page_title = "Sign Up";
      require 'pages/signup.php';
      break;
    case 'products':
      $page_title = "products";
      require 'pages/products.php';
      break;
    default:
      $page_title = "Home Page";
      require 'pages/home.php';
      break;


    // action ruotes
    case 'auth/login':
      require 'includes/auth/login.php';
      break;
    case 'auth/signup':
      require 'includes/auth/signup.php';
      break;
      case 'logout':
    case 'auth/logout':
      require 'includes/auth/logout.php';
      break;

  }