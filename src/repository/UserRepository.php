<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT *  FROM users LEFT JOIN users_details ON id_users_detail = ud_id WHERE email = :email
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
            $user['user_name'],
            $user['user_surname']
        );
        $newUser->setId($user['user_id']);
        $newUser->setImage($user['picture']);
        return $newUser;
    }

    public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT *  FROM users LEFT JOIN users_details ON id_users_detail = ud_id left join favourite_games on users_id = user_id left join games on games_id = game_id WHERE user_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $newUser = new User(
            $user['email'],
            $user['password'],
            $user['user_name'],
            $user['user_surname']
        );
        $newUser->setId($user['user_id']);
        $newUser->setImage($user['picture']);
        return $newUser;
    }

    public function getUsers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users join users_details ON id_users_detail = ud_id
        ');

        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user){
            $result[] = new User($user['email'], $user['password'], $user['user_name'], $user['user_surname']);
        }

        return $result;
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO users_details (user_name, user_surname, phone, picture) VALUES (?, ?, ?,?)');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
            $user->getImage()
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
        $stmt = $this->database->connect()->prepare('SELECT * FROM users_details WHERE user_name = :name AND user_surname = :surname AND phone = :phone');
        $name = $user->getName();
        $surname = $user->getSurname();
        $phone = $user->getPhone();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['ud_id'];
    }

}