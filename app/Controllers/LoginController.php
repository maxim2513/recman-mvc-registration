<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Response\AbstractResponse;
use App\Core\Response\RedirectResponse;
use App\Core\Response\TemplateResponse;
use App\Models\Repositories\UserRepository;

class LoginController extends AbstractController
{
    public function index(): TemplateResponse
    {
        return new TemplateResponse('loginForm');
    }

    public function login(Request $request): AbstractResponse
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->app->getRepository('User');

        $errors = [];

        $email = $request->getPost('email');
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = $userRepository->getUserByEmail($email);

            if (!$user->verifyPassword($request->getPost('password'))) {
                $errors[] = "Login unsuccessful. Please check your username and password.";
            }
        } else {
            $errors[] = "E-mail is not valid.";
        }

        if (!empty($errors)) {
            return new TemplateResponse('loginForm', [
                'errors' => $errors,
            ]);
        }
        $_SESSION['userEmail'] = $user->getEmail();

        return new RedirectResponse('/');
    }

    public function logout(): RedirectResponse
    {
        unset($_SESSION['userEmail']);

        return new RedirectResponse('/');
    }
}
