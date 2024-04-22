<?php
class Model extends Dbconnection {
    
    protected function checkExistingEmail($email) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result !== false;
    }

    protected function createUser($firstname, $lastname, $email, $passwordHash, $gender, $address) {
        $pdo = $this->connect();
        $sql = "INSERT INTO users (firstname, lastname, email, password, user_type, gender, address) VALUES (?, ?, ?, ?, 'user', ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$firstname, $lastname, $email, $passwordHash, $gender, $address]);
    }

    protected function getUserByEmail($email) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the user as an associative array
    }
}
?>