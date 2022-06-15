@extends('layouts.app')

@if (count(Session::get('ListModule')) !== 0)

    @section('content')
        <form action="/changeMajor" method="POST" class="mb-5">
            @csrf
            <h4 class="text-white">Pilih jurusan Kamu</h4>
            <select class="form-select" name="major" aria-label="Major Select" onchange="this.form.submit()">
                @foreach ($MajorList as $major)
                    <option value="{{ $major->MajorID }}"
                        {{ Session::get('Major') && Session::get('Major') == $major->MajorID ? 'selected' : '' }}>
                        {{ $major->MajorName }}
                    </option>
                @endforeach
            </select>
        </form>
        <div class="">
            <ul class="nav nav-tabs" id="semesterTab" role="tablist">
                @foreach ($SmtList as $Smt)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}" type="button"
                            role="tab" aria-controls="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                            aria-selected="true">{{ $loop->first ? $Smt->SmtName : str_replace('Semester ', '', $Smt->SmtName) }}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="semesterTabContent">
                @foreach ($SmtList as $Smt)
                    <div class="tab-pane fade p-4 {{ $loop->first ? 'show active' : '' }}"
                        id="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}" role="tabpanel"
                        aria-labelledby="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($MajorCourseList as $MajorCourse)
                                @if ($MajorCourse->SmtID == $Smt->SmtID)
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ $MajorCourse->CourseImage }}" class="card-img-top" alt="...">
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

@endif
