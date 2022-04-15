@extends('layouts.app')

@section('content')
    <style>
        .file-upload {
            background-color: #ffffff;
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #1FB264;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #15824B;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #1AA059;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #1FB264;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #1FB264;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #15824B;
            padding: 60px 0;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }

    </style>
    <form action="/UploadData" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="BinusianID" class="form-label">Binusian ID</label>
            <p type="text" class="form-control" id="BinusianID" aria-describedby="emailHelp" name="BinusianID"
                value="{{$Binusian->BinusianID}}">{{ $Binusian->BinusianName }}</p>
        </div>
        <div class="mb-3">
            <label for="Course" class="form-label">Course</label>
            <input type="text" class="form-control" id="Course" aria-describedby="Course" name="Course">
            {{-- <select class="form-select" aria-label="Default select example" name="Course">
                @foreach ($Course as $data)
                    <option value=" {{ $data->CourseID }}">{{ $data->CourseName }}</option>
                @endforeach
            </select> --}}
        </div>
        <div class="mb-3">
            <p for="Course" class="form-label">Description</p>
            <textarea class="w-100"></textarea>
        </div>
        <div id="ContainerForm">
            <div class="card mb-3">
                <div class="row g-0 ">
                    <div class="col-md-6 p-3">
                        <label for="Major" class="form-label">Major</label>
                        <select class="form-select" aria-label="Default select example" name="Major_0">
                            @foreach ($Major as $data)
                                <option value=" {{ $data->MajorID }}">{{ $data->MajorName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-3">
                        <label for="Semester" class="form-label">Semester</label>
                        <select class="form-select" aria-label="Default select example" name="Semester_0">
                            @foreach ($smt as $data)
                                <option value=" {{ $data->SmtID }}">{{ $data->SmtName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <a onclick="AddRow()" class="btn btn-primary mb-3">Add Row</a>
        <div class="mb-3">

            <p for="Major" class="form-label">Upload File<br></p>
            <input type="file" name="UploadFile" id="UploadFile">
        </div>
        <input type="hidden" name="NumberRow" value="0" id="NumberRow">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        var count = 1;

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
                        '">'+
                            '@foreach ($Major as $data)'+
                                '<option value=" {{ $data->MajorID }}">{{ $data->MajorName }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-6 p-3">'+
                        '<label for="Semester" class="form-label">Semester</label>'+
                        '<select class="form-select" aria-label="Default select example" name="Semester_' + 
                        count +
                        '">'+
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
