<?php

namespace Middlewares;
use Src\Auth\Auth;
use Src\Request;

class RoleLibrarianMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::checkRole()) {
            app()->route->redirect('/admin');
        }
    }
}