<?php

class DatabaseManager {

    private  $connection;
    private  $db_name;
	private  $db_user;
	private  $db_pass;
    private  $db_host;

    function __construct() {
        $this->connection = false;
        $this->db_name = 'pnrpoint_sta_bde';
        $this->db_user = 'pnrpoint';
        $this->db_pass = 'team123**';
        $this->db_host = 'pnrpoint.com';
    }
    
    public function getConnection() {
        if (!$this->connection) {
            $this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        }
        return $this->connection;
    }
}

?>