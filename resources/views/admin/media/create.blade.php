@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Media
    </h1>
    @include('admin.layouts.breadcumb')
  </section>
  <!-- Main content -->
  <section class="content">
    @include('admin.layouts.messages')
    <div class="box">
      <div class="box-body">
        <form role="form" class="dropzone" method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection