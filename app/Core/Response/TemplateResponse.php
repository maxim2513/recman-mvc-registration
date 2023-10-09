<?php

namespace App\Core\Response;

use App\Core\Response\AbstractResponse;

class TemplateResponse extends AbstractResponse
{
    protected const VIEW_PATH = APP_PATH.'/Views/';
    protected const BASE_VIEW_LAYOUT = 'layout.php';

    public function __construct(
        readonly protected string $template,
        readonly protected array $params = [],
    ) {
    }

    public function send(): void
    {
        ob_start();

        $params = $this->params;
        include self::VIEW_PATH.$this->template.'.php';
        $content = ob_get_clean();

        $params['content'] = $content;
        include self::VIEW_PATH.self::BASE_VIEW_LAYOUT;
    }
}