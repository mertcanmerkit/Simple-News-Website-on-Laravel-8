<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">

        @if(session('changed'))
            <div class="alert alert-warning">
                {{session('changed')}}
            </div>
        @endif

        @if(session(('deleted')))
            <div class="alert alert-danger">
                {{session('deleted')}}
            </div>
        @endif

        @foreach($comments as $comment)
            <div class="card mt-4">
                <div class="card-header">
                    <strong>{{$comment->user->name}}</strong>
                    <div class="d-inline-flex float-end">
                        <form action="{{route('comments.update', $comment->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <select
                                class="form-control @if($comment->status == 'publish')bg-success @elseif($comment->status == 'passive')bg-danger @endif"
                                onchange="this.form.submit()" name="status" id="status" style="color: white;width: 100px;">
                                <option value="publish" @if($comment->status == 'publish')selected @endif>publish
                                </option>
                                <option value="passive" @if($comment->status == 'passive')selected @endif>passive
                                </option>
                            </select>
                        </form>
                        <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input class="form-control btn-danger mb-2 w-100" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$comment->content}}</p>
                        <footer class="blockquote-footer">created: {{$comment->created_at->format('d/m/Y')}}<cite
                                title="Source Title"> updated:{{$comment->updated_at->format('d/m/Y')}}</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
