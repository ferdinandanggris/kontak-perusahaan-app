<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerusahaanModel;
use Illuminate\Support\Facades\Redirect;

class PerusahaanController extends Controller
{
    protected $perusahaanModel;

    public function __construct()
    {
        $this->perusahaanModel = new PerusahaanModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $payload = $request->all();
        $query = $this->perusahaanModel->query();
        if (isset($payload['nama'])) {
            $query = $query->where('nama','like','%'.$payload['nama'] . '%');
        }
        if((isset($payload['status_dihubungi'])) &&($payload['status_dihubungi']> -1)){
            $query = $query->where('status_dihubungi','=',$payload['status_dihubungi']);
        }

        $result = $query->paginate(10);
        // return $resul;
        // $perusahaan = PerusahaanModel::all();
        return view('Perusahaan.index',[
            'perusahaan' => $result
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Perusahaan.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telepon' => 'required|numeric',
            'status_dihubungi' => 'required',
            'deskripsi' => 'required',
        ]);

        PerusahaanModel::create($validatedData);

        return redirect('/perusahaan')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->perusahaanModel->getById($id);
        // return $data;
        return view('Perusahaan.show',[
            'perusahaan' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->perusahaanModel->getById($id);
        return view('Perusahaan.edit',[
            'perusahaan'=> $data
        ]);
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
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telepon' => 'required|numeric',
            'status_dihubungi' => 'required',
            'deskripsi' => 'required',
        ]);

        PerusahaanModel::where('id', $id)
                        ->update($validatedData);

        return redirect('/perusahaan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PerusahaanModel::destroy($id);
        return redirect('/perusahaan')->with('success', 'Data berhasil dihapus.');
    }

    public function editStatus($id){
        $data = $this->perusahaanModel->getById($id);
        // return $data->status_dihubungi;
        // dd($data);
        if ($data->status_dihubungi) {
            PerusahaanModel::where('id',$id)
                            ->update([
                                'status_dihubungi' => 0
                            ]);
        }else{
            PerusahaanModel::where('id',$id)
            ->update([
                'status_dihubungi' => 1
            ]);
        }
        // return redirect('/perusahaan')->with('success','Data berhasil diupdate');
        return Redirect::back()->with('success','Data berhasil diupdate');
    }
}
