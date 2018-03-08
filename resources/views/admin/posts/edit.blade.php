@extends('admin.layouts.master')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>
@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-3">
        @include('admin.layouts.sidebar')
      </div>
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit post</div>

            <div class="card-body">
              @if($post)
              <form action="{{ route('admin.post.update', $post->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('patch') }}

                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type='text' name="title" class='form-control' placeholder='title' value='{{ $post->title }}'>
                </div>

                <div class="form-group">
                  <label for="category">Category:</label>
                  <select class="form-control" name="category_id">
                    <option value="{{ $post_category->id }}">{{ $post_category->name }}</option>
                    @foreach($categories as $category)

                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">

                  <textarea class="form-control ckeditor" id="article-ckeditor" name="body">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                  <button type='submit' class='btn btn-default'>Add post</button>
                </div>
              </form>
              @else
                {{ $post = "No post" }}
              @endif

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-header">Create category</div>

              <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="category">Category:</label>
                    <input type='text' name="category" class='form-control' placeholder='add category'>
                  </div>
                  <div class="form-group">
                    <button type='submit' class='btn btn-default'>Add category</button>

                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
