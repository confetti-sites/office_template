<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Http\Entity\View;

class Website
{
    public static function canRender(): bool
    {
        return true;
    }

    public static function render(): View
    {
        return match (true) {
            request()->uri() === '/'                     => new View('website.homepage'),
            request()->uri() === '/auth/callback'        => new View('website.includes.auth.callback'),
            request()->uri() === '/blogs'                => new View('website.blog_overview'),
            str_starts_with(request()->uri(), '/blogs/') => new View('website.blog_detail'),
            default                                      => new View('website.404'),
        };
    }
}