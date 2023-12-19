@extends('admin.layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">List Proyek</h1>
                    <table class="table table-bordered mt-2" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nomor Transaksi</th>
                                <th>Tipe</th>
                                <th>Pekerjaan</th>
                                <th>Tanggal Pembayaran</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td class="align-baseline text-center">{{ $loop->iteration }}</td>
                                    <td class="align-baseline">{{ $item->bills->orders->demands->users->name }}
                                    </td>
                                    <td class="align-baseline text-center">{{ $item->bills->no_transaksi }}</td>
                                    <td class="align-baseline">{{ $item->bills->orders->demands->jobs->types->nama }}</td>
                                    <td class="align-baseline">{{ $item->bills->orders->demands->jobs->nama }}</td>
                                    <td class="align-baseline text-center">{{ $item->bills->created_at }}</td>
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
