@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Buat Penawaran</h1>
                    <form action="{{ route('demands.store') }}" method="post">
                        @csrf
                        <input type="hidden" class="form-control mt-1" name="offers_id" value="{{ $item->id }}" readonly>

                        <input type="hidden" class="form-control mt-1" name="jobs_id" value="{{ $item->jobs->id }}"
                            readonly>

                        <div class="form-group mt-1">
                            <label for="nama">Pekerjaan</label>
                            <input type="text" class="form-control mt-1" name="nama" value="{{ $item->jobs->nama }}"
                                readonly>
                        </div>
                        <div class="form-group mt-1">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control mt-1" name="deskripsi"
                                value="{{ $item->jobs->deskripsi }}" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label for="bahasa">Bahasa</label>
                            <select name="lang_id" required class="form-control mt-1">
                                @foreach ($langs as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->bahasa }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group mt-1">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control mt-1" name="harga" value="{{ $item->jobs->harga }}"
                                readonly>
                        </div>
                        <div class="form-group mt-1">
                            <label for="tgl_start">Tanggal Mulai</label>
                            <input type="date" class="form-control mt-1" name="tgl_start" value="">
                        </div>
                        <div class="form-group mt-1">
                            <label for="tgl_end">Tanggal Selesai</label>
                            <input type="date" class="form-control mt-1" name="tgl_end" value="">
                        </div>
                        <button type="submit" class="btn btn-info mt-3">
                            Buat Penawaran
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
