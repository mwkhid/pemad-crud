@extends('admin.layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Edit Pekerjaan</h1>
                    <form action="{{ route('types.update', $item->id) }}" method="post">
                        @method('PUT')

                        @csrf
                        <div class="form-group mt-1">
                            <label for="nama">Tipe Pekerjaan</label>
                            <input type="text" class="form-control mt-1" name="nama" value="{{ $item->nama }}">
                        </div>
                        <div class="form-group mt-1">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control mt-1" name="deskripsi" value="{{ $item->deskripsi }}">
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
