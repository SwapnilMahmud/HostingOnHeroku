@extends('admin/layout') 
@section('page_title','Coupon');
@section('coupon_select','active');
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
     {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span></button>
</div>
@endif
<div class="row">
 <h1>Coupon</h1>
</div>
<hr />

<a href="{{url('admin/coupon/manage_coupon')}}">
 <button type="button" class="btn btn-success">Add Coupon</button>
</a>

<div class="row m-t-50">    
     {{session('message')}}  
 <div class="col-md-12">
  <span class="content"></span>
  <!-- DATA TABLE-->
  <div class="table-responsive m-b-40">
   <table class="table table-borderless table-data3">
    <thead>
     <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Code</th>
      <th>Value</th>
       <th>Action</th>
     </tr>
    </thead>
    @foreach($data as $list)
    <tbody>
        <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->title}}</td>
        <td>{{$list->code}}</td>
        <td>{{$list->value}}</td>
        <td>
            <a href="{{url('admin/coupon/manage_coupon/')}}/{{$list->id}}"><button class="btn btn-info" type="submit">EDIT</button></a>
             @if($list->status==1)
            <a href="{{url('admin/coupon/status/0')}}/{{$list->id}}"><button class="btn btn-warning" type="submit">Active</button></a>
            @elseif($list->status==0)
            <a href="{{url('admin/coupon/status/1')}}/{{$list->id}}"><button class="btn btn-danger" type="submit">Deactive</button></a>
            @endif
            <a href="{{url('admin/coupon/delete')}}/{{$list->id}}"><button class="btn btn-danger" type="submit">DELETE</button></a>

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
