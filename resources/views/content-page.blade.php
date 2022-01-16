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
    <div class="row">
        <img src="{{asset('/images/'. $newsContent->img_src)}}" alt=""><br/>

        <h1>{{$newsContent->title}}<br/></h1>
        <p>{{$newsContent->description}}<br/></p>
        <p>{{$newsContent->created_at->format('d/m/Y')}}<br/></p>

    </div>
</div>

</body>
</html>
