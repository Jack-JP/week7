@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-3">
        @include('admin.layouts.sidebar')
      </div>
      <div class="col-md-9">
        <div class="card">
            <div class="card-header">All posts</div>

            <table class="table table-hover table-striped ">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Body</th>
                  <th scope="col">Image</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Category</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)

                  <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->image }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->category_id }}</td>
                    @if(!Auth::guest())
                      @if(Auth::user()->id == $post->user_id)
                        <td><a href="{{ route('admin.post.edit', $post->id) }}">Edit</a></td>
                        <td><a href="#">Delete</a></td>
                      @endif
                    @endif
                    <td><a href="{{ route('post.show', $post->id) }}">Show</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>

              {{ $posts->links() }}

          </div>
        </div>
    </div>
</div>
@endsection
