@extends('layouts.template')

@section('content')
    <form action="{{ route('late.store') }}" method="POST" class="card p-5" enctype="multipart/form-data">
        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Siswa :</label>
            <div class="col-sm-10">
                <select class="form-select" id="name" name="name" required>
                    <option selected disabled hidden>Pilih Siswa</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal Keterlambatan :</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late" required>
            </div>
        </div>


        <div class="mb-3 row">
            <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="information" name="information" rows="3" required></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Bukti Keterlambatan :</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
