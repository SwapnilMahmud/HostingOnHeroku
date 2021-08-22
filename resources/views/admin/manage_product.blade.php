@extends('admin/layout')
@section('page_title','Manage_product')
@section('product_select','active')
@section('container')
@if($id>0)
{{$image_required=""}}
@else
{{$image_required="required"}}
@endif
{{session('message')}} 
<h3>Manage Product</h3>
 <a href="{{url('admin/product')}}">
    <button type="button" class="btn btn-success">Back</button>
</a></br>
<!-- MAIN CONTENT-->
<div class="row m-t-30">
   <div class="col-md-12">
            <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
            @csrf
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
                  <div class="card-header"><b>Provide Product Information.</b></div>
               <div class="card-body">                       
                        <div class="form-group">
                           <label for="name" class="control-label mb-1">product Name</label>
                           <input  id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                           @error('name')
                           <div class="alert alert-danger" role="alert">
                           {{$message}}
                           </div>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="slug" class="control-label mb-1">product Slug</label>
                           <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                           @error('slug')
                           <div class="alert alert-danger" role="alert">
                           {{$message}}
                           </div>
                           @enderror                                            
                        </div>
                        <div class="form-group">
                           <label for="image" class="control-label mb-1">product image</label>
                           <input  id="image" value="{{$image}}" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                           @error('image')
                           <div class="alert alert-danger" role="alert">
                           {{$message}}
                           </div>
                           @enderror
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-4">
                                 <label for="category_id" class="control-label mb-1">Category</label>
                                 <select  id="category_id"  name="category_id" type="text" class="form-control" required>
                                 <option value="">select categories</option>
                                 @foreach($category as $list)
                                 <option selected  value="{{$list->id}}">{{$list->category_name}}</option>
                                 @endforeach
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label for="brand" class="control-label mb-1">Brand</label>
                                 <input  id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              </div>
                              <div class="col-md-4">
                                 <label for="model" class="control-label mb-1">Model</label>
                                 <input  id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="short_desc" class="control-label mb-1">Short desc..</label>
                           <textarea  id="short_desc"  name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$short_desc}}</textarea>
                        </div>
                        <div class="form-group">
                           <label for="desc" class="control-label mb-1">desc</label>
                           <textarea  id="desc"  name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$desc}}</textarea>
                        </div>
                        <div class="form-group">
                           <label for="keywords" class="control-label mb-1">keywords</label>
                           <textarea  id="keywords"  name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$keywords}}</textarea>
                        </div>
                        <div class="form-group">
                           <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                           <textarea  id="technical_specification"  name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$technical_specification}}</textarea>
                        </div>
                        <div class="form-group">
                           <label for="uses" class="control-label mb-1">uses</label>
                           <textarea  id="uses"  name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$uses}}</textarea>
                        </div>
                        <div class="form-group">
                           <label for="warranty" class="control-label mb-1">warranty</label>
                           <textarea  id="warranty"  name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$warranty}}</textarea>
                        </div>    
                        
                </div>
                          <div class="col-lg-12"  id="product_attr_box">
                             
                                   @php 
                                   $loop_count_num=1;
                                   @endphp                          
                                   @foreach($productAttrArr as $key=>$val)
                                   @php
                                   $loop_count_prev= $loop_count_num;
                                   $pAArr=(array)$val; //type casting for object convert in array                                                   
                                   @endphp
                           <div class="card" id="product_attr_{{$loop_count_num++}}">
                                <div class="card-header"><b>Provide Attribute.</b></div>
                                   <div class="card-body">  
                                       <div class= "form-group">
                                             <div class="row">
                                                   <div class="col-md-2">
                                                      <label for="sku" class="control-label mb-1">SKU</label>
                                                      <input  id="sku"  value="{{$pAArr['sku']}}"  name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>
                                                   <div class="col-md-2">
                                                       <label for="mrp" class="control-label mb-1">MRP</label>
                                                       <input  id="mrp" value="{{$pAArr['mrp']}}"  name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="price" class="control-label mb-1">PRICE</label>
                                                        <input  id="price"  value="{{$pAArr['price']}}"  name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <label for="size_id" class="control-label mb-1">Size</label>
                                                          <select  id="size_id"  name="size_id[]" type="text" class="form-control" required>
                                                <option value="">select Size</option>
                                                @foreach($sizes as $list)
                                                   @if($pAArr['size_id']==$list->id)
                                                      <option value="{{$list->id}}" selected >{{$list->size}}</option>
                                                   @else
                                                      <option value="{{$list->id}}">{{$list->size}}</option>
                                                   @endif
                                                @endforeach
                                                
                                             </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                          <label for="color_id" class="control-label mb-1">Color</label>
                                                          <select  id="color_id"  name="color_id[]" type="text" class="form-control" required>
                                                <option value="">Color</option>
                                                @foreach($colors as $list)
                                                @if($pAArr['color_id']==$list->id)
                                                      <option  value="{{$list->id}}" selected>{{$list->color}}</option>
                                                @else
                                                      <option  value="{{$list->id}}">{{$list->color}}</option>
                                                @endif
                                                @endforeach
                                             </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <label for="qty" class="control-label mb-1">QTY</label>
                                                            <input  id="qty"  value="{{$pAArr['qty']}}"  name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                             <label for="attr_image" class="control-label mb-1">IMAGE</label>
                                                            <input  id="attr_image"  name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>
                                                    @if($loop_count_num==2)
                                                    <div class="col-md-1">
                                                             <label for="" class="control-label mb-1">&nbsp;&nbsp;&nbsp;</label>
                                                             <button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                                                             <i class="fa fa-plus"></i> &nbsp; Add</button>
                                                    </div>
                                                     @else
                                                    <div class="col-md-1">
                                                              <label for="" class="control-label mb-1">&nbsp;&nbsp;&nbsp;</label>
                                                               <a href="{{url('admin/product/product_attr_delete/')}}/{{$pAArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger btn-lg" onclick="remove_more('{{$loop_count_prev}}')">
                                                               <i class="fa fa-minus"></i> &nbsp; Remove</button></a>
                                                     </div>
                                                     @endif
                                                </div>
                                       </div>   </div>   </div>
                                        @endforeach
                                   </div>
                                    <div class="form-group">                                
                                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</div>
                                       <input  value="{{$id}}" name="id" type="hidden" >                               
                                    </div>
                            </div>
                        </div>   
         </div>
                       
                        
      </div>
      </form>                  
   </div>   
                        <script>
                           var loop_count=1;
                           function add_more(){
                           loop_count++;
                           var html='<div class="card" id="product_attr_'+loop_count+'"><div class="card-body"<div class="form-group"><div class="row">';
                           html+='<div class="col-md-2"><label for="category_id" class="control-label mb-1">SKU</label><input id="sku"  name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" ></div>';                        
                           html+='<div class="col-md-2"><label for="mrp" class="control-label mb-1">MRP</label><input  id="mrp"  name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" > </div>';
                           html+='<div class="col-md-2"><label for="price" class="control-label mb-1">PRICE</label><input  id="price"  name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" ></div>';
                           var size_id_html=jQuery('#size_id').html();
                           html+='<div class="col-md-3"> <label for="size_id" class="control-label mb-1">Size</label> <select  id="size_id"  name="size_id[]" type="text" class="form-control" >'+size_id_html+'</select></div>';
                           var color_id_html=jQuery('#color_id').html();
                           html+=' <div class="col-md-3"><label for="color_id" class="control-label mb-1">Color</label><select  id="color_id"  name="color_id[]" type="text" class="form-control" > <option value="">'+color_id_html+'</select> </div>';
                           html+='<div class="col-md-2"><label for="qty" class="control-label mb-1">QTY</label> <input  id="qty"  name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" ></div>';
                           html+='<div class="col-md-4"><label for="attr_image" class="control-label mb-1">IMAGE</label><input  id="attr_image"  name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" ></div>';
                           html+='<div class="col-md-1"><label for="" class="control-label mb-1">&nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i> &nbsp; Remove</button></div>';
                           html+='</div></div></div></div>';
                           jQuery('#product_attr_box').append(html);
                           }
                           function remove_more(loop_count){
                              jQuery('#product_attr_'+loop_count).remove();
                           }
                        </script>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="copyright">
      <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
      </div>
   </div>
</div>     
@endsection