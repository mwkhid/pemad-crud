@extends('admin.layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Tabel Pekerjaan</h1>
                    <a href="{{ route('jobs.create') }}" class="btn btn-info btn-sm mt-1"> Tambah Pekerjaan</a>
                    <table class="table table-bordered mt-2" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Tipe Pekerjaan</th>
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
                                    <td class="align-baseline">{{ $item->types->nama }}</td>
                                    <td class="align-baseline">{{ $item->nama }}</td>
                                    <td class="align-baseline">{{ $item->deskripsi }}</td>
                                    <td class="align-baseline text-center">@currency($item->harga)</td>
                                    <td class="align-baseline text-center">
                                        <a href="{{ route('jobs.edit', $item->id) }}" class="btn btn-warning btn-sm"
                                            data-bs-toggle="tooltip" title="Edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('jobs.destroy', $item->id) }}" class="d-inline"
                                            method="post" data-bs-toggle="tooltip" title="Delete">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>

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
