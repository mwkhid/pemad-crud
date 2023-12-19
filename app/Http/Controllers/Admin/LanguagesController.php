<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data dari db
        $items = Languages::get();
        return view('admin.languages.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke page create
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memasukkan data ke db
        $data = $request->except('_method', '_token');
        Languages::create($data);
        return redirect()->route('languages.index');
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
        $item = Languages::findOrFail($id);

        return view('admin.languages.edit', [
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
        $item = Languages::findOrFail($id);
        // melakukan update pada db
        $item->update($data);
        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus data berdasarkan id
        $item = Languages::findOrFail($id);
        $item->delete();

        return redirect()->route('languages.index');
    }
}
