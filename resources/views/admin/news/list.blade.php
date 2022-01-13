<x-app-layout>
    <x-slot name="header">News List</x-slot>

    <div class="container">
        <div class="row m-3">
            @if(session('succes'))
                <div class="alert alert-success">
                    {{session('succes')}}
                </div>
            @endif
            <form action="" method="get">
                <div class="row mb-3">
                    <div class="col-4 ps-0">
                        <input class="form-control" type="text" name="title"
                               @if(request()->get('title')) value="{{request()->get('title')}}"
                               @endif placeholder="Quiz Title">
                    </div>
                    <div class="col-4">
                        <select class="form-control" onchange="this.form.submit()" name="status" id="status">
                            <option value="">Select Status</option>
                            <option @if(request()->get('status') == 'publish') selected @endif value="publish">Publish
                            </option>
                            <option @if(request()->get('status') == 'passive') selected @endif value="passive">Passive
                            </option>
                            <option @if(request()->get('status') == 'draft') selected @endif value="draft">Draft
                            </option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                        <div class="col-4">
                            <a href="{{route('news-contents.index')}}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    @endif
                </div>
            </form>
            <a href="{{route('news-contents.create')}}" class="btn btn-primary mb-2">Add new news</a>
            <div class="table-responsive">
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
                                    <img src=" {{ asset('images/'.$newsContent->img_src) }}"
                                         class="img-fluid img-thumbnail"
                                         alt="">
                                @else
                                    The image has not been added.
                                @endif
                            </td>
                            <td>{{ $newsContent->title }}</td>
                            <td><?= substr($newsContent->description, 0, 500) . "..."; ?></td>
                            <td>{{ $newsContent->status }}</td>
                            <td>
                                <a href="{{ route('news-contents.edit',$newsContent->id) }}"
                                   class="btn btn-primary mb-2 w-100">Edit</a>
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
            </div>
            {{ $newsContents->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>


