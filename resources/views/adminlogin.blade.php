@extends('layouts.app')

@section('content')
    @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card p-5">
        <form action="/admin" method="POST">
            @csrf
            <div class="mb-3">
                <label for="Password" class="form-label">Binusian ID</label>
                <select class="form-select" aria-label="Default select example" name="BinusianID">
                    @foreach ($BinusianList as $data)
                        <option value=" {{ $data->BinusianID }}">{{ $data->BinusianName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" aria-describedby="emailHelp" name="Password"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
