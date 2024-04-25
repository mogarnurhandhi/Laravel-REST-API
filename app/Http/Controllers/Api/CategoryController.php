<?php

namespace App\Http\controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Category::get();
            return $this->responseOk($categories,200);
        }catch (\Throwable $th) {
            return $this->responseError("Internal Server Error", 500);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            Category::insert([
                'nama_category'=>$input['nama_category']
            ]);
            return $this->responseOk('sukses',200);
        } catch (\Throwable $th){
            \Log::error($th->getMessage());
            return $this->responseError("Internal Server Error", 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = Category::where('id',$id)->first();
            if(empty($category)){
                return $this->responseError('Data dengan ID '.$id.' tidak ditemukan', 404);
            }
            return $this->responseOk($category,200);    
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return $this->responseError("Internal Server Error", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $category = Category::where('id',$id)->first();
            if(empty($category)){
                return $this->responseError('Data dengan ID'.$id.'tidak ditemukan', 404);
            }
            $category->update([
                'nama_category'=>$input['nama_category']
            ]);
            return $this->responseOk(null,200);    
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return $this->responseError("Internal Server Error", 500);
        }
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::where('id',$id)->first();
            if(empty($category)){
                return $this->responseError('Data dengan ID'.$id.'tidak ditemukan', 404);
            }
            $category->delete();
            return $this->responseOk(null,200);    
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return $this->responseError("Internal Server Error", 500);
        }
    }
}
