<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Jobs;
use App\Models\Admin\Types;
use App\Models\Offers;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data dari db jobs
        $items = Jobs::with('types')->get();
        return view('admin.jobs.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan halaman atau form tambah pekerjaan
        $types = Types::get();
        return view('admin.jobs.create', [
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //memasukkan data yang sudah diisi ke db jobs dan offers
        $data = $request->except('_method', '_token');
        Jobs::create($data);
        $offer = Jobs::latest()->first(); //mengambil id pada jobs untuk diteruskan ke offers
        Offers::create([
            'job_id' => $offer->id
        ]);
        return redirect()->route('jobs.index');
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
        //menuju halaman atau form edit jobs
        $item = Jobs::findOrFail($id);
        $types = Types::all();

        return view('admin.jobs.edit', [
            'item' => $item,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //memasukkan atau update data pada db sesuai isi form
        $data = $request->except('_method', '_token');
        $item = Jobs::findOrFail($id);
        $item->update($data);
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data pada db jobs dan offers menggunakan parameter data id
        $item = Jobs::findOrFail($id);
        $item->delete();
        Offers::where('job_id', $id)->delete();

        return redirect()->route('jobs.index');
    }
}
