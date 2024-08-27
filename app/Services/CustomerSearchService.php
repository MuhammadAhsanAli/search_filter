<?php
namespace App\Services;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CustomerSearchService
{
    /**
     * Search customers based on email, order number, or item name.
     *
     * @param string|null $email
     * @param string|null $orderNumber
     * @param string|null $itemName
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(?string $email, ?string $orderNumber, ?string $itemName, int $perPage = 15): LengthAwarePaginator
    {
        $query = Customer::query()
            ->select(['id', 'email'])
            ->when($email, function ($query) use ($email) {
                $query->where('email', $email);
            })
            ->when($orderNumber, function ($query) use ($orderNumber) {
                $query->whereHas('orders', function ($query) use ($orderNumber) {
                    $query->where('order_number', $orderNumber);
                });
            })
            ->when($itemName, function ($query) use ($itemName) {
                $query->whereHas('orders', function ($query) use ($itemName) {
                    $query->whereHas('items', function ($query) use ($itemName) {
                        $query->where('name', 'like', '%' . $itemName . '%');
                    });
                });
            })
            ->with(['orders' => function ($query) use ($orderNumber, $itemName) {
                $query->select(['id', 'customer_id', 'order_number'])
                    ->when($orderNumber, function ($query) use ($orderNumber) {
                        $query->where('order_number', $orderNumber);
                    })
                    ->when($itemName, function ($query) use ($itemName) {
                        $query->whereHas('items', function ($query) use ($itemName) {
                            $query->where('name', 'like', '%' . $itemName . '%');
                        });
                    })
                    ->with(['items' => function ($query) use ($itemName) {
                        $query->select(['id', 'order_id', 'name'])
                            ->when($itemName, function ($query) use ($itemName) {
                                $query->where('name', 'like', '%' . $itemName . '%');
                            });
                    }]);
            }]);

        return $query->paginate($perPage);
    }
}
