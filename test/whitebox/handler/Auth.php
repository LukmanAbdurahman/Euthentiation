<?php
class Auth {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $email, $password) {
        if (strlen($username) < 3) return "Username minimal 3 karakter!";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Email tidak valid!";
        if (strlen($password) < 6) return "Password minimal 6 karakter!";

        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hash]);
            return "success";
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) return "Email atau username sudah terdaftar!";
            return "Terjadi kesalahan, coba lagi.";
        }
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return "success";
        }
        return "Email atau password salah!";
    }

    public function forgotPassword($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return "Link reset telah dikirim (simulasi).";
        } else {
            return "Email tidak ditemukan.";
        }
    }
}

