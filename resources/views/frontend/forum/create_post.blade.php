@extends('frontend.layouts.app')

@section('content')
      <form method="POST" action="/forum/create_post" id="form">
        @if (count($errors))
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-8 pl-0">
              <input name="title" type="hidden" id="title">
              <div id="editor-title">{{ old('title') }}</div>
            </div>
            <button id="create_post" class="btn btn-submit btn-primary col-sm-4" onclick="sub();">Create_Post</button>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 pl-0 pr-0">
              <input name="body" type="hidden" id="body">
              <div id="editor-body">{{ old('body') }}</div>
            </div>
          </div>
      </form>
@endsection

@push('after-scripts')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script type="text/javascript">
    var bodyquill = new Quill('#editor-body', {
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline'],
          ['link', 'blockquote', 'code-block', 'image'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
      },
      placeholder: 'Compose an epic post...',
      theme: 'snow'
    });
    var titlequill = new Quill('#editor-title', {
      modules: {
        toolbar: false
      },
      placeholder: 'Title Here...',
      theme: 'snow'
    });
    function sub(){
          document.getElementById("title").value = titlequill.getText();
          document.getElementById("body").value = bodyquill.getText();
          return true;
    };
  </script>
@endpush
