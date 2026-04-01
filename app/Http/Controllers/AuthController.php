<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailLoginRequest;
use App\Contracts\Services\AuthServiceInterface;

class AuthController extends Controller
{
    // Dependency injection passes in an object so creating an object is not required
    public function __construct(
        protected AuthServiceInterface $authService
    ) {}

    // Type-hint EmailLoginRequest to pass request through Request Form
    public function loginByEmail(EmailLoginRequest $userCredentials)
    {
        // Return the data passed through the Form Request
        $validatedUserCredentials = $userCredentials->validated();

        // Pass in the validated data to the Service function
        $loginIsSuccess = $this->authService->loginByEmail($validatedUserCredentials);

        // AuthService returns a TRUE if successfully executed and FALSE otherwise
        if ($loginIsSuccess)
            return redirect()->route('home');
        else
            return back()->withErrors(['invalid' => 'Invalid credentials.']);
    }

    public function loginAsGuest()
    {
        // Guest is logged in through a dummy account
        $guestCredentials = [
            'email' => 'guest@guest',
            'password' => 'password'
        ];

        $loginIsSuccess = $this->authService->loginByEmail($guestCredentials);

        if ($loginIsSuccess)
            return redirect()->route('home');
        else
            return back()->withErrors(['invalid' => 'Invalid credentials.']);
    }
}
