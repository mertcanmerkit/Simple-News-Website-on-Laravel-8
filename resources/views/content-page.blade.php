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
    <div class="row mb-3 mt-3">
        <img src="{{asset('/images/'. $newsContent->img_src)}}" alt=""><br/>

        <h1>{{$newsContent->title}}<br/></h1>
        <p>{{$newsContent->description}}<br/></p>
        <p>{{$newsContent->created_at->format('d/m/Y')}}<br/></p>

        <h5 class="mt-4">Comments</h5>
        @if(session('succes'))
            <div class="alert alert-success">
                {{session('succes')}}
            </div>
        @endif

        <div>

            @auth
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <label for="content">Message:</label>
                    <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                    <input type="hidden" value="{{auth()->user()->getRememberToken()}}"
                           name="{{auth()->user()->getRememberTokenName()}}">
                    <input type="hidden" value="{{$newsContent->id}}" name="news_id">
                    <input type="submit" class="btn btn-primary mt-2 mb-2">
                </form>
            @else
                <span class="mb-2">To add a comment, Please <a href="{{route('login')}}">login</a> or <a
                        href="{{route('register')}}">register.</a> </span>
            @endif
            <hr>
            @if(count($comments) > 0)
                @foreach($comments as $comment)
                    <div>
                        <strong>{{$comment->user->name}}</strong>
                        <div>
                        @if(Request::has('update'))
                            @if(Request::get('update') == $comment->id)
                                <form action="{{route('member-comments.update', $comment->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input class="form-control" type="text" name="content"
                                           value="{{$comment->content}}">
                                    <input class="btn btn-primary float-end" type="submit" value="Update">
                                </form>
                            @else
                                <p>{{$comment->content}}</p>
                            @endif
                        @else
                            <p>{{$comment->content}}</p>
                        @endif
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Created {{$comment->created_at->format('d/m/Y')}}
                                Updated {{$comment->updated_at->format('d/m/Y')}}</p>
                            @auth
                            @if(auth()->user()->id == $comment->commenter_id)
                                <form action="" method="get">
                                    @if(Request::get('update') == $comment->id)
                                    @else
                                        <button class="btn btn-warning" type="submit" name="update"
                                                value="{{$comment->id}}">Update
                                        </button>
                                    @endif
                                </form>
                                <form action="{{route('member-comments.destroy', $comment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            @endif
                            @endauth
                        </div>
                        @if(!$loop->last)
                            <hr>@endif
                    </div>
                @endforeach
            @else
                <p>There are no comments yet.</p>
            @endif

        </div>
    </div>
</div>

</body>
</html>
