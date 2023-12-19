<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\References;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data pada db
        $item = References::firstWhere('id', '1');
        return view('admin.references.index', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke page create
        return view('admin.references.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memasukkan data ke db
        $data = $request->except('_method', '_token');
        References::create($data);
        return redirect()->route('references.index');
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
        // mengarahkan ke halaman edit
        $item = References::findOrFail($id);

        return view('admin.references.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // request data
        $data = $request->except('_method', '_token');
        $item = References::findOrFail($id);
        // melakukan update pada db
        $item->update($data);
        return redirect()->route('references.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus data berdasarkan id
        $item = References::findOrFail($id);
        $item->delete();

        return redirect()->route('references.index');
    }
}
