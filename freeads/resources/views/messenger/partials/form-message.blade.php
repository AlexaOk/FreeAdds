<tbody>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-sm-12 blog-main">
          <div class="card justify-content-center">
            <div class="card-header">
              <h2>Add a new message</h2>
            </div>
            <form action="{{ route('messages.update', $thread->id) }}" method="post">
              {{ method_field('put') }}
              {{ csrf_field() }}

              <!-- Message Form Input -->
              <div class="form-group">
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
              </div>

              @if($users->count() > 0)
                <div class="checkbox">
                  @foreach($users as $user)
                    <label title="{{ $user->name }}">
                      <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
                    </label>
                  @endforeach
                </div>
              @endif

              <!-- Submit Form Input -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</tbody>
