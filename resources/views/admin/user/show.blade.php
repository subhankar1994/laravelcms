@extends('admin.layouts.app')
@section('main_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Users
      </h1>
      @include('admin.layouts.breadcumb')
    </section>

    <!-- Main content -->
    <section class="content">
    	@include('admin.layouts.messages')
      <div class="box">
        <div class="box-header with-border">
          <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}
                  </td>
                  <td>{{ $user->created_at }}</td>
                  <td>
                  	<a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                  	@if($user->id != 1)
                  	<form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy', $user->id) }}" style="display: none;">
                  		{{ csrf_field() }}
                  		{{ method_field('DELETE') }}
                  	</form>
                  	<a href="" onclick="if(confirm('Are you sure, You want to delete this?')){event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();}else{event.preventDefault();}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                  	@endif
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