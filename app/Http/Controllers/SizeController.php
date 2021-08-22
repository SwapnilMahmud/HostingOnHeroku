<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
   public function index()
    {    
         $result['data']=Size::all();
         return view('admin.size',$result);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_size_process(Request $request)
    {
        //return $request->post();
        $request->validate([         
            'size'=>'required|unique:sizes,size,',
        ]);
        if($request->post('id')>0){
            $model=Size::find($request->post('id'));
            $msg="size updated";
        }else{
            $model=new Size();
            $msg="size inserted";
        }
        $model->size=$request->post('size');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {       
        $model=Size::find($id);
        $model->delete(); 
        $request->session()->flash('message','size Deleted');
        return redirect('admin/size');
    }
    public function status(Request $request,$status,$id)
    {       
        $model=Size::find($id);
        $model->status=$status; 
        $model->save();
        $request->session()->flash('message','size status updated');
        return redirect('admin/size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  
     * @return \Illuminate\Http\Response
     */
    public function manage_size(Request $request,$id='')
    {
        //
        // echo'<pre>';
        // // print_r($result);
        // // die();
        if($id>0){
            $arr=Size::where(['id'=>$id])->get();
            $result['size']=$arr['0']->size;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;

        }else{
            $result['size']='';
            $result['status']='';
            $result['id']=0;
        }        
        return view('admin/manage_size',$result);

    }
}
