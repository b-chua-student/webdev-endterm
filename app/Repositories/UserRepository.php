<?php
namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function findById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function findByInstagram(string $instagramAccount): User
    {
        return User::where('instagram_account', $instagramAccount)->firstOrFail();
    }

    public function findByRole(string $role): Collection
    {
        return User::where('role', $role)->get();
    }

    public function getAll(): Collection
    {
        return User::all();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(int $id, array $data): User
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user->fresh();
    }

    public function updatePassword(int $id, string $passwordHash): User
    {
        $user = $this->findById($id);
        $user->update(['password' => $passwordHash]);
        return $user->fresh();
    }

    public function updateRole(int $id, string $role): User
    {
        $user = $this->findById($id);
        $user->update(['role' => $role]);
        return $user->fresh();
    }

    public function delete(int $id): bool
    {
        return User::destroy($id) > 0;
    }
}
