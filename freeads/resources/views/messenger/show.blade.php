@extends('layouts.app')

@section('content')
  <tbody>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="col-sm-12 blog-main">
                <div class="card justify-content-center">
      <div class="card-header">
        <h1>{{ $thread->subject }}</h1>

        @each('messenger.partials.messages', $thread->messages, 'message')

        @include('messenger.partials.form-message')


@stop
