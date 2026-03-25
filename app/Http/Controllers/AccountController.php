<?php
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(private UserRepository $users) {}

    public function index()
    {
        return view('accounts.index', ['users' => $this->users->getAll()]);
    }

    public function show(int $id)
    {
        return view('accounts.show', ['user' => $this->users->findById($id)]);
    }

    public function showByRole(string $role)
    {
        return view('accounts.index', ['users' => $this->users->findByRole($role)]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'email_account'     => 'required|email',
            'password_hash'     => 'required|string',
            'instagram_account' => 'nullable|string',
            'address'           => 'nullable|string',
            'role'              => 'required|in:admin,customer,staff',
        ]);

        $this->users->create($data);
        return redirect()->route('accounts.index');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'first_name'        => 'sometimes|string',
            'last_name'         => 'sometimes|string',
            'email_account'     => 'sometimes|email',
            'instagram_account' => 'sometimes|string',
            'address'           => 'sometimes|string',
        ]);

        $this->users->update($id, $data);
        return redirect()->route('accounts.show', $id);
    }

    public function updatePassword(Request $request, int $id)
    {
        $request->validate(['password_hash' => 'required|string']);
        $this->users->updatePassword($id, $request->password_hash);
        return redirect()->route('accounts.show', $id);
    }

    public function updateRole(Request $request, int $id)
    {
        $request->validate(['role' => 'required|in:admin,customer,staff']);
        $this->users->updateRole($id, $request->role);
        return redirect()->route('accounts.show', $id);
    }

    public function destroy(int $id)
    {
        $this->users->delete($id);
        return redirect()->route('accounts.index');
    }
}
