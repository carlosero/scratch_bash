<?php
require "libs/connection.php";

class User {
  const TABLE_NAME = "users";
  var $id;
  var $name;
  var $user;
  var $password;
  var $password_confirmation;
  var $credits;
  var $conn;
  var $created;
  var $validation_errors;
  var $has_errors;
  var $has_signin_errors;

  /***************/
  /* CONSTRUCTOR */
  /***************/
  function User() {
    $this->conn = new Connection();
  }

  /*****************/
  /* CLASS METHODS */
  /*****************/
  public static function find($id) {
    $model = new User();
    $query = "Select id,name,user,credits from users where id=" . $id;
    // $this->conn($query);
    $result = $model->conn->select_query($query);
    $row = $result->fetch_row();
    if ($row) {
      $model->id = $row[0];
      $model->name = $row[1];
      $model->user = $row[2];
      $model->credits = $row[3];
      return $model;
    } else {
      $model->close_connection();
      return false;
    }
  }

  public static function create($name, $user, $password, $password_confirmation, $credits = 0) {
    $model = new User();
    $model->name = $name;
    $model->user = $user;
    $model->credits = $credits;
    $model->password = $password;
    $model->password_confirmation = $password_confirmation;
    $model->run_validations();
    if ($model->has_errors) {
      $model->created = false;
      $model->close_connection();
    } else {
      $query = "insert into users (name, user, password, credits) 
                values('" . $name . "', '" . $user . "', '" . $model->secure_password() . "'," . $credits . ")";
      $result = $model->conn->insert_query($query);
      $model->password = false;
      if ($result) {
        $model->id = $result;
        $model->created = true;
      } else {
        $model->created = false;
        $model->close_connection();
      }
    }
    return $model;
  }

  public static function signin($username, $password) {
    $model = new User();
    $model->has_signin_errors = false;
    $model->user = $username;
    $model->password = $password;
    $model->run_signin_validations();
    if ($model->has_errors) {
      $model->close_connection();
    } else {
      $query = "Select id,name,credits from users where user='" . $model->user . "' and password = '" . $model->secure_password() . "'";
      $result = $model->conn->select_query($query);
      $row = $result->fetch_row();
      if ($row) {
        $model->id = $row[0];
        $model->name = $row[1];
        $model->credits = $row[2];
        return $model;
      } else {
        $model->close_connection();
        $model->has_errors = true;
        $model->has_signin_errors = true;
      }
    }
    return $model;
  }

  /********************/
  /* INSTANCE METHODS */
  /********************/
  function add_credits($credits) {
    $this->credits += $credits;
    $this->save();
  }

  function subtract_credits($credits) {
    $this->credits -= $credits;
    if ($this->credits < 0) { $this->credits = 0; }
    $this->save();
  }

  function close_connection() {
    $this->conn->close_connection();
  }

  function save() {
    if ($this->password) {
      $query = "update users set name='" . $this->name . "', 
                               user='" . $this->user . "', 
                               password='" . $this->secure_password() . "', 
                               credits=" . $this->credits . "
                               where id=" . $this->id;
    } else {
      $query = "update users set name='" . $this->name . "', 
                                 user='" . $this->user . "', 
                                 credits=" . $this->credits . "
                                 where id=" . $this->id;
    }
    $this->password = false;
    return $this->conn->insert_query($query);
  }

  function destroy() {
    $query = "delete from users where id=" . $this->id;
    return $this->conn->insert_query($query);
  }

  function run_validations() { // validations
    $this->has_errors = false;
    $this->validation_errors = [];
    // Validate each field and write errors to array
    $custom_errors = [];
    $custom_errors[0] = "The password must contain at least 4 characters";
    $this->validation_errors['name'] = $this->validate("name", $this->name, 2, 20);
    $this->validation_errors['user'] = $this->validate("user", $this->user, 2, 20);
    $this->validation_errors['password'] = $this->validate("password", $this->password, 4, 20, $custom_errors);
    $custom_errors[2] = "You must confirm your password";
    $this->validation_errors['password_confirmation'] = $this->validate("password_confirmation", $this->password_confirmation, 4, 20, $custom_errors);

    // Validate user is unique if no validation errors detected
    if (!$this->validation_errors['user']) {
      $this->validation_errors['user'] = $this->validate_unique("user", $this->user, "User has already been taken");
    }

    // Validate passwords are equal if no other validation error detected
    if (!$this->validation_errors['password_confirmation']) {
      $this->validation_errors['password_confirmation'] = $this->validate_equal($this->password, $this->password_confirmation, "The passwords you introduced do not match");
    }

    // verify if there are errors and set result to has_errors
    if (!!$this->validation_errors['name'] ||
        !!$this->validation_errors['user'] ||
        !!$this->validation_errors['password'] ||
        !!$this->validation_errors['password_confirmation']) { $this->has_errors = true; }
  }

  function run_signin_validations() { // validations
    $this->has_errors = false;
    $this->validation_errors = [];
    // Validate each field and write errors to array
    $custom_errors = [];
    $custom_errors[0] = "The password must contain at least 4 characters";
    $this->validation_errors['user'] = $this->validate("user", $this->user, 2, 20);
    $this->validation_errors['password'] = $this->validate("password", $this->password, 4, 20, $custom_errors);

    // verify if there are errors and set result to has_errors
    if (!!$this->validation_errors['user'] ||
        !!$this->validation_errors['password']) { $this->has_errors = true; }
  }

  /*******************/
  /* PRIVATE METHODS */
  /*******************/
  private function secure_password() {
    return hash("sha512", $this->password);
  }

  private function validate($object, $text, $min, $max, $custom_msg = []) {
    if (!!$text) {
      if (strlen($text) < $min) {
        return (isset($custom_msg) && isset($custom_msg[0])) ?
          $custom_msg[0] : "The " . $object . " you introduced is too short";
      } else {
        if (strlen($text) > $max) {
          return (isset($custom_msg) && isset($custom_msg[1])) ?
            $custom_msg[1] : "The " . $object . " you introduced is too long";
        }
      }
    } else { return (isset($custom_msg) && isset($custom_msg[2])) ?
        $custom_msg[2] : "You must introduce a " . $object . ""; }
  }

  private function validate_unique($field, $data, $msg) {
    $query = "Select 1 from users where " . $field . "='" . $data . "'";
    $result = $this->conn->select_query($query);
    $row = $result->fetch_row();
    if ($row) {
      return $msg;
    }
  }

  private function validate_equal($value1, $value2, $msg) {
    if ($value1 != $value2) {
      return $msg;
    }
  }

}

?>