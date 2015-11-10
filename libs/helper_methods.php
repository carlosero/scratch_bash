<?php
  function generate_select_number_options($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
      echo '<option value="' . $i . '">' . $i . "</option>";
    }
  }

  function write_message_after_request($message) {
    $_SESSION["messages"] = $message;
  }

  function print_request_messages() {
    if (isset($_SESSION["messages"])) {
      echo $_SESSION["messages"];
      $_SESSION["messages"] = "";
    }
  }

  function print_field_error($model,$field) {
    if ($model && $model->has_errors) {
      echo $model->validation_errors[$field];
    }
  }

  function user_loged_in() {
    if (isset($_SESSION) & isset($_SESSION["user_id"])) { return true; } else { return false; }
  }

  function redirect($act = "/") {
    if ($act = "/") {
      header("Location: /");
    } else {
      header("Location: /?action=" . $act);
    }
  }

?>
