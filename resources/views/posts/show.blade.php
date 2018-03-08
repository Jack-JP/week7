@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{ $post->title }}</h1>

          <!-- Author -->
          <p class="lead">
            by <a href="#">{{ $post->user->name }}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{ $post->created_at->diffForHumans() }}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="https://www.caracolinternacional.com/sites/default/files/webpage_imagendeltitulo_750x300_la_nocturna_ing.png" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead">{!! $post->body !!}</p>

          <hr>
          @if(Auth::user())
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post" action="{{ route('comment.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <textarea style="resize: none" class="form-control" name="comment" rows="3"></textarea>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="anonymous">
                  <label class="form-check-label" for="anonymous">Stay anonymous</label>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          @else
            login to comment
          @endif
          @foreach($post->comments as $comment )
          <div class="media mb-4">
            <img height="80" width="80" class="d-flex mr-3 rounded-circle" src="http://www.nce.ufrj.br/ginape/imagens/avatar.png" alt="User">
            <div class="media-body">
              <h5 class="mt-0">{{ $comment->username }}</h5>
              {{ $comment->comment }}
            </div>
          </div>
          @endforeach
        </div>
        <div class="col-md-4">
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
        </div>
      </div>
  <footer class="footer">
    <div class="container">
      <span class="text-muted">© 2018 blog All Rights Reserved</span>
    </div>
  </footer>
</div>

@endsection
