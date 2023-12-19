<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data
        $items = Types::get();
        return view('admin.types.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke halaman buat tipe
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //memasukkan data yang sudah dibuat
        $data = $request->except('_method', '_token');
        Types::create($data);
        return redirect()->route('types.index');
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
        //mengarahkan ke halaman edit tipe
        $item = Types::findOrFail($id);

        return view('admin.types.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data dan dimasukkan ke db
        $data = $request->except('_method', '_token');
        $item = Types::findOrFail($id);
        $item->update($data);
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data berdasarkan id
        $item = Types::findOrFail($id);
        $item->delete();

        return redirect()->route('types.index');
    }
}
