@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Page
    </h1>
    @include('admin.layouts.breadcumb')
  </section>
  <!-- Main content -->
  <section class="content">
    @include('admin.layouts.messages')
    <form role="form" action="{{ route('page.store') }}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="row">
        <div class="col-sm-9">

          <!-- general section start -->
          <div class="box">
            <div class="box-body">
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                @if ($errors->has('title'))
                <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ old('slug') }}">
                @if ($errors->has('slug'))
                <span class="help-block">
                  <strong>{{ $errors->first('slug') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="editor1" name="content" rows="10" cols="80">
                  {{ old('content') }}
                </textarea>
              </div>
            </div>
          </div>
          <!-- general section end -->
          <!-- seo section start -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">SEO</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <div class="form-group">
              <label for="meta_title">Meta Title</label>
              <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}">
            </div>
            <div class="form-group">
              <label for="meta_description">Meta Description</label>
              <textarea class="form-control" name="meta_description" id="meta_description">{{ old('meta_description') }}</textarea>
            </div>
          </div>
        </div>
        <!-- seo section end -->

      </div>
      <div class="col-sm-3">

        <!-- publish section start -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Publish</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
           <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="1">Publish</option>
              <option value="2">Draft</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">Publish</button>
        </div>
      </div>
      <!-- publish section end -->
      <!-- attribute section start -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Page Attributes</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label for="order">Order</label>
            <input type="number" class="form-control" name="order" id="order" placeholder="Order" value="{{ old('order') }}">
          </div>
        </div>
      </div>
      <!-- attribute section end -->
      <!-- featured image section start -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Featured Image</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
      </div>
      <!-- featured image section end -->
    </div>
  </div>
</form>
</section>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(function () {
    $("#title").keyup(function(){
      var Text = $(this).val();
      Text = Text.toLowerCase();
      Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
      $("#slug").val(Text);        
    });
  });
</script>
@endsection