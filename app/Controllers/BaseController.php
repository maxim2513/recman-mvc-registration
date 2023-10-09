<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Response\TemplateResponse;

class BaseController extends AbstractController
{
    public function index(): TemplateResponse
    {
        return new TemplateResponse('home');
    }
}