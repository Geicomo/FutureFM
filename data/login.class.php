<?php
class LoginUser {
    // class properties
    private $username;
    private $password;
    public $error;
    public $success;
    private $storage = "/var/www/data.json";
    private $stored_users;

    // class methods
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->login();
    }

    private function login() {
        // Check if the username exists in stored users
        if (array_key_exists($this->username, $this->stored_users)) {
            $user = &$this->stored_users[$this->username]; // Directly access the user by username

            $stored_password = $user['password'];
            $stored_salt = $user['salt'];
            $privileges = $user['privileges'];

            // Hash the provided password with the stored salt
            $hashed_password = hash('sha256', $this->password . $stored_salt);

	    if ($privileges === "admin" || $privileges === "owner") {
	    if ($hashed_password === $stored_password) {
                file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT));

                session_start();
                $_SESSION['username'] = $this->username;
		$_SESSION['authorized'] = true;
		header( 'location: /admin/home.php' );
	    	}
	    	} else {	
        		return $this->error = "You are not authorized to login";
		}	    
      	}
        return $this->error = "Wrong username or password";
	}
}
?>
