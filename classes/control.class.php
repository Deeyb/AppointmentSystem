<?php
    class Control extends Model {
        public function registerUser($postData) {
            $firstname = isset($postData["firstname"]) ? $postData["firstname"] : "";
            $lastname = isset($postData["lastname"]) ? $postData["lastname"] : "";
            $email = isset($postData["email"]) ? $postData["email"] : "";
            $password = isset($postData["password"]) ? $postData["password"] : "";
            $confirmPassword = isset($postData["confirmpassword"]) ? $postData["confirmpassword"] : "";
            $gender = isset($postData["gender"]) ? $postData["gender"] : "";
            $address = isset($postData["address"]) ? $postData["address"] : "";
    
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            $errors = array();
    
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword) || empty($gender) || empty($address)) {
                array_push($errors, "Please fill in all fields are required");
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            } elseif (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            } elseif ($password !== $confirmPassword) {
                array_push($errors, "Password does not match");
            }
    
            if ($this->checkExistingEmail($email)) {
                array_push($errors, "Email already exists!");
            }
    
            if (count($errors) > 0) {
                $view = new View();
                $view->showErrors($errors);
            } else {
                if ($this->createUser($firstname, $lastname, $email, $passwordHash, $gender, $address)) {
                    $view = new View();
                    $view->showSuccessMessage("Registration successful! You can now log in.");
                } else {
                    $view = new View();
                    $view->showErrors(["Registration failed. Please try again later."]);
                }
            }
        }

        public function loginUser($email, $password) {
            $user = $this->getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_email'] = $email;  // Set the email in session
                $_SESSION['firstname'] = $firstname;
                if ($user['user_type'] == 'admin') {
                    header('Location: admin_dashboard.php');  // Redirect to admin dashboard
                    exit();
                } else {
                    header('Location: dashboard.php');  // Redirect to user dashboard
                    exit();
                }
            }
            return false;  // Login failed
            
        }

        
    }
?>