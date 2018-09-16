@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Pages
      </h1>
      @include('admin.layouts.breadcumb')
    </section>

    <!-- Main content -->
    <section class="content">
    	@include('admin.layouts.messages')
      <div class="box">
        <div class="box-header with-border">
          <a href="{{ route('page.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="admin_data_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($pages as $page)
                <tr>
                  <td>{{ $page->title }}</td>
                  <td>{{ $page->slug }}
                  </td>
                  <td>{{ $page->created_at }}</td>
                  <td>
                    @if($page->status == 1)
                    <span class="label label-success">Publish</span>
                    @else
                    <span class="label label-warning">Draft</span>
                    @endif
                  </td>
                  <td>
                  	<a href="{{ route('page.edit', ['id' => $page->id]) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                  	<form id="delete-form-{{ $page->id }}" method="post" action="{{ route('page.destroy', $page->id) }}" style="display: none;">
                  		{{ csrf_field() }}
                  		{{ method_field('DELETE') }}
                  	</form>
                  	<a href="" onclick="if(confirm('Are you sure, You want to delete this?')){event.preventDefault();document.getElementById('delete-form-{{ $page->id }}').submit();}else{event.preventDefault();}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                    <a href="" class="btn btn-primary" title="View"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
               
                </tbody>
              </table>
        </div>
      </div>
    </section>
  </div>
@endsection