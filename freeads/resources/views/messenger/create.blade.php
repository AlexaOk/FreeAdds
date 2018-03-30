@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-sm-12 blog-main">
          <div class="card justify-content-center">
            <div class="card-header"><h1>Compose a new message</h1></div>
            <div class="card-body">
              <form action="{{ route('messages.store') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-12">
                  <!-- Subject Form Input -->
                  <div class="form-group">
                    <label class="control-label">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                    value="{{ old('subject') }}">
                  </div>

                <!-- Message Form Input -->
                <div class="form-group">
                  <label class="control-label">Message</label>
                  <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                </div>

                @if($users->count() > 0)
                  <div class="checkbox">
                    @foreach($users as $user)
                      <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                        value="{{ $user->id }}">{!!" ".$user->name!!}</label>
                      @endforeach
                    </div>
                  @endif

                  <!-- Submit Form Input -->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                  </div>
                </div>
              </form>
            @stop
