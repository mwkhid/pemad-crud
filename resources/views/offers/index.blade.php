@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">List Penawaran Jasa</h1>
                    <table class="table table-bordered mt-2" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Tipe</th>
                                <th>Pekerjaan</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td class="align-baseline text-center">{{ $loop->iteration }}</td>
                                    <td class="align-baseline">{{ $item->jobs->types->nama }}</td>
                                    <td class="align-baseline">{{ $item->jobs->nama }}</td>
                                    <td class="align-baseline">{{ $item->jobs->deskripsi }}</td>
                                    <td class="align-baseline text-center">@currency($item->jobs->harga)</td>
                                    <td class="align-baseline text-center">
                                        <a href="{{ route('offers.edit', $item->id) }}" class="btn btn-info btn-sm"
                                            data-bs-toggle="tooltip" title="Pilih">
                                            Pilih Jasa
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
