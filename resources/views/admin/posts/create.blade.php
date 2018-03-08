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
            <div class="card-header">Create post</div>

            <div class="card-body">
                <form action="{{ route('admin.post.store') }}" method="post">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title:</label>
                    <input type='text' name="title" class='form-control' placeholder='title'>
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                  </div>

                  <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category_id">
                      <option>Select a category</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                  </div>

                  <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body">Body:</label>
                    <textarea class="form-control ckeditor" id="article-ckeditor" name="body"></textarea>
                    <small class="text-danger">{{ $errors->first('body') }}</small>
                  </div>


                  <div class="form-group">
                    <button type='submit' class='btn btn-default'>Add post</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">Create category</div>
            <div class="card-body">
              <form action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="category">Category:</label>
                  <input type='text' name="name" class='form-control' placeholder='add category'>
                  <small class="text-danger">{{ $errors->first('name') }}</small>
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
