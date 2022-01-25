<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Gambar;
use App\Http\Requests\GambarRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gambar::latest()->get();
        return view('Gambar.dataGambar', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Gambar.tambahGambar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GambarRequest $request)
    {
        // dd($request->all());

        $dataUpload = new Gambar;
        $dataUpload->nama = $request->nama;

        if($request->file('gambar')){
        $file = $request->file('gambar');
        $namaFile = time().str_replace(' ','',$file->getClientOriginalName()) ;
            
        $dataUpload->gambar = $namaFile;
            
        $file->move(public_path().'/img',$namaFile);
        }
        $dataUpload->save();

        Alert::success('Success', 'Data Berhasil Ditambahkan');
        return redirect('gambar');
        
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
        $data = Gambar::findorfail($id);
        return view('Gambar.UbahGambar',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GambarRequest $request, $id)
    {
        $data = Gambar::findorfail($id);
        $data->nama = $request->nama;

        if ($request->file('gambar')) {

            if ($data->gambar!='' && $data->gambar != null) {
                $file_old = 'img/'.$data->gambar;
                unlink($file_old);
            }

            $file = $request->file('gambar');
            $namaFile = time().str_replace(' ','',$file->getClientOriginalName()) ;
            $data->gambar = $namaFile;

            $file->move(public_path().'/img',$namaFile);
        }

        $data->save();

        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect('gambar');
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

    public function delete($id)
    {
      $data= Gambar::findorfail($id);

      $namaFile = $data->gambar;
      $file = public_path('/img/').$namaFile;
      if (file_exists($file)) {
          unlink($file);
      }

      $data->delete();

      Alert::success('Success', 'Data Berhasil Di hapus');

      return back();

    }
}
