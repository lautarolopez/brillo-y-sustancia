@extends('layouts.admin_layout')

@section('content')




    @foreach ($sales as $sale)
        <h3>ID: "{{$sale->id}}"</h3>
        <h3>Purchase Date: "{{$sale->purchase_date}}"</h3>
        <hr>
    @endforeach




@endsection