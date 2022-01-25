<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Http\Requests\PegawaiRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::with('jabatan')->latest()->paginate(2);


        return view('Pegawai.dataPegawai', compact('data'));
    }

    public function cetakPegawai()
    {
        $data = Pegawai::with('jabatan')->latest()->get();


        return view('Pegawai.cetakPegawai', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        return view('Pegawai.createPegawai',compact('jab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
      //  dd($request->all());
      Pegawai::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'jabatan_id' => $request->jabatan_id,
        'tanggal_lahir' => $request->tanggal_lahir
      ]);

      Alert::success('Success', 'Data Berhasil Ditambahkan');

      return redirect('pegawai');
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
        $jab = Jabatan::all();
        $data = Pegawai::with('jabatan')->findorfail($id);
        return view('pegawai.editPegawai', compact('data','jab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {

        $data= Pegawai::findorfail($id);

        $data->update($request->all());

        Alert::success('Success', 'Data Berhasil Ubah');

        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data= Pegawai::findorfail($id);

      $data->delete();

      Alert::success('Success', 'Data Berhasil Di hapus');

      return redirect('pegawai');

    }

    public function delete($id)
    {
      $data= Pegawai::findorfail($id);

      $data->delete();

      Alert::success('Success', 'Data Berhasil Di hapus');

      return back();

    }

    public function cetakTanggal()
    {
      return view('Pegawai.cetakPegawaiTanggal');
    }

    public function cetakPegawaiTanggal($tglAwal, $tglAkhir)
    {
      //dd(["tanggalAwal:".$tglAwal , "TanggalAkhir:".$tglAkhir]);
      $data = Pegawai::with('jabatan')->whereBetween('tanggal_lahir',[$tglAwal, $tglAkhir])->latest()->get();

      return view('Pegawai.hasilCetakPegawaiTanggal',compact('data'));
    }
}
