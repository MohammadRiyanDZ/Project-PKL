@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning"> {{ Session::get('deleted') }}</div>
    @endif

    <table class="table table-striped table-bordered table-hover my-3">
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('student.create') }}">Tambah</a>
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($student as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['nis'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ ($item->rombelid)->rombel }}</td>
                    <td>{{ ($item->rayonid)->rayon }}</td>
                    <td class="d-flex justify-content-center">
                        
                        <a href="{{ route('student.edit', $item['id']) }}" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>

                        <form action="{{ route('student.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
