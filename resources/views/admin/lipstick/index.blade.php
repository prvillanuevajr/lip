@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Products</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button id="addBtn" class="btn btnsm btn-dark btn-block">ADD</button>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Lip sticks
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($lipsticks as $lipstick)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{$lipstick->name}}</h5>
                                        <img class="card_product_image" src="/storage/{{$lipstick->image}}" alt="">
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">${{$lipstick->price}}</li>
                                        <li class="list-group-item"><div class="card" style="background: {{$lipstick->color}};"><div class="card-header"></div></div></li>
                                    </ul>
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-dark">Edit</button>
                                        <a href="#" class="btn btn-sm btn-dark">Remove</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--MODAL--}}
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
                    <form id="addform" action="{{route('admin.lipstick')}}" method="post" enctype="multipart/form-data">
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
    </script>
@endsection