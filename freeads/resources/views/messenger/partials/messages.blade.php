<tbody>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="col-sm-12 blog-main">
              <div class="card justify-content-center">
    <div class="card-header">
<h5 class="media-heading">  <a href="/users/{{ $message->user->id}}">{{ "@".$message->user->name }}</a></h5>
</div>
<p>{{ $message->body }}</p>

<div class="text-muted">
  <small>Posted {{ $message->created_at->diffForHumans() }}</small>
</div>
</div>
</div>
</div>
</div>
</div>
</tbody>
