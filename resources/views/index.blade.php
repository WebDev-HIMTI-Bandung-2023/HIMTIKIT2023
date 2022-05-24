@extends('layouts.app')

@section('content')
    <form action="/changeMajor" method="POST" class="mb-5">
        @csrf
        <h4 class="text-white">Pilih jurusan Kamu</h4>
        <select class="form-select" aria-label="Default select example">
            <option selected>Cyber Security</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </form>
    <div class="">
        <ul class="nav nav-tabs" id="semesterTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#semester-1" type="button"
                    role="tab" aria-controls="semester-1" aria-selected="true">Semester 1</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#semester-2"
                    type="button" role="tab" aria-controls="semester-2" aria-selected="false">2</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#semester-3"
                    type="button" role="tab" aria-controls="semester-3" aria-selected="false">3</button>
            </li>
        </ul>
        <div class="tab-content" id="semesterTabContent">
            <div class="tab-pane fade show active p-4" id="semester-1" role="tabpanel" aria-labelledby="semester-1-tab">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="semester-2" role="tabpanel" aria-labelledby="semester-2-tab">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="semester-3" role="tabpanel" aria-labelledby="semester-3-tab">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="./img/bg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Algorithm & Programming</h5>
                                <p class="card-text">Data structure basic concept in which it will be frequently used
                                    in software engineering and programming practices.</p>
                                <a href="#" class="btn btn-primary float-right">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var tabEl = document.querySelectorAll('button[data-bs-toggle="tab"]')
        for (let i = 0; i < tabEl.length; i++) {
            tabEl[i].addEventListener('show.bs.tab', function(event) {
                tabEl[i].innerText = "Semester " + (i + 1)
                event.relatedTarget.innerText = event.relatedTarget.innerText.replace('Semester', '')
            })
        }
    </script>
@endsection
