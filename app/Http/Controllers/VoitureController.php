<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Voiture ;
use  App\Models\Client ;
use  App\Models\vente ;
class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
         

        return view('login');
    }
    public function indexx()
    {
        $voitures= Voiture::all();
       
        return view('voiture',['voitures'=>$voitures,'layout'=>'index']);
    }
    public function deconnect()
    {

        session()->pull('user');
       return view('login');
       
   
    }
    public function index(Request $request )
    {
       $user =DB::table('user')->where('nom',$request->input('nom'))->where('pwsd',$request->input('pswd'))->count();
     if($user>0){
        
        $voitures= Voiture::all();
       
        return view('voiture',['voitures'=>$voitures,'layout'=>'index']);
    }
    else{
        echo "user name or password incorrect";
        return view('login');
    }
}

    public function indexvente()
    {
        $voitures= vente::all();

        return view('voiture',['voitures'=>$voitures,'layout'=>'indexvente']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voitures= Voiture::all();
        $clients= Client::all();
        return view('voiture',['clients'=>$clients,'voitures'=>$voitures,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $voitures =new Voiture();
         
        $voitures->prix=$request->input('prix');
        $voitures->marke=$request->input('marke');
        $voitures->nom=$request->input('nom');
        $voitures->date_creation=$request->input('date_creation');
        $voitures->nombre_de_km=$request->input('nombre_de_km');
        $voitures->type= $request->input('type');
        $voitures->noProprietaire = $request->input('noProprietaire');
       
       $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('voiture', $filename);
        $voitures->image=$filename;
        

        $voitures->save();
        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voiture= voiture::find($id);
        $voitures= voiture::all();
        return view('voiture',['voitures'=>$voitures,'voiture'=>$voiture,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voiture= Voiture::find($id);
        $voitures= Voiture::all();
        $clients =client ::all();
        return view('voiture',['voitures'=>$voitures,'clients'=>$clients,'voiture'=>$voiture,'layout'=>'edit']);
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
        $voiture= Voiture::find($id);
        $voiture->prix=$request->input('prix');
        $voiture->marke=$request->input('marke');
        $voiture->nom=$request->input('nom');
        $voiture->date_creation=$request->input('date_creation');
        $voiture->nombre_de_km=$request->input('nombre_de_km');
        $voiture->type= $request->input('type');
        $voiture->noProprietaire = $request->input('noProprietaire');
        
     /*   $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('voiture', $filename);
        $voiture->image=$filename;
*/
        $voiture->save();
        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voiture= voiture::find($id);
        $voiture->delete();
        return redirect('/index');  
    }
    public function destroyvente($id)
    {
        $voiture= vente::find($id);
        $voiture->delete();
        return redirect('/indexvente');  
    }
    
    public  function ajoutAchat($id)
    {
        $voiture= Voiture::find($id);
        $voitures= Voiture::all();
        return view('voiture',['voitures'=>$voitures,'voiture'=>$voiture,'layout'=>'ajoutAchat']);
    }
     public  function validerAchat(Request $request,$id,$idc)
     {  $voiture= Voiture::find($id);

        $vente =new vente();
        $vente->image=$voiture->image;
        $vente->prix=$request->input('prix');
        $vente->marke=$request->input('marke');
        $vente->nom=$request->input('nom');
        $vente->date_creation=$request->input('date_creation');
        $vente->type= $request->input('type');
        $vente->Telephone = $request->input('Telephone');
       
        
        $vente->save();
        
        $client = client::find($idc);
        if($idc==1){
        $cr = $client->solde + $request->input('prix');
        $client->solde=$cr ;
        $client->save();
        }
        else
        {
            $client = client::find($idc);
            $cr = $client->solde + $request->input('prix')*0.9;
            $client->solde=$cr ;
            $client->save();

          $client = client::find(1);
           $cr = $client->solde + $request->input('prix')*0.1;
           $client->solde=$cr ;
           $client->save();

        }
        $voiture->delete();

        return redirect('/index');  
        
     }
}
