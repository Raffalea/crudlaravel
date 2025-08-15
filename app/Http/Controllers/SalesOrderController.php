<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $salesOrders = SalesOrder::with('items')->get();
        return view('Sales-order.index', compact('salesOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all(); // Assuming you have a Product model
        return view('Sales-order.create', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'number' => 'required|unique:sales_orders',
            'date' => 'required|date',
            'customer' => 'required|string',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $salesOrder = SalesOrder::create([
            'number' => $request->number,
            'date' => $request->date,
            'customer' => $request->customer,
        ]);

        foreach ($request->items as $item) {
            $salesOrder->items()->create([
                'sales_order_id' => $salesOrder->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return redirect()->route('Sales-order.index')->with('success', 'Sales Order berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $salesOrder = SalesOrder::with('items.product')->findOrFail($id);
        return view('Sales-order.show', compact('salesOrder')); // Assuming you have a view for showing sales order details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $salesOrder = SalesOrder::with('items')->findOrFail($id);
        $products = Product::all(); // Assuming you have a Product model
        return view('Sales-order.edit', compact('salesOrder', 'products')); // Assuming you have a view for editing sales order
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $salesOrder = SalesOrder::findOrFail($id);

        $request->validate([
            'number' => 'required|unique:sales_orders,number,' . $salesOrder->id,
            'date' => 'required|date',
            'customer' => 'required|string',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $salesOrder->update([
            'number' => $request->number,
            'date' => $request->date,
            'customer' => $request->customer,
        ]);

        // Update items logic can be added here if needed

        return redirect()->route('Sales-order.index')->with('success', 'Sales Order berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $salesOrder = SalesOrder::findOrFail($id);
        $salesOrder->delete();

        return redirect()->route('Sales-order.index')->with('success', 'Sales Order berhasil dihapus.');
    }
}
