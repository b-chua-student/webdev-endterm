<?php
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private UserRepository $users) {}

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email_account' => 'required|email',
        ]);

        $user = $this->users->findByEmail($data['email_account']);

        if (!$user) {
            return back()->withErrors(['email_account' => 'Email not found.']);
        }

        session(['user' => $user]);
        return redirect()->route('home');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'email_account'     => 'required|email',
            'password'          => 'required|string|min:8|confirmed',
            'instagram_account' => 'nullable|string',
            'address'           => 'nullable|string',
        ]);

        $data['password_hash'] = Hash::make($data['password']);
        $data['role'] = 'customer';
        unset($data['password'], $data['password_confirmation']);

        $this->users->create($data);
        return redirect()->route('login');
    }

    // Logout
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
