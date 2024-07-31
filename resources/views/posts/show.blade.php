<!doctype html>
<html lang="en">
  <head>
    <title>Post Detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('posts.show', ['post'=>$post->uuid]) }}"> {{ $post->title }}</a> <small>~ {{ $post->user->name }} (<i>{{ $post->user->email }}</i>)</small>
                </h4>
                <p class="card-text">
                    {{ $post->content }}
                </p>
                <hr>
                <h3>Comments ({{ $post->comments->count() }})</h3>
                <form method="POST" name="formcomment" id="formcomment" action="{{ route('comment.store')}}" class="form-horizontal">
                     @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}" id="post_id">
                    <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
                        <label for="author">User</label>
                        <select id="author" name="author" class="form-control" required>
                            <option value="">Select User</option>
                            @foreach ($users as $key => $user)
                            <option {{ old('author') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $user }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('author') }}</small>
                    </div>

                    <div class="row form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-sm-3 control-label">Comment</label>
                        <div class="col-sm-9">
                            <textarea id="content" name="content" class="form-control" required="required">Your text here... {{ old('content') }}</textarea>
                            <small class="text-danger">{{ $errors->first('content') }}</small>
                        </div>
                    </div>

                    <div class="btn-group float-right">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>

                </form>
                @foreach ($post->comments as $comment)
                    <p><strong>{{ $comment->user->id.') '.$comment->user->name }}({{ $comment->user->posts->count() }})</strong> {{ $comment->content }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>