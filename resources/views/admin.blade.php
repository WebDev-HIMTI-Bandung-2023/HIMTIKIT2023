@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex">
                <p>Binusian ID : {{ $Binusian->BinusianName }}</p>
            </div>
            <a href="/admin/0/add" class="btn btn-success">Add Course</a>
            <a href="/ChangeBinusian" class="btn btn-danger">Change Binusian</a>
        </div>
    </div>
    @foreach ($Datas as $Data)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="{{ $Data->CourseImage }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title">{{ $Data->CourseName }}</h5>
                        <p class="card-text">{{ $Data->CourseDescription }}</p>
                        <div>
                            <a href="/admin/{{ $Data->CourseID }}/edit" class="btn btn-warning">Edit</a>
                            <a href="/admin/{{ $Data->CourseID }}/delete" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
