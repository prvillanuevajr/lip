@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover text-center">
                <thead>
                <th>Transaction Id</th>
                <th>Mode of payment</th>
                <th>Total Price</th>
                <th>Total Items</th>
                <th>Details</th>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{$transaction->mop}}</td>
                        <td>{{$transaction->total_price}}</td>
                        <td>{{$transaction->total_price}}</td>
                        <td><a href="/transaction/{{$transaction->id}}" class="btn btn-outline-dark">Recipt</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection