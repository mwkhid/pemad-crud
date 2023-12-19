@extends('admin.layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
                <div class="p-6 text-gray-900">
                    <h1 class="h3 mb-0 text-gray-800 text-center">Data Perusahaan</h1>
                    <table class="table table-bordered mt-2" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Nama</th>
                                <td class="align-baseline">{{ $item->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td class="align-baseline">{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td class="align-baseline">{{ $item->bank }}</td>
                            </tr>
                            <tr>
                                <th>Rekening</th>
                                <td class="align-baseline">{{ $item->rekening }}</td>
                            </tr>
                        </thead>
                    </table>
                    <a href="{{ route('references.edit', $item->id) }}" class="btn btn-warning btn-sm"
                        data-bs-toggle="tooltip" title="Edit">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
