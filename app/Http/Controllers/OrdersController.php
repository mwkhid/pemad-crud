<?php

namespace App\Http\Controllers;

use App\Models\Admin\Demands;
use App\Models\Admin\Projects;
use App\Models\Bills;
use App\Models\Orders;
use App\Models\Payments;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data pada db demands
        $items = Orders::with('demands')->get();
        return view('orders.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {

        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //melakukan update ketika klien klik Bayar
        $order = Orders::findOrFail($id);
        //membuat nomer transaksi dengan format Tahun-Bulan-Tanggal-Order_id
        $date = date('Ymd');
        $idOrder = $order->id;
        $noTransaksi = $date . $idOrder;
        //membuat query untuk dimasukkan ke db Bills
        Bills::create([
            'orders_id' => $idOrder,
            'no_transaksi' => $noTransaksi
        ]);
        $bills = Bills::latest()->first(); //mengambil id bills untuk diteruskan ke db payments
        //melakukan query memasukkan data ke db payments
        Payments::create([
            'bills_id' => $bills->id
        ]);
        //melakukan query untuk memasukkan ke db projects
        Projects::create([
            'bills_id' => $bills->id
        ]);
        //mengupdate status dari OK menjadi DIPROSES
        $demand = Demands::findOrFail($order->demands_id);
        $demand->update(['status' => 'DIPROSES']);

        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
