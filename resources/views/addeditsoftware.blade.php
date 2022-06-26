@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $errors->first() }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="card mb-3">
        <div class="card-body">
            @if ($Type == 'edit')
                <form action="/adminsoftware/{{ $Software->SoftwareID }}/{{ $Type }}" method="post"
                    enctype="multipart/form-data">
                @else
                    <form action="/adminsoftware/0/{{ $Type }}" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="mb-3">
                <label for="BinusianID" class="form-label">Binusian ID</label>
                <p type="text" class="form-control" id="BinusianID" aria-describedby="emailHelp" name="BinusianID"
                    value="{{ $Binusian->BinusianID }}" value="{{ old('BinusianID') }}" required>
                    {{ $Binusian->BinusianName }}</p>
            </div>
            <div class="mb-3">
                <label for="Software" class="form-label">Software</label>
                <input type="text" class="form-control" id="Software"aria-describedby="Software" name="Software"
                    @if ($Type == 'edit') value="{{ $Software->SoftwareName }}" @endif
                    value="{{ old('Software') }}"required>
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">Image (1:1 Recommended)</label>
                <input type="text" class="form-control" id="Image" aria-describedby="Image" name="Image"
                    @if ($Type == 'edit') value="{{ $Software->SoftwareImage }}" @endif
                    value="{{ old('Software') }}" required>
            </div>
            <div class="mb-3">
                <p for="Description" class="form-label">Description</p>
                <textarea class="w-100" name="Description" required>{{ old('Description') }}@if ($Type == 'edit') {{ $Software->SoftwareDescription }} @endif</textarea>
            </div>
            <div class="mb-3">
                <label for="Course" class="form-label">Url</label>
                <input type="text" class="form-control" id="Url" aria-describedby="Url" name="Url"
                    @if ($Type == 'edit') value="{{ $Software->SoftwareUrl }}" @endif
                    value="{{ old('Software') }}" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save fa-sm fa-fw mr-2 text-white-400"></i>Save</button>
            </form>
        </div>
    </div>
@endsection
