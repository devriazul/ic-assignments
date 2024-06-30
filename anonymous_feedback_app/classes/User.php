<?php
// classes/User.php

class User {
    private $usersFile = 'data/users.json';

    // Constructor
    public function __construct() {
        // Initialize session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Register user
    public function register($name, $username, $password) {
        $users = json_decode(file_get_contents($this->usersFile), true);
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return false;
            }
        }
        $newUser = [
            'name' => $name,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $users[] = $newUser;
        file_put_contents($this->usersFile, json_encode($users, JSON_PRETTY_PRINT));

        return 'Registration successful. You can now <a href="login.php">login</a>.';
    }

    // Login user
    public function login($username, $password) {
        // Check if username exists
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $username;
                    return true;
                } else {
                    return 'Incorrect password. Please try again.';
                }
            }
        }

        return 'Username not found. Please register or try again.';
    }

    // Logout user
    public function logout() {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();
    }

    // Check if user is logged in
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Get logged in user's username
    public function getUsername() {
        return $_SESSION['user_id'];
    }

    // Get logged in user's ID
    public function getUserId() {
        return $_SESSION['user_id'];
    }

    // Get all users from JSON file
    private function getUsers() {
        $users_data = file_get_contents($this->usersFile);
        $users = json_decode($users_data, true);
        if (!$users) {
            $users = [];
        }
        return $users;
    }

    // Save users array to JSON file
    private function saveUsers($users) {
        file_put_contents($this->usersFile, json_encode($users, JSON_PRETTY_PRINT));
    }
}
?>
