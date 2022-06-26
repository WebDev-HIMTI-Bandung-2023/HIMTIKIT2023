@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($SoftwareList as $Software)
                <div class="col">
                    <div class="card rounded-3 shadow-lg" style="background-color: #E8F1F5">
                        <div class="d-flex justify-content-center align-items-center p-3">
                            <img src="{{ $Software->SoftwareImage }}" width="120px" height="120px"
                                alt="{{ $Software->SoftwareName }}">
                        </div>
                        <div class="card-body text-white" style="background-color: #015791">
                            <h5 class="card-title fw-bold">{{ $Software->SoftwareName }}</h5>
                            <p class="card-text">{{ $Software->SoftwareDescription }}</p>
                            <button type="button" href="#" class="btn float-right bg-white text-black"
                                data-toggle="modal" data-target="#download-{{ $Software->SoftwareID }}">Download</button>
                            <div class="modal fade" id="download-{{ $Software->SoftwareID }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog p-4 border-0" role="document" style="background-color: #015791; border-radius: 10px">
                                    <div class="modal-content border-0" style="background-color: #015791">
                                        <div class="modal-body border-0 pb-3" style="color: white" class="d-flex" style="text-center">
                                            <div class="text-center h4">Are you sure want to download the file?</div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0" style="justify-content: center !important">
                                            <button type="button" class="btn btn-secondary h3" data-dismiss="modal"
                                                style="font-weight: 800; padding: 10px 20px; margin: 1vw; color: black; background-color: #E8F1F5; border-radius: 15px;">NO</button>
                                            <button type="button" class="btn btn-primary h3" data-dismiss="modal"
                                                style="font-weight: 800; padding: 10px 20px; margin: 1vw; color: black; background-color: #E8F1F5; border-radius: 15px;"
                                                onclick="window.open('{{ $Software->SoftwareUrl }}', '_blank')">YES</button>
                                            <div>*After clicking yes, you will be redirected to the link</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
