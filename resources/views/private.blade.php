@extends('layouts.app')

@section('title-block') Страница пользователя @endsection

@section('content')
   <h1>Страница пользователя</h1>
   @if($data->count() >0)
   <h2>Ваши последние записи</h2> 
   @else
   <h2>Вы еще не загрузили ни одной Пасты</h2>
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
@endsection