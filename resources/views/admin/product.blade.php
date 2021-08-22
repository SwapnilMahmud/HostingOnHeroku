@extends('admin/layout');
@section('page_title','Product')
@section('product_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
     {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span></button>
</div>
@endif
<h3>Product</h3>
</br>

<a href="{{url('admin/product/manage_product')}}">
<button type="button" class="btn btn-success">Add Product</button>
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
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->name }}</td>
                                                <td>{{$list->slug }}</td>
                                                <td><img width="100px" height="100px" src="{{asset('storage/media/'.$list->image)}}"</td>
                                                <td>                                               
                                                <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}"><button class="btn btn-success" type="submit">EDIT</button></a>
                                                @if($list->status==1)
                                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}"><button class="btn btn-info" type="submit">Active</button></a>
                                                @elseif($list->status==0)
                                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}"><button class="btn btn-warning" type="submit">Deactive</button></a>
                                                @endif
                                                <a href="{{url('admin/product/delete/')}}/{{$list->id}}"><button class="btn btn-danger" type="submit">DELETE</button></a>
                                                </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            
            </div>
                        
        </div>
    
@endsection