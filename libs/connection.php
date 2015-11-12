<?php
class Connection {
  # default
  const SERVERNAME = "localhost";
  const USERNAME = "ShoutzDev";
  const PASSWORD = "SQL@cc3ss";
  const DATABASE = "rfsidedev";
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
