<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DiscountService;
use App\Http\Requests\StoreDiscountRequest;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function index()
    {
        $discounts = $this->discountService->listDiscounts();
        return view('admin.discounts.index', compact('discounts'));
    }
    public function create()
    {
        return view('admin.discounts.create');
    }

    public function store(StoreDiscountRequest $request)
    {
        // Data is already validated by StoreDiscountRequest
        $this->discountService->createDiscount($request->validated());

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Discount coupon created successfully!');
    }

    public function update(Request $request, $id)
    {
        // For a quick update (like value or expiry), we pass data to service
        $this->discountService->updateDiscount($id, $request->all());

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Discount updated successfully!');
    }

    public function toggle($id)
    {
        $status = $this->discountService->deactivateDiscount($id);
        
        $message = $status ? 'Discount activated!' : 'Discount deactivated!';
        
        return redirect()->route('admin.discounts.index')
            ->with('success', $message);
    }

    public function destroy($id)
    {
        // Usually, we prefer deactivating, but if you need a hard delete:
        // $this->discountService->deleteDiscount($id);
        return redirect()->route('admin.discounts.index')
            ->with('success', 'Discount deleted.');
    }
}