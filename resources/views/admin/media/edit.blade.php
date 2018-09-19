@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Media
    </h1>
    @include('admin.layouts.breadcumb')
  </section>
  <!-- Main content -->
  <section class="content">
    @include('admin.layouts.messages')
    <div class="box">
        <form role="form" method="POST" action="{{ route('media.update', $media->id) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="box-body">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="@if(old('title')){{ old('title') }}@else{{ $media->title }} @endif">
                @if ($errors->has('title'))
                <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
              </div>
              </div>
              <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">Update</button>
        </div>
        </form>
    </div>
  </section>
</div>
@endsection