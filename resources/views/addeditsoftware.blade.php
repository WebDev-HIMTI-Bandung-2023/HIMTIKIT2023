@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="BinusianID" class="form-label">Binusian ID</label>
                <p type="text" class="form-control" id="BinusianID" aria-describedby="emailHelp" name="BinusianID"
                    value="" value="" required>Test</p>
            </div>
            <div class="mb-3">
                <label for ="Software" class="form-label">Software</label>
                <input type = "text" class="form-control" id="Software"aria-describedby="Software" name="Software"
                value="" required>
            </div>
            <div class="mb-3">
                <label for="Course" class="form-label">Course</label>
                <input type="text" class="form-control" id="Course" aria-describedby="Course" name="Course"
                    value="" required>
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="text" class="form-control" id="Image" aria-describedby="Image" name="Image" required >
            </div>
            <div class="mb-3">
                <p for="Description" class="form-label">Description</p>
                <textarea class="w-100" name="Description" required> </textarea>
            </div>
        </div>
    </div>
@endsection