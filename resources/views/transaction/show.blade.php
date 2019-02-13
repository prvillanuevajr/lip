@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice
                <strong>{{$transaction->created_at}}</strong>
                <span class="float-right"> <strong>Mode of payment: </strong>{{$transaction->mop}}</span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong>{{config('app.name')}}</strong>
                        </div>
                        <div>Nicanor Reyes St Sampaloc, Manila,</div>
                        <div>1008 Metro Manila</div>
                        <div>Email: info@lipstick.co</div>
                        <div>Phone: +48 444 666 3333</div>
                    </div>

                    <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong>{{$transaction->user->name}}</strong>
                        </div>
                        <div>---</div>
                        <div>---</div>
                        <div>{{$transaction->user->email}}</div>
                        <div>---</div>
                    </div>


                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th class="right">Unit Cost</th>
                            <th class="center">Qty</th>
                            <th class="right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction->details as $detail)
                            <tr>
                                <td class="center">{{$detail->id}}</td>
                                <td class="left strong">{{$detail->lipstick->name}}</td>
                                <td class="left">{{$detail->lipstick->description}}</td>

                                <td class="right">{{$detail->price}}</td>
                                <td class="center">{{$detail->quantity}}</td>
                                <td class="right">{{$detail->price * $detail->quantity}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>{{$transaction->total_price}}</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection