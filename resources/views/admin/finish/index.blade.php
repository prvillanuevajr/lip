@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Finishes</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    Finishes
                    <button id="addbtn" class="btn btn-sm btn-dark float-right">+</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($finishes as $finish)
                            <tr>
                                <td>{{$finish->name}}</td>
                                <td>{{$finish->description}}</td>
                                <td>
                                    <button data-content="{{$finish->id}}"
                                            class="deletebtn btn btn-danger btn-sm fa fa-remove"></button>
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
                    <form id="addform" action="{{route('admin.finish')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Finish Name</label>
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Finish Description</label>
                            <input id="description" type="text" name="description" class="form-control">
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
        $('.deletebtn').click(function () {
            if (!confirm('Remove this item?')) {
                return false
            }
            axios.delete(`/admin/finish/${$(this).attr('data-content')}`)
                .then(window.location.reload(true));
        })
    </script>
@endsection