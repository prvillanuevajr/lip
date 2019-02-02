@extends('layouts.app')
@section('content')
    <select name="name" id="name">
            <option value="" selected disabled="">SELECT ANY</option>
            <option value="1" selected >opt1</option>
            <option value="2">opt2</option>
    </select>
@endsection
@section('scripts')
    <script>
        let obj = []
        $.ajax({
            'url': 'https://apis.is/weather/forecasts/is',
            'type': 'GET',
            'dataType': 'json',
            'data': {'stations': '1,422'},
            'success': function(response) {
                console.log(response.results[0].forecast[0].T)
            }
        });
    </script>
@endsection