<?php

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create(User $user): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO users (name, email, password_hash) 
            VALUES (:name, :email, :password)
        ");
        return $stmt->execute([
            ':name' => $user->name,
            ':email' => $user->email,
            ':password' => $user->password_hash
        ]);
    }

    
    public function findByEmail(string $email): ?User
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch();
        if ($data) {
            $user = new User($data['name'], $data['email'], $data['password_hash']);
            $user->id = $data['id'];
            $user->created_at = $data['created_at'];
            return $user;
        }
        return null;
    }
}
