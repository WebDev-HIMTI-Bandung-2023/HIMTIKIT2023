@extends('layouts.app')

@if (count(Session::get('ListModule')) !== 0)

    @section('content')
        @if (isset($MajorList))
            <form action="/changeMajor" method="POST" class="mb-5">
                @csrf
                <h4 class="text-white">Choose Your Major</h4>
                <select class="form-select" name="major" aria-label="Major Select" onchange="this.form.submit()">
                    @foreach ($MajorList as $major)
                        <option value="{{ $major->MajorID }}"
                            {{ Session::get('Major') && Session::get('Major') == $major->MajorID ? 'selected' : '' }}>
                            {{ $major->MajorName }}
                        </option>
                    @endforeach
                </select>
            </form>
        @endif
        @if (isset($SmtList))
            <div class="responsive-tabs">
                <ul class="nav nav-tabs" id="semesterTab" role="tablist">
                    @foreach ($SmtList as $Smt)
                        <li class="nav-item">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="home-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                                type="button" role="tab"
                                aria-controls="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                                aria-selected="true">{{ $loop->first ? $Smt->SmtName : str_replace('Semester ', '', $Smt->SmtName) }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="semesterTabContent">
                    @foreach ($SmtList as $Smt)
                        <div class="card tab-pane fade p-4 {{ $loop->first ? 'show active' : '' }}"
                            id="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}" role="tabpanel"
                            aria-labelledby="semester-{{ str_replace('Semester ', '', $Smt->SmtName) }}-tab">
                            <h5 class="collapsible_group mb-0">
                                <a data-bs-toggle="collapse"
                                    href="#collapse-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                                    aria-expanded="true"
                                    aria-controls="collapse-{{ str_replace('Semester ', '', $Smt->SmtName) }}">
                                    {{ $Smt->SmtName }}
                                </a>
                            </h5>
                            <div id="collapse-{{ str_replace('Semester ', '', $Smt->SmtName) }}"
                                class="collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#content"
                                role="tabpanel"
                                aria-labelledby="heading-{{ str_replace('Semester ', '', $Smt->SmtName) }}">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                    @foreach ($MajorCourseList as $MajorCourse)
                                        @if ($MajorCourse->SmtID == $Smt->SmtID)
                                            <div class="col">
                                                <div class="card">
                                                    <img src="{{ $MajorCourse->CourseImage }}" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold">{{ $MajorCourse->CourseName }}
                                                        </h5>
                                                        <p class="card-text">{{ $MajorCourse->CourseDescription }}</p>
                                                        <button type="button" href="#"
                                                            class="btn btn-primary float-right bg-white" data-toggle="modal"
                                                            data-target="#download-{{ $MajorCourse->CourseID }}">Download</button>
                                                        <div class="modal fade"
                                                            id="download-{{ $MajorCourse->CourseID }}" tabindex="-1"
                                                            role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document"
                                                                style="background-color: #015791">
                                                                <div class="modal-content"
                                                                    style="background-color: #015791">
                                                                    <div class="modal-body" style="color: white"
                                                                        class="d-flex" style="text-center">
                                                                        <div class="text-center h3">Are you sure want to
                                                                            download
                                                                            the file?</div>
                                                                        <div class="text-center h5">
                                                                            {{ str_replace('public/files/', '', $MajorCourse->FileName) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer"
                                                                        style="justify-content: center !important">
                                                                        <button type="button" class="btn btn-secondary h3"
                                                                            data-dismiss="modal"
                                                                            style="font-weight: bold; margin: 1vw; color: black; background-color: #E8F1F5;">NO</button>
                                                                        <button type="button" type="_blank"
                                                                            class="btn btn-primary h3" data-dismiss="modal"
                                                                            style="font-weight: bold; margin: 1vw; color: black; background-color: #E8F1F5;"
                                                                            onclick="window.open('download/{{ $MajorCourse->CourseID }}', '_blank')">YES</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
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
