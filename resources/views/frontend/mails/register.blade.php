@extends('frontend.layouts.mail')

@section('head')
    <h3>{{ $temp['name'] }}</h3>
@endsection

@section('content')
    {!! $temp['body'] !!}
@endsection

@section('foot')
    <small>*Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aut fugiat quae totam voluptatibus! Dicta ipsam similique suscipit ut voluptate? Accusamus animi architecto delectus eos error illo, modi natus nobis?</small>
@endsection