@extends('frontend.layouts.app')

@section('content')
  <div class="row mr-0 ml-0">

          <!-- Title and First Post -->
          <div class="jumbotron">
            <span class="pull-right d-flex">
              <div class="align-self-center mr-1">Submitted by </div>
              <div class="btn-group">
                    <button class="btn btn-lg">
                        <span class="fa fa-picture"></span> {{ $post->user->name }}
                    </button>
                    <button class="btn btn-lg btn-info" onclick="allowedit()"><span class="fa fa-edit"></span></button>
                    {{ Form::open(['route' => ['frontend.forum.deletepost', $post], 'method' => 'delete'])}}
                      <button class="btn btn-lg btn-danger pull-right" type="submit"><span class="fa fa-trash"></span></button>
                    {{ Form::close() }}
                </div>
            </span>
          <h1>
            <div id="editor-title">{!! $post->title !!}</div>
          </h1>
          <p><div id="editor-body">{!! $post->body !!}</div></p>
          </div>
</div>

          <!-- Comments -->
              @foreach ($post->comments as $comment)
              <div class="row mx-0">
              <div class="jumbotron col-sm-10 offset-sm-1 py-4">
                <div class="container py-3 clearfix d-flex">
                  <div class="d-inline-flex w-100">
                  <div class="align-self-center mr-1">{{ $comment->body }}</div>
                  </div>
                  <span class="pull-right">
                      <div class="btn-group">
                        <button class="btn btn">
                            <span class="fa fa-picture"></span> {{ $comment->user->name }}
                        </button>
                        <button class="btn btn btn-primary" data-id="{{ $comment->id }}" onclick="showHide('replycomment-{{ $comment->id }}');">
                          <span class="fa fa-reply"></span>
                        </button>
                        <button class="btn btn btn-info">
                          <span class="fa fa-edit"></span>
                        </button>
                        <!--<button class="btn btn btn-danger">
                            <span class="fa fa-trash">{{ csrf_field() }}</span>
                        </button>-->
                        {{ Form::open(['route' => ['frontend.forum.deletecomment', $comment], 'method' => 'delete'])}}
                          <button class="btn btn btn-danger pull-right" type="submit"><span class="fa fa-trash"></span></button>
                        {{ Form::close() }}
                      </div>
                  </span>
                </div>

                    @if(Session::has('responsedeleted'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('responsedeleted') }}</p>
                    @endif
                    @foreach ($comment->responses as $response)
                    <div class="row">
                      <div class="container col-sm-10 offset-sm-1 py-2">
                        <span class="pull-right d-inline-flex">
                            <div class=" btn-group">
                              <button class="btn btn-xs">
                                  <span class="fa fa-picture"></span> {{ $response->user->name }}
                              </button>
                              <a class="btn btn-xs btn-info" role="button" href="/forum/responses/{{ $response->id }}/edit">
                                <span class="fa fa-edit"></span>
                              </a>
                              {{ Form::open(['route' => ['frontend.forum.deleteresponse', $response], 'method' => 'delete'])}}
                                <button class="btn btn-xs btn-danger pull-right" type="submit"><span class="fa fa-trash"></span></button>
                              {{ Form::close() }}
                            </div>
                        </span>
                        <p class="d-inline-flex">{{ $response->body }}</p>
                      </div>
                      </div>
                      @endforeach
                      <form class="hiddenform" method="POST" action="/forum/comments/{{ $comment->id }}/newresponse" id="replycomment-{{ $comment->id }}">
                        {{ csrf_field() }}
                        <div class="input-group" style="padding-top: 5px;">
                          <input type="text" name="responsebody" class="form-control" placeholder="Reply to {{ $comment->user->name }}'s comment...">{{ old('body') }}</input>
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Reply to Comment</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              @endforeach


          <hr>
          <h3>Add new Comment</h3>

          <form method="POST" action="/forum/posts/{{ $post->id }}/newcomment">
            {{ csrf_field() }}
            <div class="form-group">
              <textarea name="commentbody" class="form-control" placeholder="Reply to {{ $post->user->name }}'s post...">{{ old('body') }}</textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
          </form>
          @if (count($errors))
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          @endif

@endsection

@push('after-scripts')
  <script type="text/javascript">
      function showHide(id){
        var e = document.getElementById(id);
         if(e.style.display == 'none')
            e.style.display = 'block';
         else
            e.style.display = 'none';
      }
      function allowedit(){
      var bodyquill = new Quill('#editor-body', {
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline'],
              ['link', 'blockquote', 'code-block', 'image'],
              [{ list: 'ordered' }, { list: 'bullet' }]
            ]
          },
          placeholder: 'Compose an epic post...',
          //readOnly: true,
          theme: 'snow'
        });
        var titlequill = new Quill('#editor-title', {
          modules: {
          },
          placeholder: 'Title Here...',
          //readOnly: true,
          theme: 'bubble'
        });
      }
      function submitform(){
            document.getElementById("title").value = titlequill.root.innerHTML;
            document.getElementById("body").value = bodyquill.root.innerHTML;
            return true;
        }
  </script>
@endpush
