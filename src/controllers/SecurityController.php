<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';
    private $userRepository;
    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages' => ['User not exist']]);
        }

        if ($user->getEmail() !== $email)
        {
            return $this->render('login', ['messages' => ['User with this email doesnt exist']]);
        }

        if ($user->getPassword() !== $password)
        {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

        //return $this->render('rosters');

        session_start();

        $_SESSION['userid'] = $user->getId();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/rosters");
    }

    public function register()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmedPassword = $_POST['confirmedPassword'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phone = $_POST['phone'];
            $img = $_FILES['file']['name'];

            if ($password !== $confirmedPassword) {
                return $this->render('register', ['messages' => ['Please provide proper password']]);
            }

            $user = new User($email, md5($password), $name, $surname);
            $user->setPhone($phone);
            $user->setImage($img);

            $this->userRepository->addUser($user);


            return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
        }

        return $this->render('register');

    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        return $this->render('login');
    }
}