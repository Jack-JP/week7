@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-3">
        @include('admin.layouts.sidebar')
      </div>
      <div class="col-md-9">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                admin index
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
