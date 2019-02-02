@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 d-flex align-items-center">
            <h1 class="flex-md-grow-1">Manage Products</h1>
            <button id="addBtn" class="btn-sm btn-dark">add</button>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table class="table-sm table table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Image</th>
                        <th>Brand</th>
                        <th>Finish</th>
                        <th>Price</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($lipsticks as $lipstick)
                            <tr>
                                <td>{{$lipstick->id}}</td>
                                <td class="text-center"><img style="border-radius: 50%" width="32px" src="/storage/{{$lipstick->image}}" alt=""></td>
                                <td><span class="badge badge-dark">{{$lipstick->brand->name}}</span></td>
                                <td><span class="badge-dark badge">{{$lipstick->finish->name}}</span></td>
                                <td>${{$lipstick->price}}</td>
                                <td>
                                    <button data-content="{{$lipstick->id}}" class="btn btn-danger removebtn btn-sm"><i class="fa fa-remove"></i></button>
                                    <button class="btn btn-dark btn-sm"><i class="fa fa-pencil"></i></button>
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
                    <h5 class="modal-title">Add Lipstick</h5>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addform" action="{{route('admin.lipstick')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select required name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="finish_id">Finish type</label>
                            <select required name="finish_id" id="finish_id" class="form-control">
                                <option value="">Select finish</option>
                                @foreach($finishes as $finish)
                                    <option value="{{$finish->id}}">{{$finish->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input name="name" id="name" required type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Photo</label>
                                <input name="image" id="image" required type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" id="description" required type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input name="price" id="price" required type="number" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="color">Color</label>
                                <input name="color" id="color" required type="color" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-dark btn-sm float-right" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#addBtn').click(function () {
            $('#MODAL').modal('show');
        })
        $('.table').DataTable()
        $('.removebtn').click(function () {
            if (!confirm('Remove this item?')) {
                return false
            }
            axios.delete(`/admin/lipstick/${$(this).attr('data-content')}`)
                .then(window.location.reload(true));
        })
    </script>
@endsection