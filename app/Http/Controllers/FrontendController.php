<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class FrontendController extends Controller
{
    /**
     * Redirect the application root directly to the admin dashboard (if authenticated)
     * or the admin login page (if guest).
     */
    public function index(): RedirectResponse
    {
        if (auth()->check()) {
            return redirect(AdminPath());
        }

        return redirect(AdminPath() . '/login');
    }
}
