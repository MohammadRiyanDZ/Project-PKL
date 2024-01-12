@extends('layouts.template')

@section('content')
    <form action="{{ route('student.store') }}" method="POST" class="card p-5">

        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">Nis :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nis" name="nis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel_id" class="col-sm-2 col-form-label">Rombel :</label>
            <div class="col-sm-10">
                <select class="form-select" id="rombel_id" name="rombel_id">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($rombels as $rombel)
                        <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon_id" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <select class="form-select" id="rayon_id" name="rayon_id">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($rayons as $rayon)
                        <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
