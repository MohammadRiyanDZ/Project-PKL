@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="card"
            style="
    margin-top: 70px; 
    padding: 20px;
    box-shadow: 2px 4px 2px 1px rgba(0, 0, 0, 0.1);
    ">
            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('deleted'))
                <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
            @endif

            <div class="d-flex">
                <div class="p-2">
                    <a href="{{ route('late.create') }}" class="btn btn-primary">Tambah</a>
                    <a href="{{ route('late.exportExcel') }}" class="btn btn-info " style="color: white;">Export Data Keterlambatan</a>
                </div>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <ul class="nav nav-tabs" style="margin-top: 10px">
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="{{ route('late.home') }}">Keseluruhan
                                    Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('late.data') }}">Rekapitulasi Data
                                </a>
                            </li>
                        </ul>
                    </tr>
                    <table class="table ">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Informasi</th>
                        </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($lates as $late)
                        <tr class="text-center">
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $late->student->nis }}
                                <br>
                                {{ $late->student->name }}
                            </td>
                            <td>{{ $late->date_time_late }}</td>
                            <td>{{ $late->information }}</td>
                            <td>
                                <form action="{{ route('late.delete', $late->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah anda yakin ingin menghapus Data?');">
                                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                    focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        href="{{ route('late.edit', $late->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
