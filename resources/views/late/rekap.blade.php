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
                    <a href="{{ route('late.data') }}" class="btn btn-primary">Back</a>
                </div>
            </div>

            <div class="row">
                @foreach ($lates as $late)
                    <div class="col-md-4">
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-3">
                            <div class="p-3">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-600">
                                    {{ $late->student->name }} - Keterlambatan {{ $loop->iteration }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $late->date_time_late }}
                                </p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $late->information }}
                                </p>
                                <img src="{{ Storage::url('public/bukti_keterlambatan/' . $late->bukti) }}"
                                    alt="Bukti Keterlambatan" class="img-fluid">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
