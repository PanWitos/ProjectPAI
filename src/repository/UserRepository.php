<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_users_detail = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $newUser = new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
        $newUser->setId($user['id']);
        return $newUser;
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO users_details (name, surname, phone) VALUES (?, ?, ?)');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);

        $stmt = $this->database->connect()->prepare('INSERT INTO users (id_users_detail, email, password) VALUES (?, ?, ?)');

        $stmt->execute([
            $this->getUserDetailsId($user),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users_details WHERE name = :name AND surname = :surname AND phone = :phone');
        $name = $user->getName();
        $surname = $user->getSurname();
        $phone = $user->getPhone();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

}