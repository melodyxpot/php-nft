<?php

namespace App\Models;

use App\Models\Entitys\User;
use App\Services\QuerysDatabase\QueryInserter;
use Src\Helpers\MessageAuth;
use Src\Middlewares\AuthenticatorMiddleware;

class Authentication extends QueryInserter
{

    protected function authSignIn(string $email, string $password): void
    {
        $verifyEmail = AuthenticatorMiddleware::verifyEmail($email);
        $verifyPassword = true /* AuthenticatorMiddleware::verifyPassword($password) */;

        if($verifyEmail === false || $verifyPassword === false) return;

        $user = QueryInserter::schemaLoginUser( (string) $email, (string) $password );

        if(!$user){
            MessageAuth::launchMessage('error', 'Invalid data!');
            return;
        }

        new User( (int) $user['id'], (string) $user['name'], (string) $email, (string) $password, (string) $user['image'], (string) $user['type_user'] );

        MessageAuth::launchMessage('success', 'Success login!');
        header('Location: '.BASE_URL.'/home');
    }

    protected function authSignUp(string $name, string $email, string $password, array $image, string $type): void
    {
        $verifyName = AuthenticatorMiddleware::verifyName($name);
        $verifyEmail = AuthenticatorMiddleware::verifyEmail($email);
        $verifyPassword = AuthenticatorMiddleware::verifyPassword($password);
        $verifyImage = AuthenticatorMiddleware::verifyImage($image);

        if($verifyEmail === false || $verifyEmail === false || $verifyPassword === false || $verifyImage === false) return;

        $launch = QueryInserter::schemaSetUser( (string) $name, (string) $email, (string) $password, (string) $image['name'], (string) $type );
        
        if(!$launch){
            MessageAuth::launchMessage('error', 'Error registering!');
            return;
        }

        move_uploaded_file($image['tmp_name'], dirname(__DIR__, 2). '\storage\users\\' . $image['name']);
        new User( (int) $launch, (string) $name, (string) $email, (string) $password, (string) $image['name'], (string) $type );

        header('Location: '.BASE_URL.'/home');
    }

}

?>