@extends('layouts.app')

@section('title-block') Публикация @endsection

@section('content')

    <h1>Публикация</h1>

    

    <form action="{{route('paste-form')}}" method="post">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="title">Введите заголовок</label>
            <input type="text" name="title" placeholder="Введите имя" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message"  class="form-control d-none" placeholder="Введите сообщение"></textarea>
        </div>
        <div id="editor"></div>
        <div class="form-group">
            <label for="lang">Язык программирования</label>
            <select name="lang" class="form-control" id="lang">
            <option value="">язык не выбран</option>
                <option value="html">html</option>
                <option value="css">css</option>
                <option value="javascript">javascript</option>
                <option value="php">php</option>
                <option value="java">java</option>
                <option value="csharp">C#</option>
                <option value="kotlin">kotlin</option>
                <option value="django">django</option>
                <option value="fortran">fortran</option>
                <option value="json">json</option>
                <option value="mysql">mysql</option>
                <option value="perl">perl</option>
                <option value="python">python</option>
                <option value="ruby">ruby</option>

            </select>
        </div>
        <div class="form-group">
            <label for="expiration">Срок публикации</label>
            <select name="expiration" class="form-control" id="expiration">
                <option value="1">10 минут</option>
                <option value="2">1 час</option>
                <option value="3">3 часа</option>
                <option value="4">1 день</option>
                <option value="5">1 неделя</option>
                <option value="6">1 месяц</option>
                <option value="7">без ограничения</option>
            </select>
        </div>
        <div class="form-group">
            <label for="access">Доступ</label>
            <select name="access" class="form-control" id="access">
                <option value="1">public</option>
                <option value="2">unlisted</option>
                <option value="3">private</option>
                
            </select>
        </div>
        
        <input type="text" name="user" value="undefind" placeholder="Укажите язык" id="lang" class="form-control d-none">
            <button type="submit" name="button" id="Update" class="btn btn-success">Отправить</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajaxorg.github.io/ace-builds/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.setFontSize(17);
        document.querySelector('#lang').onchange = function (evt) {
            $lang = evt.target.value;
            
            console.log(editor.getSession().setMode("ace/mode/"+$lang));
        };
        $('#Update').on('click', function() {
            var code = editor.getValue();
            $('#message').val(code);
        });

    </script>
@endsection