@extends('layouts.app')

@section('title-block') Главная страница @endsection

@section('content')
   <h1>Главная страница</h1>
   <div class="container">
      @if($data->count() >0)
      <h2>Последние записи пользователей</h2>
      @endif

   </div> 
   @foreach($data as $el)
    <div class="alert alert-info">
        <h3>{{ $el->title }}</h3>
        
        <script>
        </script>
        
        <p><small>{{ $el->created_at }}</small></p>
        <a href="{{ route('contact-data-one', $el->id)}}"><button type="submit" name="button" id="" class="btn btn-warning">Детальнее</button></a>
    </div>


   @endforeach
   @if($private->count() >0)
   <h2>Ваши последние записи</h2> 
   @endif
   @foreach($private as $el)
    <div class="alert alert-info">
        <h3>{{ $el->title }}</h3>
        
        <script>
        </script>
        
        <p><small>{{ $el->created_at }}</small></p>
        <a href="{{ route('contact-data-one', $el->id)}}"><button type="submit" name="button" id="" class="btn btn-warning">Детальнее</button></a>
    </div>


   @endforeach
@endsection
