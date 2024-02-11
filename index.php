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
    case 'logout':
      $page_title = "Logout";
      require 'includes/auth/logout.php';
      break;
    case 'dashboard':
      $page_title = "dashboard";
      require 'pages/dashboard.php';
      break;
    case 'products':
      $page_title = "products";
      require 'pages/products.php';
      break;
    

      // manage users 
    case 'manage-users':
       $page_title = "manage-users";
       require 'pages/users/manage-users.php';
       break;
    case 'manage-users-add':
       $page_title = "manage-users-add";
       require 'pages/users/manage-users-add.php';
       break;
    case 'manage-users-edit':
      $page_title = "manage-users-edit";
      require 'pages/users/manage-users-edit.php';
      break;
    case 'manage-users-changepwd':
      $page_title = "manage-users-changepwd";
      require 'pages/users/manage-users-changepwd.php';
      break;
      // manage users 

      // manage products
    case 'manage-products':
      $page_title = "manage-products";
      require 'pages/products/manage-products.php';
      break;
    case 'manage-products-add':
      $page_title = "manage-products-add";
      require 'pages/products/manage-products-add.php';
      break;
    case 'manage-products-edit':
      $page_title = "manage-products-edit";
      require 'pages/products/manage-products-edit.php';
      break;
    // manage products


    default:
    $page_title = "Home Page";
    require 'pages/home.php';
    break;
    
         // action ruotes
        //  auth 
    case 'auth/login':
      require 'includes/auth/login.php';
      break;
    case 'auth/signup':
      require 'includes/auth/signup.php';
      break;
       // auth 

      // manage users
    case 'user/add':
      require 'includes/user/add.php';
      break;
    case 'user/delete':
      require 'includes/user/delete.php';
      break;
    case 'user/edit':
      require 'includes/user/edit.php';
      break; 
    case 'user/changepwd':
      require 'includes/user/changepwd.php';
      break; 
      // manage users

      //manage products 
    case 'products/delete':
      require 'includes/products/delete.php';
       break;
    case 'products/add':
      require 'includes/products/add.php';
      break;
    case 'products/edit':
      require 'includes/products/edit.php';
      break;
       //manage products 

  }