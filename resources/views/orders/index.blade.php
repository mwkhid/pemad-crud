@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Tabel Permintaan</h1>
                    <table class="table table-bordered mt-2" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Tipe Pekerjaan</th>
                                <th>Pekerjaan</th>
                                <th>Bahasa</th>
                                <th>Harga</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td class="align-baseline text-center">{{ $loop->iteration }}</td>
                                    <td class="align-baseline">{{ $item->demands->jobs->types->nama }}</td>
                                    <td class="align-baseline">{{ $item->demands->jobs->nama }}</td>
                                    <td class="align-baseline">{{ $item->demands->languages->bahasa }}</td>
                                    <td class="align-baseline text-center">@currency($item->demands->jobs->harga)</td>
                                    <td class="align-baseline text-center">{{ $item->demands->tgl_start }}</td>
                                    <td class="align-baseline text-center">{{ $item->demands->tgl_end }}</td>
                                    <td class="align-baseline text-center">

                                        @if ($item->demands->status == 'OK')
                                            <a href="{{ route('orders.update', $item->id) }}" class="btn btn-warning btn-sm"
                                                data-bs-toggle="tooltip" title="bayar">
                                                Bayar
                                            </a>
                                        @else
                                            {{ $item->demands->status }}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Anda Belum Memilih Penawaran
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
