@extends('layouts.app')

@section('content')

@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<form method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    Company Name: <input name="name" placeholder="Company Name"/>
    <input type="submit" value="create"/>
</form>
@endsection