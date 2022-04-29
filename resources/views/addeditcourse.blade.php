@extends('layouts.app')

@section('content')
<script>var count = 0;</script>
    @if ($Type == 'edit')
        <form action="/admin/{{$Course->CourseID}}/{{ $Type }}" method="post" enctype="multipart/form-data">
    @else
        <form action="/admin/0/{{ $Type }}" method="post" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="mb-3">
            <label for="BinusianID" class="form-label">Binusian ID</label>
            <p type="text" class="form-control" id="BinusianID" aria-describedby="emailHelp" name="BinusianID"
                value="{{ $Binusian->BinusianID }}" value="{{ old('BinusianID') }}" required>{{ $Binusian->BinusianName }}</p>
        </div>
        <div class="mb-3">
            <label for="Course" class="form-label">Course</label>
            <input type="text" class="form-control" id="Course" aria-describedby="Course" name="Course"
                @if ($Type == 'edit') value="{{ $Course->CourseName }}" @endif value="{{ old('Course') }}"required>
        </div>
         <div class="mb-3">
            <label for="Image" class="form-label">Image</label>
            <input type="text" class="form-control" id="Image" aria-describedby="Image" name="Image"@if ($Type == 'edit') value="{{ $Course->CourseImage }}" @endif value="{{ old('Image') }}" required >
        </div>
        <div class="mb-3">
            <p for="Description" class="form-label">Description</p>
            <textarea class="w-100" name="Description" required> {{ old('Description') }}@if ($Type == 'edit'){{ $Course->CourseDescription }}@endif</textarea>
        </div>
        
        <div id="ContainerForm">
            @if($Type == 'edit')
                <?php $Counter = 0;?>
                @foreach ($Datas as $dataall)
                    <div class="card mb-3">
                        <div class="row g-0 ">
                            <div class="col-md-6 p-3">
                                <label for="Major" class="form-label">Major</label>
                                <select class="form-select" id="disabledSelect" aria-label="Default select example"  name="Major_{{$Counter}}" required>
                                    @foreach ($Major as $data)
                                        <option value=" {{ $data->MajorID }}" @if ($dataall->MajorID == $data->MajorID)
                                         selected   
                                        @endif>{{ $data->MajorName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="Semester" class="form-label">Semester</label>
                                <select class="form-select" aria-label="Default select example" name="Semester_{{$Counter}}" required >
                                    @foreach ($smt as $data)
                                        <option value=" {{ $data->SmtID }}" @if ($dataall->SmtID == $data->SmtID)
                                         selected   
                                        @endif>{{ $data->SmtName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <script>
                        count++;
                    </script>
                    <?php $Counter++;?>
                @endforeach
            @else
                <div class="card mb-3">
                    <div class="row g-0 ">
                        <div class="col-md-6 p-3">
                            <label for="Major" class="form-label">Major</label>
                            <select class="form-select" aria-label="Default select example" name="Major_0" required>
                                @foreach ($Major as $data)
                                    <option value=" {{ $data->MajorID }}">{{ $data->MajorName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 p-3">
                            <label for="Semester" class="form-label">Semester</label>
                            <select class="form-select" aria-label="Default select example" name="Semester_0" required>
                                @foreach ($smt as $data)
                                    <option value=" {{ $data->SmtID }}">{{ $data->SmtName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <script>
                    count++;
                </script>
            @endif
        </div>
        <a onclick="AddRow()" class="btn btn-primary mb-3"><i
                            class="fas fa-plus-circle fa-sm fa-fw mr-2 text-white-400"></i>Add Row</a>
        @if($Type == 'edit')
            <div class="mb-3" id="UploadFile">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">File Uploaded</h5>
                                <button type="Delete" class="btn btn-danger align-items-center" onclick="Delete()"><i
                            class="fas fa-trash-alt fa-sm fa-fw mr-2 text-white-400"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="File" value="Old" id="File">
        @else
            <div class="mb-3">
                <p for="UploadFile" class="form-label">Upload File<br></p>
                <input type="file" name="UploadFile" id="UploadFile" required>
            </div>
            <input type="hidden" name="File" value="New" id="File">
        @endif
        <input type="hidden" name="NumberRow" value="0" id="NumberRow">
        <button type="submit" class="btn btn-success mb-5"><i class="fas fa-save fa-sm fa-fw mr-2 text-white-400"></i>Save</button>
        
    </form>
    <script>
        document.getElementById("NumberRow").value = count-1;
        function Delete(){
            document.getElementById("UploadFile").innerHTML = '<p for="UploadFile" class="form-label">Upload File<br></p><input type="file" name="UploadFile" id="UploadFile">';
            document.getElementById("File").value = "Add";
        }
        function AddRow() {
            document.getElementById("ContainerForm").innerHTML += addNewRow(count);
            document.getElementById("NumberRow").value = count;
            count++;
        }
        function addNewRow(count) {
            var newrow = '<div class="card mb-3">'+
                '<div class="row g-0 ">'+
                    '<div class="col-md-6 p-3">'+
                        '<label for="Major" class="form-label">Major</label>'+
                        '<select class="form-select" aria-label="Default select example" name="Major_' 
                        + count +
                        '" required>'+
                            '@foreach ($Major as $data)'+
                                '<option value=" {{ $data->MajorID }}">{{ $data->MajorName }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-6 p-3">'+
                        '<label for="Semester" class="form-label">Semester</label>'+
                        '<select class="form-select" aria-label="Default select example" name="Semester_' + 
                        count +
                        '" required>'+
                            '@foreach ($smt as $data)'+
                                '<option value=" {{ $data->SmtID }}">{{ $data->SmtName }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</div>'+
                '</div>'+
            '</div>';
            return newrow;
        }
    </script>
@endsection
