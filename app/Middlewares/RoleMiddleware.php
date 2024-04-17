<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class RoleMiddleware
{
    public function handle(Request $request)
    {
        if (!Auth::checkRole()) {
            app()->route->redirect('/librarian_page');
        }
    }
}