@extends('layouts.app')

@section('title-block') Все Пасты @endsection

@section('content')
    @if($data->count() >0)
    <h1>Все Пасты</h1> 
    @else
    <h1>Ни одной Пасты еще не загружено</h1>
    @endif
   @foreach($data as $el)
    <div class="alert alert-info">
        <h3>{{ $el->title }}</h3>
        
        <script>
        </script>
        
        <p><small>{{ $el->created_at }}</small></p>
        <a href="{{ route('contact-data-one', $el->id)}}"><button type="submit" name="button" id="" class="btn btn-warning">Детальнее</button></a>
    </div>
    
    
   @endforeach
   @if($data->onFirstPage() != true)
   <a href="{{$data->previousPageUrl()}}"><button type="submit" name="button" id="" class="btn btn-info">предыдущая страница</button></a>
   @endif
   @if($data->hasMorePages())
   <a href="{{$data->nextPageUrl()}}"><button type="submit" name="button" id="" class="btn btn-info">Следующая страница</button></a>
   @endif
   @if(Auth::check())
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
   @if($private->count() >0)
   <a href="{{ route('user.private')}}"><button type="submit" name="button" id="" class="btn btn-info">Просмотреть свои записи</button></a>
   @endif
   @endif
@endsection
 
