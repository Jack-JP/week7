@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="jumbotron text-center">
          <div class="container">
            <h1 class="jumbotron-heading">Bloggerfly</h1>
            <p class="lead text-muted">Best blogger site ever.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md">

      </div>
      <div class="col-md-1">
        <div class="sidecontainer pl-5" onclick="myFunction(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md">
          <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">
                    <div class="card-body">
                      <div class="card-text text-center">
                        {{ str_limit($post->title, 20) }}
                      </div>
                      <div class="card-text">
                        {!! str_limit($post->body, 100) !!}
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-secondary"> View </a>
                          @if(!Auth::guest())
                            @if(Auth::user()->id == $post->user_id)
                              <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary"> Edit </a>
                            @endif
                          @endif

                          <button type="button" class="btn btn-sm btn-outline-secondary">like</button>
                        </div>
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <!-- sitebar -->
        <div class="col-md" id="sidebar">
          <div class="row">
            <div class="col-md-12">
              <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                  <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Categories
                      </a>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <ul class="list-group">
                      @foreach($categories as $category)
                      <a href="{{ route('category.show', $category->id ) }}"><li class="list-group-item">{{ $category->name }}</li></a>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Latest Posts
                      </a>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <ul class="list-group">
                      @foreach($populairs as $populair)
                        <li class="list-group-item">{{ $populair->title }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End Sidebar -->
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">© 2018 blog All Rights Reserved</span>
      </div>
    </footer>
  </div>

</div>
@endsection
