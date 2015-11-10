<?php
require "models/user.php";
require "libs/helper_methods.php";
session_start();

class Controller {
  var $action;

  function Controller() {
    if (isset($_REQUEST['action'])) {
      $this->action = $_REQUEST['action'];
    } else {
      if (user_loged_in()) {
        $this->action = 'home';
      } else {
        $this->action = 'login';
      }
    }
  }

  function render_action(){
    $action = $this->action;
    if (user_loged_in()) { // redirect user to his home if trying to go to other sites
      if ($action == 'login' || $action == 'register' || $action == 'create' || $action == 'signin') {
        redirect("home");
      }
    } else { // redirect user to login page
      if ($action == 'home' || $action == 'play' || $action == 'logoff') {
        redirect("login");
      }
    }
    if (isset($_SESSION["user_id"])) {$user = User::find($_SESSION["user_id"]);}
    include("views/header.php");
    switch ($action) {
      case 'register':
          $user = new User();
          include("views/register.php");
          break;
      case 'create':
          $user = User::create($_REQUEST["user_name"], $_REQUEST["user_user"], $_REQUEST["user_password"], $_REQUEST["user_password_confirmation"]);
          if ($user->has_errors) {
            write_message_after_request("Could not register, check de errors below.");
            include("views/register.php");
          } else {
            write_message_after_request("You registered correctly, now you can login.");
            include("views/login.php");
          }
          break;
      case 'login':
          $user = new User();
          include("views/login.php");
          break;
      case 'signin':
          // validate user credentials
          $user = User::signin($_REQUEST["user_user"], $_REQUEST["user_password"]);
          if ($user->has_errors) {
            if ($user->has_signin_errors) {
              write_message_after_request("The user or password you've entered is incorrect");
            } else {
              write_message_after_request("Could not login, check de errors below.");
            }
            include("views/login.php");
          } else {
            $_SESSION["user_id"] = $user->id;
            redirect("home");
          }
          break;
      case 'home':
          include("views/home.php");
          break;
      case 'play':
          include("views/play.php");
          break;
      case 'logoff':
          session_destroy();
          write_message_after_request("You have successfully loged off");
          $user = new User();
          include("views/login.php");
          break;
      default:
          redirect("/");
    }
    include("views/footer.php");
  }
}
?>