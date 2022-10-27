<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Closure;
use Illuminate\Http\Request;
use App\Models\ResponseMessages;
use Symfony\Component\HttpFoundation\Response;

class ApiOldPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (isset($user) && !Hash::check($request['old_password'], $user->password)) {
            return response([
                'message' => trans(ResponseMessages::WRONG_CREDENTIALS),
            ], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
