<?php
namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Support\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    private function fakeOrder(): array
    {
        return [
            ['id' => 1, 'user_id' => ,  'email' => , 'shipped_to' => ,'status' => ,'total_price' => ,'ordered_at' => ,  'updated_at' => '2024-01-03 00:00:00'],
        ];
    }

  public function findById(int $id): Order
    {
        $item = collect($this->fakeOrder())->firstWhere('id', $id);
        return Order::make($item);
    }

    public function findByUserId(int $userId): Collection
    {
        return collect($this->fakeOrder())
            ->where('user_id', $userId)
            ->map(fn($item) => Order::make($item))
            ->values();
    }

    public function findByEmail(string $email): Collection
    {
        return collect($this->fakeOrder())
            ->where('email', $email)
            ->map(fn($item) => Order::make($item))
            ->values();
    }

    public function findByStatus(string $status): Collection
    {
        return collect($this->fakeOrder())
            ->where('status', $status)
            ->map(fn($item) => Order::make($item))
            ->values();
    }

    public function getAll(): Collection
    {
        return collect($this->fakeOrder())
            ->map(fn($item) => Order::make($item));
    }

    public function create(array $data): Order
    {
        return Order::make($data);
    }

    public function update(int $id, array $data): Order
    {
        $items = collect($this->fakeOrder())
            ->map(fn($item) => $item['id'] === $id ? array_merge($item, $data) : $item);
        return Order::make($items->firstWhere('id', $id));
    }

    public function updateStatus(int $id, string $status): Order
    {
        return $this->update($id, ['status' => $status]);
    }

    public function delete(int $id): bool
    {
        return collect($this->fakeOrder())->contains('id', $id);
    }
}

