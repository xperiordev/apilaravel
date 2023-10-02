<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Buku::orderBy('judul', 'ASC')->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Data ditemukan!',
            'data'      => $data
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'judul'         => 'required',
            'pengarang'     => 'required',
            'tgl_publikasi' => 'required|date'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {

            return response()->json([
                'status'    => false,
                'message'   => 'Silahkan isi form terlebih dahulu!',
                'data'      => $validator->errors()
            ]);

        }

        else
        {

            $dataBuku = new Buku;
            $dataBuku->judul         = $request->judul;
            $dataBuku->pengarang     = $request->pengarang;
            $dataBuku->tgl_publikasi = $request->tgl_publikasi;
            
            $post = $dataBuku->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Data berhasil disimpan',
                'data'      => $dataBuku
            ]);

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
        
        $data = Buku::find($id);
        if ($data)
        {

            return response()->json([
                'status'    => true,
                'message'   => 'Data ditemukan',
                'data'      => $data
            ], 200);

        }

        else
        {

            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ]);

        }

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
        
        $dataBuku = Buku::find($id);
        
        if (empty($dataBuku))
        {

            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);

        }

        else
        {

            $rules = [
                'judul'         => 'required',
                'pengarang'     => 'required',
                'tgl_publikasi' => 'required|date'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails())
            {
    
                return response()->json([
                    'status'    => false,
                    'message'   => 'Silahkan isi form terlebih dahulu!',
                    'data'      => $validator->errors()
                ]);
    
            }
    
            else
            {
    
                $dataBuku = new Buku;
                $dataBuku->judul         = $request->judul;
                $dataBuku->pengarang     = $request->pengarang;
                $dataBuku->tgl_publikasi = $request->tgl_publikasi;
                
                $post = $dataBuku->save();
    
                return response()->json([
                    'status'    => true,
                    'message'   => 'Data berhasil diubah',
                    'data'      => $dataBuku
                ]);
    
            }

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
        
        $dataBuku = Buku::find($id);
        if (empty($dataBuku))
        {

            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);

        }

        else
        {

            $post = $dataBuku->delete();

            return response()->json([
                'status'    => true,
                'message'   => 'Data berhasil dihapus'
            ]);

        }

    }
}
