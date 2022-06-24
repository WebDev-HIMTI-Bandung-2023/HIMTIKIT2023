@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex">
                <p>Binusian ID : </p>
            </div>
            <a href="/admin/0/add" class="btn btn-success"><i
                    class="fas fa-plus-circle fa-sm fa-fw mr-2 text-white-400"></i>Add Software</a>
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger"> <i
                    class="fas fa-exchange-alt fa-sm fa-fw mr-2 text-white-400"></i>Change Binusian</a>
        </div>
    </div>
@endsection