@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit User
    </h1>
   @include('admin.layouts.breadcumb')
  </section>
  <!-- Main content -->
  <section class="content">
    @include('admin.layouts.messages')
    <div class="box">
      <form role="form" method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name<span class="required">*</span></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="@if(old('name')){{ old('name') }}@else{{ $user->name }} @endif">
            @if ($errors->has('name'))
            <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="@if(old('name')){{ old('email') }}@else{{ $user->email }} @endif">
            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
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