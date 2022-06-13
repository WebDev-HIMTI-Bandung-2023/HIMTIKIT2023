@extends('layouts.app')

@section('content')
    <form action="/changeMajor" method="POST" class="mb-5">
        @csrf
        <h4 class="text-white">Pilih jurusan Kamu</h4>
        <select class="form-select" name="major" aria-label="Major Select" onchange="this.form.submit()">
            <option>Select Major</option>
            @foreach ($MajorList as $major)
                <option value="{{ $major->MajorID }}">{{ $major->MajorName }}</option>
            @endforeach
        </select>
    </form>
    <div class="">
        <ul class="nav nav-tabs" id="semesterTab" role="tablist">
            @php
                $SmtCount = 0;
            @endphp
            @foreach ($SmtList as $Smt)
                @if ($SmtCount++ == 0)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}" type="button"
                            role="tab" aria-controls="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                            aria-selected="true">{{ $Smt->SmtName }}</button>
                    </li>
                @else
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}" type="button"
                            role="tab" aria-controls="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                            aria-selected="true">{{ str_replace('Semester ', '', $Smt->SmtName) }}</button>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="tab-content" id="semesterTabContent">
            @php
                $SmtCount = 0;
            @endphp
            @foreach ($MajorCourseList as $MajorCourse)
                @if ($SmtCount++ == 0)
                    <div class="tab-pane fade show active p-4"
                        id="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}" role="tabpanel"
                        aria-labelledby="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @if ($MajorCourse->SmtID == 1)
                                <div class="col">
                                    <div class="card">
                                        <img src="./public/storage/files/{{ $MajorCourse->CourseImage }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $MajorCourse->CourseName }}</h5>
                                            <p class="card-text">{{ $MajorCourse->CourseDescription }}</p>
                                            <a href="#" class="btn btn-primary float-right">Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="tab-pane fade p-4" id="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                        role="tabpanel" aria-labelledby="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($MajorCourseList as $MajorCourse)
                                @if ($MajorCourse->SmtID == 2)
                                    <div class="col">
                                        <div class="card">
                                            <img src="./public/storage/files/{{ $MajorCourse->CourseImage }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $MajorCourse->CourseName }}</h5>
                                                <p class="card-text">{{ $MajorCourse->CourseDescription }}</p>
                                                <a href="#" class="btn btn-primary float-right">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script>
        const tabEl = document.querySelectorAll('button[data-bs-toggle="tab"]')
        for (let i = 0; i < tabEl.length; i++) {
            tabEl[i].addEventListener('show.bs.tab', function(event) {
                tabEl[i].innerText = "Semester " + (i + 1)
                event.relatedTarget.innerText = event.relatedTarget.innerText.replace('Semester', '')
            })
        }
    </script>
@endsection
