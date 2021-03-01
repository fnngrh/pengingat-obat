<?php

namespace App\Http\Controllers;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use App\EfekSampingObat;
use App\PetunjukPenyimpananObat;
use App\FungsiObat;
use App\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data =Obat::with('bentuk_obat','kontraindikasi_obat','interaksi_obat','fungsi_obat','efek_samping_obat'
        , 'petunjuk_penyimpanan_obat')->get();
//          return response()->json($data);
	    return $data;
    }
    public function detailobat ($id){
        $detailObat = Obat::with('bentuk_obat','kontraindikasi_obat','interaksi_obat','fungsi_obat','efek_samping_obat'
        , 'petunjuk_penyimpanan_obat')->where('id',$id)->first();
        // dd($detailObat->kontraindikasi_obat->nama_kontraindikasi);
        return view('obat.detailObat',compact('detailObat'));
    }
    public function index()
    {
        $bentuk_obat = BentukObat::all();
        $interaksi_obat = InteraksiObat::all();
        $kontraindikasi_obat = KontraindikasiObat::all();
        $fungsi_obat = FungsiObat::all();
        $efek_samping_obat = EfekSampingObat::all();
        $petunjuk_penyimpanan_obat = PetunjukPenyimpananObat::all();
        return view('obat.index',compact('bentuk_obat','interaksi_obat','kontraindikasi_obat','fungsi_obat'
            , 'efek_samping_obat', 'petunjuk_penyimpanan_obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([

            'nama_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'kode_obat' => 'sometimes|max:50',
            'kesediaan' => 'required',
            'satuan' => 'required',
            'id_kontraindikasi_obat' => 'required',
            'id_interaksi_obat' => 'required',
            'id_efek_samping_obat' => 'required',
            'id_petunjuk_penyimpanan_obat' => 'required',
            'id_fungsi_obat' => 'required',
            'pola_makan' => 'required',
            'informasi' => 'required',
        ]);

        if($request->kode_obat){
        $kode = "'OB00255'+1";
        }
        
        $data = $request->all();
        
        $data['kode_obat'] = $kode;
        
        Obat::create($data);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_obat' => 'required',
            'id_bentuk_obat' => 'required',
            'kesediaan' => 'required',
            'satuan' => 'required',
            'id_kontraindikasi_obat' => 'required',
            'id_interaksi_obat' => 'required',
            'id_efek_samping_obat' => 'required',
            'id_petunjuk_penyimpanan_obat' => 'required',
            'id_fungsi_obat' => 'required',
            'pola_makan' => 'required',
            'informasi' => 'required',
        ]);
       
       
        return Obat::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Obat::find($id)->delete();
    }
}
