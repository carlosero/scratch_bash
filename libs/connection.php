<?php
class Connection {
  # default
  const SERVERNAME = "sql113.byethost7.com";
  const USERNAME = "b7_16865768";
  const PASSWORD = "17476948";
  const DATABASE = "b7_16865768_scratch_bash";
  private $conn;

  function Connection() {
    $this->conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DATABASE);
  }

  function insert_query($query) {
    if ($this->conn->query($query)) {
      return $this->conn->insert_id;
    } else {
      return false;
    }
  }

  function select_query($query) {
    return $this->conn->query($query);
  }
  
  function close_connection() {
    $this->conn->close();
  }
}
?>
