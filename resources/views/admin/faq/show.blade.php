@extends('admin.layout.main')
@section('title') Редактирование FAQ @endsection
@section('caption') Редактирование FAQ @endsection

@section('content')
    <div class="card-body">
        <form method="post" action="{{ route('admin.site.faq.update', ['id' => request()->id]) }}" class="">
            <div class="form-group">
                <label for="editor">Заголовок вопроса</label>
                <input name="caption" class="form-control">
            </div>
            <div class="form-group">
                <label for="editor">Содержание вопроса</label>
                <textarea name="text" class="border border-dark" id="editor"></textarea>
            </div>
            @csrf
            <button type="submit" class="btn btn-success">Обновить</button>
        </form>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
