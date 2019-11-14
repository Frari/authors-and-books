@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1 class='text-center'>Add a new author and his book</h1>
        <form action="{{route('authors.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for='name'>Author's name</label>
                <input type="text" class="form-control" placeholder="Write author's name" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for='age'>Author's age</label>
                <input type="text" class="form-control" placeholder="Write author's age" name="age" value="{{old('age')}}">
            </div>
            <div class="form-group">
                <label for='address'>Author's address</label>
                <input type="text" class="form-control" placeholder="Write author's address" name="address" value="{{old('address')}}">
            </div>
            <div class="form-group">
                <label for='title'>title book</label>
                <input type="text" class="form-control" placeholder="Write title book" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for='release'>date release</label>
                <input type="text" class="form-control" placeholder="Write date release" name="release" value="{{old('release')}}">
            </div>
            {{-- <div class="form-group">
                <input type="text" class="form-control" placeholder="Write date release" name="author_id" value="{{$new_author->id}}">
            </div> --}}
            <button type="submit" class="btn btn-primary">Add author</button>
        </form>
    </div>
@endsection
