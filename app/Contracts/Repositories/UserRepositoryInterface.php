<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function findById(int $id): User;
    public function findByEmail(string $email): User;
    public function findByInstagram(string $instagramAccount): User;
    public function findByRole(string $role): Collection;
    public function getAll(): Collection;
    public function create(array $data): User;
    public function update(int $id, array $data): User;
    public function updatePassword(int $id, string $passwordHash): User;
    public function updateRole(int $id, string $role): User;
    public function delete(int $id): bool;
}

