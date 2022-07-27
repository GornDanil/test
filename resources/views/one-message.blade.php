@extends('layouts.app')

@section('title-block')Запись @endsection

@section('content')
    @if(Auth::check())
        @if($data->access == 3 and $data->user == Auth::user()->email )
        <h1> {{ $data->title }} </h1> 
        <div class="alert alert-info">
            <textarea id="message" class="d-none">{{ $data->message }}</textarea>
            <div id="editor"></div>
            <p><small>{{ $data->created_at }}</small></p>
        </div>
        @elseif($data->access == 1 or $data->access == 2)
        <h1> {{ $data->title }} </h1> 
        <div class="alert alert-info">
            <textarea id="message" class="d-none">{{ $data->message }}</textarea>
            <div id="editor"></div>
            <p><small>{{ $data->created_at }}</small></p>
        </div>
        @elseif($data->access == 3 and $data->user != Auth::user()->email)
        <h1>У вас нет доступа к этой записи</h1>
        @endif
    @elseif(Auth::check() != true)
        @if($data->access == 3)
        <h1>У вас нет доступа к этой записи</h1>
        @elseif($data->access == 1 or $data->access == 2)
        <h1> {{ $data->title }} </h1> 
        <div class="alert alert-info">
            <textarea id="message" class="d-none">{{ $data->message }}</textarea>
            <div id="editor"></div>
            <p><small>{{ $data->created_at }}</small></p>
        </div>
        @endif
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajaxorg.github.io/ace-builds/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setReadOnly(true);
        editor.setTheme("ace/theme/monokai");
        editor.setFontSize(17);
        var mess = $('#message').val();
        editor.session.setValue(mess);
        var lang = $("#lang").val();
    
        editor.getSession().setMode("ace/mode/{{$data->lang}}");
        
    </script>
@endsection
 
