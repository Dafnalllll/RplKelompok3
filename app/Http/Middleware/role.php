<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class role
{
    public function handle(Request $request, Closure $next, $role)
    {
        // pastikan user sudah login
        if (! $request->user()) {
            return redirect('/login');
        }

        // Jika role yang diminta 'user', admin juga boleh lewat
        if ($role === 'user' && $request->user()->role === 'admin') {
            return $next($request);
        }

        // cek role sesuai parameter
        if ($request->user()->role !== $role) {
            // redirect ke halaman sesuai role jika bukan role yang diminta
            if ($request->user()->role === 'admin') {
                return redirect('/admin');
            } elseif ($request->user()->role === 'user') {
                return redirect('/dashboard');
            }
            // jika role tidak dikenali
            return abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
