<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admincp.truyen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255', 
                'tomtat' => 'required',
                'kichhoat' => 'required',
                'danhmuc_id' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max-height=1000',
            ],
            [
                // custome validate
                'tentruyen.unique' => 'Tên truyện đã có xin điền tên khác',
                'slug_truyen.required' => 'slug truyện phải có',
                'tentruyen.required' => 'tên truyện phải có!',
                'tomtat.required' => 'tóm tắt truyện phải có!',
                'hinhanh.required' => 'hình ảnh truyện phải có!',
                'danhmuc_id.required' => 'danh muc id truyện phải có!',
            ]
        );

        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc_id'];

        // thêm ảnh vào folder
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $truyen->hinhanh = $new_image;

        $truyen->save();

        return redirect()->back()->with('status', 'Thêm truyện thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
