@extends('layouts.app')

@section('content')
    <div class='container'>
      <h3 class="text-center mt-5">Books of {{$author_book->name}}</h3>
      {{-- go into multi-array --}}
      @php
        $book = $author_book->books;
      @endphp
         @if ($book->count()>0)   
            <table class="table mt-5">
              <thead>
                <tr>
                 <th scope="col">Title</th>
                  <th scope="col">Date release</th>
                </tr>
              </thead>
              <tbody>            
                @foreach ($book as $value)
                  <tr>                       
                    <td>{{$value->name}}</td>
                    <td>{{$value->release_date}}</td>
                  </tr> 
                @endforeach
              </tbody>  
            </table>
            @else
              <h1 class="mt-5 text-center">THERE ARE NOT BOOKS FOR THIS AUTHOR</h1>                                               
            @endif              
    </div>
@endsection