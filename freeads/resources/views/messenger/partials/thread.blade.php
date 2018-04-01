<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<tbody>
  <div class="media alert {{ $class }}">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="col-sm-12 blog-main">
              <div class="card justify-content-center">
                <div class="card-header">  <h1><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a></h1>
                ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
                </div>
                <p>
                  <div class="card-body">
                    <table class="table table-striped">
                      <tbody>
                    {{ $thread->latestMessage->body }}
                  </p>
                  <p>
                    <small><strong>Creator :</strong> {{ $thread->creator()->name }}</small>
                  </p>
                  <p>
                    <small><strong>Participants :</strong> {{ $thread->participantsString(Auth::id()) }}</small>
                  </p>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</tbody>
