@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>All the Authors</h1>
        <div class='text-right'>
            <a href="{{route('authors.create')}}" class='btn btn-primary'>Add Author</a>
        </div>
        {{-- @php
          dd($authors);
        @endphp --}}
        @foreach($authors as $author)
            <div class="card mt-2">
                <h5 class="card-header">Name author: {{$author->name}}</h5>
                <div class="card-body">
                    <h5 class="card-title"> Age: {{$author->age}}</h5>
                    <p class="card-text">Addresse: {{$author->address}}</p>
                    @php
                      $book = $author->books;
                    @endphp
                    <h5>Author's books</h5>
                    <ul>
                    @foreach ($book as $value)
                      <li><p class="card-text">{{$value?$value->name:'There are not books for this author'}}</p></li>
                    @endforeach
                    </ul>
                    {{-- <a href="{{route('authors.show', $author->id)}}" class="btn btn-primary"> Authors books </a> --}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
