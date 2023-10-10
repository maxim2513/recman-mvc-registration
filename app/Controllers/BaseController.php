<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Response\TemplateResponse;
use App\Models\Repositories\UserRepository;

class BaseController extends AbstractController
{
    public function index(): TemplateResponse
    {
        if (isset($_SESSION['userEmail'])) {
            /** @var UserRepository $userRepository */
            $userRepository = $this->app->getRepository('User');
            $user = $userRepository->getUserByEmail($_SESSION['userEmail']);

            return new TemplateResponse('userInfo', [
                'user' => $user,
            ]);
        }

        return new TemplateResponse('home');
    }
}