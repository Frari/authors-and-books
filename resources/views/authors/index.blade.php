@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>All the Authors</h1>
        <div class='text-right'>
            <a href="{{route('authors.create')}}" class='btn btn-primary'>Add Author</a>
        </div>
        {{-- cards authors with them books --}}
        @foreach($authors as $author)
       
            <div class="card mt-2">
                <h5 class="card-header">Name author: {{$author->name}}</h5>
                <div class="card-body">
                    <h5 class="card-title">Age: {{$author->age}}</h5>
                    <p class="card-text">Addresse: {{$author->address}}</p>
                    
                    {{-- button to show author's books --}}
                    <div class="d-inline">
                      <a href="{{route('authors.show', $author->id)}}" class="btn btn-primary">Show books</a>
                    </div>
                    
                    {{-- button/form to delete author --}}
                    <div class="d-inline-block">
                      <form action="{{route('authors.destroy', $author->id)}}" method="post" class="inline-form">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
                      </form>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
      {{$authors->links()}}
    </div>
@endsection
