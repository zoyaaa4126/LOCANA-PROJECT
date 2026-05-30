<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Kalau akses halaman create review, redirect ke review page dengan flag
        if ($request->routeIs('reviews.create')) {
            $id = $request->route('id');
            return route('reviews.index', $id) . '?login_required=1';
        }

        return route('login');
    }
}