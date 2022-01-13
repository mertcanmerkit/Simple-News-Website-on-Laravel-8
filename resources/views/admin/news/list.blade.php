
<x-app-layout>
    <x-slot name="header">News List</x-slot>

    <div class="container">
        <div class="row m-3">
    @if(session('succes'))
        <div class="alert alert-success">
            {{session('succes')}}
        </div>
    @endif

    <a href="{{route('news-contents.create')}}">Add new news</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">img</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($newsContents as $newsContent)
        <tr>
            <td class="w-15">
                @if(isset($newsContent->img_src))
                <img src=" {{ asset('images/'.$newsContent->img_src) }}" class="img-fluid img-thumbnail" alt="">
                @else
                    The image has not been added.
                @endif
            </td>
            <td>{{ $newsContent->title }}</td>
            <td><?= substr($newsContent->description , 0, 500) . "..."; ?></td>
            <td>{{ $newsContent->status }}</td>
            <td>
                <a href="{{ route('news-contents.edit',$newsContent->id) }}" class="btn btn-primary mb-2 w-100">Edit</a>
                <form action="{{route('news-contents.destroy',$newsContent->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <input class="form-control btn-danger w-100" type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $newsContents->links() }}

        </div>
    </div>
</x-app-layout>


