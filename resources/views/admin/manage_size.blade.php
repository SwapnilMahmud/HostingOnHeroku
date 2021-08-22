@extends('admin/layout')
@section('page_title','Manage Size');
@section('container')
<h3>Manage Size</h3>
  <!-- MAIN CONTENT-->
  <div class="main-content">
                <div class="section__content section__content--p33">               
                        <div class="row">
                            <div class="col-lg-12">
                             {{session('message')}}                           
                            <a href="{{url('admin/size')}}">
                              <button type="button" class="btn btn-success">Back</button>
                            </a>  
                            <br>
                                <div class="card">
                                    <div class="card-header">Category Manage</div>
                                    <div class="card-body">                                       
                                     <form action="{{route('size.manage_size_process')}}" method="post" >
                                       @csrf
                                            <div class="form-group">
                                                <label for="size" class="control-label mb-1">Size</label>
                                                <input  id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            
                                            
                                            @error('size')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>  
                                            @enderror                                                                                      
                                           
                                            </div>                                                                           
                                            
                                            </div>                                        
                                                                                        
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                     Submit
                                                </button>
                                            </div>
                                            <input  value="{{$id}}" name="id" type="hidden" >

                                        </form>
                                    </div>
                                </div>
                           </div>                                             
                                                  
                       </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
@endsection

