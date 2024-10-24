<?php
// open database connnection
require_once('includes/db.php');
$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

// check login/logout params
include_once("includes/sessions.php");
$session_messages = array();
process_session_params($db, $session_messages);

// is the current user an admin?
define('ADMIN_GROUP_ID', 1); // see init.sql
$is_admin = is_user_member_of($db, ADMIN_GROUP_ID);


function match_routes($uri, $routes)
{
  if (is_array($routes)) {
    foreach ($routes as $route) {
      if (($uri == $route) || ($uri == $route . '/')) {
        return True;
      }
    }
    return False;
  } else {
    return ($uri == $routes) || ($uri == $routes . '/');
  }
}

// Grabs the URI and separates it from query string parameters
error_log('');
error_log('HTTP Request: ' . $_SERVER['REQUEST_URI']);
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if (preg_match('/^\/public\//', $request_uri) || $request_uri == '/favicon.ico') {
  // let the web server respond for static resources
  return False;
} else if (match_routes($request_uri, '/')) {
  require 'pages/home.php';
} else if (match_routes($request_uri, '/resources')) {
  require 'pages/resources.php';
} else if (match_routes($request_uri, '/how-to-cite')) {
  require 'pages/citations.php';
} else if (match_routes($request_uri, '/best-practices')) {
  require 'pages/standards.php';
} else if (match_routes($request_uri, '/yokos-kitchen')) {
  require 'pages/kitchen.php';
} else if (match_routes($request_uri, '/flowershop')) {
  require 'pages/flowershop.php';
} else if (match_routes($request_uri, '/gradebook')) {
  require 'pages/gradebook.php';
} else if (match_routes($request_uri, '/gradebook/update')) {
  require 'pages/gradebook-edit.php';
} else if (match_routes($request_uri, '/shoe-review')) {
  require 'pages/shoes.php';
} else if (match_routes($request_uri, '/plop-box')) {
  require 'pages/plopbox.php';
} else if (match_routes($request_uri, '/plop-box/document')) {
  require 'pages/document.php';
} else {
  error_log("  404 Not Found: " . $request_uri);
  http_response_code(404);
  require 'pages/404.php';
}
