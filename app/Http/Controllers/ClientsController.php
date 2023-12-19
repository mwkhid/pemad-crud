<?php

namespace App\Http\Controllers;

use App\Models\Admin\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data pada index
        $user_id = Auth::user()->id; // mengambil id user
        $item = Clients::firstWhere('user_id', $user_id); // mencari data pada db client dengan id user

        return view('clients.index', [
            'item' => $item
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
        //mengarahkan ke halaman edit
        $item = Clients::findOrFail($id); // mencari data berdasarkan $id

        return view('clients.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // mengambil data yang sudah di update pada form
        $data = $request->except('_method', '_token');
        $item = Clients::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);

        // update db clients
        $item->update([
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon']
        ]);

        //update db user
        $user->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
