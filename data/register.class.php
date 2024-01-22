<?php
class RegisterUser {
    private $username;
    private $raw_password;
    private $encrypted_password;
    private $email;
    public $error;
    public $success;
    private $storage = "/var/www/temp.json";
    private $stored_users;
    private $new_user; // array

    public function __construct($username, $password, $email) {
        $this->username = trim($username);
        $this->username = filter_var($this->username, FILTER_SANITIZE_STRING);

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);

        $this->email = $email;

        date_default_timezone_set('America/Los_Angeles');

	$htpassword = crypt($this->raw_password, base64_encode($this->raw_password));
        $salt = bin2hex(random_bytes(3));
        $encrypted_password = hash('sha256', $this->raw_password . $salt);

        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $registrationTime = date('m-d-Y h:i:s a'); // Get current date and time in 12-hour format

        $this->new_user = [
            "password" => $encrypted_password,
            "salt" => $salt,
            "email" => $email,
            "HTpassword" => $htpassword,
            "privileges" => "default",
            "registrationTime" => $registrationTime,
        ];
        if ($this->checkFieldValues()) {
                $this->insertUser();
        }
    }

    private function checkFieldValues() {
        if (empty($this->username) || empty($this->raw_password) || empty($this->email)) {
            $this->error = "All fields are required.";
            return false;
        } else {
            return true;
        }
    }

    private function usernameExists() {
        return isset($this->stored_users[$this->username]);
    }

    private function emailExists() {
        foreach ($this->stored_users as $user) {
            if (isset($user['email']) && $user['email'] === $this->email) {
                return true;
            }
        }
        return false;
    }

    private function insertUser() {
        if (!$this->usernameExists()) {
            if (!$this->emailExists()) {
                $this->stored_users[$this->username] = $this->new_user;
                if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                    $this->success = "Your registration was successful";
                } else {
                    $this->error = "Something went wrong, please try again";
                }
            } else {
                $this->error = "Email already in use";
            }
        } else {
            $this->error = "Username already taken, please choose a different one.";
        }
    }

}

?>
