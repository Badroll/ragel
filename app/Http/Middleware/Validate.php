<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use Session;

class Validate
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session 'nama_session' ada
        if (!Session::has("user")) {
            // Jika tidak, redirect ke URL tertentu
            return redirect(url('auth/login'))->with('error', 'Silahkan login dahulu untuk mengaksees inventory'); // Ganti 'login' dengan nama route yang diinginkan
        }

        return $next($request);
    }
}
