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
                        <p>{{$comment->content}}</p>
                        <div class="d-flex justify-content-between">
                            <p>Created {{$comment->created_at->format('d/m/Y')}}
                                Updated {{$comment->updated_at->format('d/m/Y')}}</p>

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
