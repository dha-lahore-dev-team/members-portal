@extends('front.layouts.include')
@section('content')
    <div class="content-wrapper">
    <form action="{{route('hbl.data')}}" method="post" >
        @csrf
        <input type="hidden" name="ammount" value="250">
        <input type="submit" value="Add" class="btn btn-primary">

    </form>
    </div>

@endsection
