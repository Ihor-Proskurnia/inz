<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
/**
 * @see VerificationControllerOA
 */
class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('verify');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));

        if (empty($user)) {
            return redirect()->away($this->build_redirect_url(0), Response::HTTP_FOUND);
        }
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->away(
            $this->build_redirect_url(1),
            Response::HTTP_MOVED_PERMANENTLY
        );
    }

    private function build_redirect_url(int $email_verified)
    {
        return $this->redirectPath() . '?' .
            http_build_query(['email_verified' => $email_verified]);
    }

    private function redirectPath()
    {
        return implode('/', [
            config('front.url', 'localhost'),
        ]);
    }
}
