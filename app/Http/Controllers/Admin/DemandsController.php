<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Demands;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data dari database demands
        $items = Demands::with('users', 'offers', 'jobs', 'languages')->get();
        return view('admin.demands.index', [
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
    public function store(Request $request)
    {
        //memasukkan data dari offers ke dalam db demands
        //dilakukan klien ketika klik tommbol buat penawaran
        $user_id = Auth::user()->id;
        $data = $request->only('offers_id', 'jobs_id', 'tgl_start', 'tgl_end', 'lang_id');
        //mengubah status menjadi WAITING
        $data['status'] = 'WAITING';
        //menambahkan user_id pada db
        $data['users_id'] = $user_id;

        //membuat query ke db demands dan orders
        Demands::create($data);
        $demand = Demands::latest()->first(); //memanggil id demands untuk diteruskan ke db orders
        Orders::create([
            'demands_id' => $demand->id
        ]);
        return redirect()->route('orders.index');
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
        //mengubah status pada db demands dari WAITING menjadi OK
        //dilakukan oleh admin ketika klik tombol setuju
        $item = Demands::findOrFail($id);
        $item->update(['status' => 'OK']);
        return redirect()->route('demands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
