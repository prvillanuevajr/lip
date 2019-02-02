@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Brands</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    Brands
                    <button id="addbtn" class="btn btn-sm btn-dark float-right">+</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->created_at->diffForHumans()}}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm fa fa-remove"></button>
                                    <button class="btn btn-dark btn-sm fa fa-pencil"></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--MODAL--}}
    <div id="MODAL" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Brand</h5>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addform" action="{{route('admin.brand')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark btn-sm" onclick="$('#addform').submit()">SAVE</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#addbtn').click(function () {
            $('#MODAL').modal('show')
        })
        $('.table').DataTable()
    </script>
@endsection