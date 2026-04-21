<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EmailLoginRequest;
use App\Http\Requests\EmailRegisterRequest;
use App\Contracts\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Dependency injection passes in an object so creating an object is not required
    public function __construct(
        protected AuthServiceInterface $authService
    ) {}

    // Type-hint EmailLoginRequest to pass request through Request Form
    public function loginByEmail(EmailLoginRequest $request)
    {
        // Return the data passed through the Form Request
        $validatedUserCredentials = $request->validated();

        // Pass in the validated data to the Service function
        $loginIsSuccess = $this->authService->loginByEmail($validatedUserCredentials);

        // AuthService returns a TRUE if successfully executed and FALSE otherwise
      if ($loginIsSuccess) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return view('admin.dashboard.index');
            }
            return redirect()->route('home');
        }

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

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect()->route('login');
    }

    public function register(EmailRegisterRequest $request)
    {
        $validated = $request->validated();
        $isUserCreated = $this->authService->createUser($validated);

        if ($isUserCreated instanceof User ) {
            $this->authService->loginByEmail([
                'email'    => $validated['email'],
                'password' => $validated['password'],
            ]);
            return redirect()->route('home');
        } else
        {
            return back();
        }
    }
}
