@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex">
                <p>Binusian ID : {{ $Binusian->BinusianName }}</p>
            </div>
            <a href="/admin/0/add" class="btn btn-success"><i
                    class="fas fa-plus-circle fa-sm fa-fw mr-2 text-white-400"></i>Add Course</a>
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger"> <i
                    class="fas fa-exchange-alt fa-sm fa-fw mr-2 text-white-400"></i>Change Binusian</a>
        </div>
    </div>
    @foreach ($Datas as $Data)
        <div class="CustomCard">
            <div class="CustomCardImage">
                <img src="{{ $Data->CourseImage }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="CustomCardText">
                <h5 class="card-title">{{ $Data->CourseName }}</h5>
                <p class="card-text">{{ $Data->CourseDescription }}</p>
                <div>
                    <a href="/admin/{{ $Data->CourseID }}/edit" class="btn btn-warning"><i
                            class="fas fa-edit fa-sm fa-fw mr-2 text-white-400"></i>Edit</a>

                    <button onclick="PopUpDeleteModal({{ $Data->CourseID }})" class="btn btn-danger"><i
                            class="fas fa-trash-alt fa-sm fa-fw mr-2 text-white-400"></i>Delete</button>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" onclick="HidePopUpDeleteModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this Course?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" onclick="HidePopUpDeleteModal()">Cancel</button>
                    <a href="/ChangeBinusian" class="btn btn-danger" type="submit" id="DeleteButtonModal"><i
                            class="fas fa-trash-alt fa-sm fa-fw mr-2 text-white-400"></i>Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready Change Binusian?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Change" below if you are ready to end your current Binusian Admin
                    session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="/ChangeBinusian" class="btn btn-danger" type="submit"><i
                            class="fas fa-exchange-alt fa-sm fa-fw mr-2 text-white-400"></i>Change Binusian</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function PopUpDeleteModal(CourseID) {
            console.log("asda");
            document.getElementById("DeleteButtonModal").href = "/admin/" + CourseID + "/delete";
            $('#DeleteModal').modal('show');
        }

        function HidePopUpDeleteModal() {
            $('#DeleteModal').modal('hide');
        }
    </script>
@endsection
