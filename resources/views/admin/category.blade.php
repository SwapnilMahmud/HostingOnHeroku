@extends('admin/layout') 
@section('page_title','Category');
@section('category_select','active');
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
     {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span></button>
</div>
@endif
<div class="row">
 <h1>Category</h1>
</div>
<hr />

<a href="{{url('admin/category/manage_category')}}">
 <button type="button" class="btn btn-success">Add Category</button>
</a>

<div class="row m-t-50">     
 <div class="col-md-12">
  <span class="content"></span>
  <!-- DATA TABLE-->
  <div class="table-responsive m-b-40">
   <table class="table table-borderless table-data3">
    <thead>
     <tr>
      <th>ID</th>
      <th>Category Name</th>
      <th>Category Slug</th>
      <th>Action</th>
     </tr>
    </thead>
    @foreach($data as $list)
    <tbody>
        <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->category_name}}</td>
        <td>{{$list->category_slug}}</td>
        <td>
            <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}"><button class="btn btn-info" type="submit">EDIT</button></a>
            @if($list->status==1)
            <a href="{{url('admin/category/status/0')}}/{{$list->id}}"><button class="btn btn-warning" type="submit">Active</button></a>
            @elseif($list->status==0)
            <a href="{{url('admin/category/status/1')}}/{{$list->id}}"><button class="btn btn-danger" type="submit">Deactive</button></a>
            @endif
            <a href="{{url('admin/category/delete')}}/{{$list->id}}"><button class="btn btn-danger" type="submit">DELETE</button></a>

        </td>
        </tr>    
    </tbody>
     @endforeach
   </table>
  </div>
  <!-- END DATA TABLE-->
 </div>
</div>

@endsection
