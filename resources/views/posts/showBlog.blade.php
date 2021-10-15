@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h3>All Posts</h3>

        @if(Session::has('message'))
                <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>{{ Session::get('message') }}</strong>
                </div>
                @endif
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-sm">
                <thead class="text-white" style="background: #0f4473;">
                    <tr>
                        <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image Path</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->summary }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->image_path }}</td>
                    <td>{{ $post->admin->name }}</td>
                    <td class="d-flex">
                        <a href="/blog/{{ $post->slug }}/edit" class="mr-2 text-decoration-none btn btn-sm btn-warning">Edit</a>
                        <form action="/blog/{{ $post->slug }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
</div>
</div>
</div>
@endsection
