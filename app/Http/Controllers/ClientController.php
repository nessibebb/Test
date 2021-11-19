<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Client ;
use  App\Models\voiture ;
class ClientController extends Controller
{
     
    public  function listeClient()
    {
        $clients = Client ::all();

        return view ('voiture',['clients'=>$clients,'layout'=>'listeClient']);

    }

    public function createclient()
    {
        $clients= Client::all();

        return view('voiture',['clients'=>$clients,'layout'=>'createclient']);
    }

    public function storeclient(Request $request)
    {

        
        $client =new Client();
        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');
        $client->solde=$request->input('solde');
        $client->telephone=$request->input('telephone');

        $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('client', $filename);
        $client->image=$filename;

        $client->save();
        return redirect('/createclient');
        
    }


    public function editclient($idc)
    {
        $client= Client::find($idc);
        $clients= Client::all();
        return view('voiture',['clients'=>$clients,'client'=>$client,'layout'=>'editclient']);
    }
    public function clientinfo($idc)
    {
        $client= Client::find($idc);
        $voitures= voiture::all();
        return view('voiture', ['voitures'=>$voitures,'client'=>$client,'layout'=>'clientinfo']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateclient(Request $request, $idc)
    {
        $client= Client::find($idc);
        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');
        $client->solde=$request->input('solde');
        $client->telephone=$request->input('telephone');
        $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('client', $filename);
        $client->image=$filename;
        
        
        $client->save();
        return redirect('/listeClient');
    }

    public function destroyclient($idc)
    {
        $client= Client::find($idc);
        $client->delete();
        return redirect('/listeClient');  
    }

}
