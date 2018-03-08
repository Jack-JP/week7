<div class="card">
  <div class="card-header"><a href="/admin">Dashboard</a></div>
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Posts
            </a>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('admin.post.create') }}">Create post</a></li>
            <li class="list-group-item"><a href="{{ route('admin.post.showall') }}">Show all posts</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Categories
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <ul class="list-group">
            <li class="list-group-item">Create Categories</li>
            <li class="list-group-item">Show Categories</li>
          </ul>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Users
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
          <ul class="list-group">
            <li class="list-group-item">Create user</li>
            <li class="list-group-item">Show users</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
