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
                                <a class="nav-link  " aria-current="page" href="{{ route('late.home') }}">Keseluruhan
                                    Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('late.data') }}">Rekapitulasi
                                    Data </a>
                            </li>
                        </ul>
                    </tr>
                    <table class="table ">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Jumlah Keterlambatan</th>
                        </tr>
                </thead>
                <tbody>
                <tbody>
                    @php
                        $no = 0;
                        $uniqueNames = [];
                        $countNames = collect($lates)
                            ->groupBy('student.name')
                            ->map->count();
                    @endphp
                    @foreach ($lates as $late)
                        @if (!in_array($late->student->name, $uniqueNames))
                            @php $uniqueNames[] = $late->student->name; @endphp
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td class="text-center">{{ $late->student->nis }}</td>
                                <td class="text-center">{{ $late->student->name }}</td>
                                <td class="text-center">{{ $countNames[$late->student->name] }}</td>
                                <td>
                                    @if ($countNames[$late->student->name] >= 3)
                                        <form action="{{ route('late.cetak', ['id' => $late->id, 'count' => $countNames[$late->student->name]]) }}" method="get">
                                            <button type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                                data-bs-toggle><a
                                                    href="{{ route('late.rekap', ['name' => $late->student->id]) }}">Lihat</a></button>
                                            @csrf
                                            @method('get')
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a
                                                href="{{ route('late.cetak', ['id' => $late->id, 'count' => $countNames[$late->student->name]]) }}">Cetak Surat Pernyataan</a></button>
                                        </form>
                                    @else
                                        <button type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                            disabled><a
                                                href="{{ route('late.rekap', ['name' => $late->student->id]) }}">Lihat</a></button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
