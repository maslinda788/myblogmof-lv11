<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        @foreach ($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }} <small> ~ {{ $post->user->name }} <i>{{$post->user->email}}</i></small></h4>
                <p class="card-text">{{ $post->content }} <hr> <h3> Comments ({{ $post->comments->count() }})</h3>
                    <form method="POST" name="commentForm" id="commentForm" action="{{ route('comment.store')}}" class="form-horizontal">
                        @csrf

                        <div class="row form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            <label for="content" class="col-sm-3 control-label">Input</label>
                            <div class="col-sm-9">
                                <textarea id="content" name="content" class="form-control" required="required">Your text here... {{ old('content') }}</textarea>
                                <small class="text-danger">{{ $errors->first('content') }}</small>
                            </div>
                        </div>
                        
                        <input type="hidden" name="post_id" value="{{ $post->id }}"> 
                        <input type="hidden" name="user_id" value="{{ $post->user->id }}">  
                        <div class="btn-group float-right">
                            <button type="submit" class="btn btn-success">Add Comment</button>
                        </div>
                    
                    </form>
                    
                    @foreach ( $post->comments as $comment)

                        {{-- <p>
                            <strong>{{ $comment->user->name }} ({{ $comment->user->posts->count() }})</strong>
                                    {{ $comment->content }}
                        </p> --}}

                        {{-- <p><strong>{{ $comment->user->name }}({{ $comment->user->posts->count() }})</strong> {{ $comment->content }}</p> --}}
                        <p><strong>{{ $comment->user->id.') '.$comment->user->name }}({{ $comment->user->posts->count() }})</strong> {{ $comment->content }}</p>
                    @endforeach
                </p>
            </div>
        </div>

        @endforeach
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
