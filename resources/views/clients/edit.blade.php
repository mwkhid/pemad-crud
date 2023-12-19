@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Edit Data Diri</h1>
                    <form action="{{ route('clients.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group mt-1">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control mt-1" name="name" value="{{ $item->users->name }}">
                        </div>
                        <div class="form-group mt-1">
                            <label for="email">Email</label>
                            <input type="text" class="form-control mt-1" name="email"
                                value="{{ $item->users->email }}">
                        </div>
                        <div class="form-group mt-1">
                            <label for="alamat">Email</label>
                            <input type="text" class="form-control mt-1" name="alamat" value="{{ $item->alamat }}">
                        </div>
                        <div class="form-group mt-1">
                            <label for="nomor">No. Telepon</label>
                            <input type="number" class="form-control mt-1" name="telepon" value="{{ $item->telepon }}">
                        </div>
                        <button type="submit" class="btn btn-info mt-3">
                            Ubah Data
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
