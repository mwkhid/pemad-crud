@extends('admin.layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Buat Pekerjaan</h1>
                    <form action="{{ route('jobs.store') }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="title">Tipe Pekerjaan</label>
                            <select name="types_id" required class="form-control mt-1">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->nama }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group mt-1">
                            <label for="nama">Pekerjaan</label>
                            <input type="text" class="form-control mt-1" name="nama" value="">
                        </div>
                        <div class="form-group mt-1">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control mt-1" name="deskripsi" value="">
                        </div>
                        <div class="form-group mt-1">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control mt-1" name="harga" value="">
                        </div>
                        <button type="submit" class="btn btn-info mt-3">
                            Buat Pekerjaan
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
