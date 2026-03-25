<?php
namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    private function fakeUsers(): array
    {
        return [
            [
                'id'                => 1,
                'first_name'        => 'Juan',
                'last_name'         => 'Dela Cruz',
                'email_account'     => 'juan@example.com',
                'password_hash'     => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'instagram_account' => '@juandelacruz',
                'address'           => 'Bacolod City, Negros Occidental',
                'role'              => 'customer',
                'created_at'        => '2024-01-01 00:00:00',
            ],
        ];
    }

    public function findById(int $id): User
    {
        $item = collect($this->fakeUsers())->firstWhere('id', $id);
        return new User($item);
    }

    public function findByEmail(string $email): User
    {
        $item = collect($this->fakeUsers())->firstWhere('email_account', $email);
        return new User($item);
    }

    public function findByInstagram(string $instagramAccount): User
    {
        $item = collect($this->fakeUsers())->firstWhere('instagram_account', $instagramAccount);
        return new User($item);
    }

    public function findByRole(string $role): Collection
    {
        return collect($this->fakeUsers())
            ->where('role', $role)
            ->map(fn($item) => new User($item))
            ->values();
    }

    public function getAll(): Collection
    {
        return collect($this->fakeUsers())
            ->map(fn($item) => new User($item));
    }

    public function create(array $data): User
    {
        return new User($data);
    }

    public function update(int $id, array $data): User
    {
        $item = collect($this->fakeUsers())->firstWhere('id', $id);
        return new User(array_merge($item, $data));
    }

    public function updatePassword(int $id, string $passwordHash): User
    {
        $item = collect($this->fakeUsers())->firstWhere('id', $id);
        return new User(array_merge($item, ['password_hash' => $passwordHash]));
    }

    public function updateRole(int $id, string $role): User
    {
        $item = collect($this->fakeUsers())->firstWhere('id', $id);
        return new User(array_merge($item, ['role' => $role]));
    }

    public function delete(int $id): bool
    {
        return true;
    }
}
