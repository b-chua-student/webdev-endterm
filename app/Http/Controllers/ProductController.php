<?php
namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductRepository $product) {}

    public function listing()
    {
        $products = $this->product->findByIsActive(true);
        return view('product-listing', compact('products'));
    }

    public function details(int $id)
    {
        $product = $this->product->findById($id);
        return view('product-details', compact('product'));
    }

    public function inventory()
    {
        $products = $this->product->getAll();
        return view('inventory', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|unique:products',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
            'is_active'   => 'boolean',
        ]);

        $product = $this->product->create($data);
        return redirect()->route('inventory');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name'  => 'string|max:255',
            'price' => 'numeric',
            'stock' => 'integer',
        ]);

        $product = $this->product->update($id, $data);
        return redirect()->route('product-details', $id);
    }

    public function destroy(int $id)
    {
        $this->product->delete($id);
        return redirect()->route('inventory');
    }
}
