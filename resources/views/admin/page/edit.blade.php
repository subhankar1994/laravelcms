@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Page
    </h1>
    @include('admin.layouts.breadcumb')
  </section>
  <!-- Main content -->
  <section class="content">
    @include('admin.layouts.messages')
    <form role="form" action="{{ route('page.update', $page->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="row">
        <div class="col-sm-9">

          <!-- general section start -->
          <div class="box">
            <div class="box-body">
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="@if(old('title')){{ old('title') }}@else{{ $page->title }} @endif">
                @if ($errors->has('title'))
                <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="@if(old('slug')){{ old('slug') }}@else{{ $page->slug }} @endif">
                @if ($errors->has('slug'))
                <span class="help-block">
                  <strong>{{ $errors->first('slug') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="editor1" name="content" rows="10" cols="80">
                  @if(old('content')){{ old('content') }}@else{{ $page->content }} @endif
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
              <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="@if(old('meta_title')){{ old('meta_title') }}@else{{ $page->meta_title }} @endif">
            </div>
            <div class="form-group">
              <label for="meta_description">Meta Description</label>
              <textarea class="form-control" name="meta_description" id="meta_description">@if(old('meta_description')){{ old('meta_description') }}@else{{ $page->meta_description }} @endif</textarea>
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
              <option value="1" @if($page->status == 1) selected @endif>Publish</option>
              <option value="2" @if($page->status == 2) selected @endif>Draft</option>
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
            <input type="text" class="form-control" name="order" id="order" placeholder="Order" value="@if(old('order')){{ old('order') }}@else{{ $page->order }} @endif">
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