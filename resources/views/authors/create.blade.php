@extends('layouts.app')

@section('content')
  {{-- form create new author with his book --}}
    <div class='container mt-5'>
        <h1 class='text-center'>Add a new author and his book</h1>
        <form action="{{route('authors.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for='name'>Author's name</label>
                <input type="text" maxlength="255" class="form-control" placeholder="Write author's name" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for='age'>Author's age</label>
                <input type="number" min="18" max="100" class="form-control" placeholder="Write author's age" name="age" value="{{old('age')}}">
            </div>
            <div class="form-group">
                <label for='address'>Author's address</label>
                <input type="text" maxlength="255" class="form-control" placeholder="Write author's address" name="address" value="{{old('address')}}">
            </div>
            <div class="form-group">
                <label for='title'>Title book</label>
                <input type="text" maxlength="255" class="form-control" placeholder="Write title of book" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for='release'>Year release</label>
                <input type="number" min="1900" max="2019" class="form-control" placeholder="Write year of release" name="release" value="{{old('release')}}">
            </div>
            <button type="submit" class="btn btn-primary">Add author</button>
        </form>
    </div>
@endsection
