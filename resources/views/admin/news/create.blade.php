<x-app-layout>
    <x-slot name="header">Create</x-slot>
    <div class="container">
        <div class="row m-3">

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
            @endif

            <form action="{{route('news-contents.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="img">Image</label>
                <input type="file" class="form-control" name="img_src">

                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">

                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}">

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
