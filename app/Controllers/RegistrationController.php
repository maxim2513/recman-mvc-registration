<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Response\AbstractResponse;
use App\Core\Response\RedirectResponse;
use App\Core\Response\TemplateResponse;
use App\Models\Repositories\UserRepository;
use App\Models\User;

class RegistrationController extends AbstractController
{
    public function index(): TemplateResponse
    {
        return new TemplateResponse('registrationForm');
    }

    public function saveRegistration(Request $request): AbstractResponse
    {
        $user = new User(
            $request->getPost('firstName'),
            $request->getPost('lastName'),
            $request->getPost('email'),
            $request->getPost('mobile'),
        );
        $user->setHashPassword($request->getPost('password'));

        $errors = $user->validate();

        if (!empty($errors)) {
            return new TemplateResponse('registrationForm', [
                'errors' => $errors,
            ]);
        }

        /** @var UserRepository $userRepository */
        $userRepository = $this->app->getRepository('User');

        try {
            $userRepository->saveUser($user);
        } catch (\Exception $exception) {
            return new TemplateResponse('registrationForm', [
                'errors' => [
                    'Error:'.$exception->getMessage(),
                ],
            ]);
        }

        return new RedirectResponse('/');
    }

}