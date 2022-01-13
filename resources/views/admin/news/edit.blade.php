<x-app-layout>
    <x-slot name="header">Edit</x-slot>
    <div class="container">
        <div class="row m-3">

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif

            <form action="{{route('news-contents.update', $newsContent->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="img">Image</label>
                @if(isset($newsContent->img_src))
                <img src="{{ asset('images/'. $newsContent->img_src) }}" width="150" alt="">
                @endif
                <input type="file" class="form-control" name="img_src">

                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $newsContent->title }}">

                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{ $newsContent->description }}">

                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                    <option value="passive">Passive</option>
                </select>

                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
