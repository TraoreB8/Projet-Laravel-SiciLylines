<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\{Ferrys,Equipement};
use App\Http\Requests\FerryRequest;
use Illuminate\Http\RedirectResponse;



class FerryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $ferrys = Ferrys::paginate(3);
        return view('index', compact ('ferrys'));
        
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipements=Equipement::all();
        return view('create',compact("equipements"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FerryRequest $ferryRequest) : RedirectResponse
    {

        // $ferry= new Ferrys();
        // $ferry->nom=$ferryRequest->input('nom');
        // $ferry->longueur=$ferryRequest->input("longueur");
        // $ferry->largeur=$ferryRequest->input("largeur");
        // $ferry->vitesse=$ferryRequest->input("vitesse");

        $ferry = Ferrys::create($ferryRequest->all());
        $ferry->equipements()->attach($ferryRequest->equipement_id);


        if($ferryRequest->hasFile('photo')){
            $ferryRequest->file("photo")->getPathname();
            $imageName=time().'.'.$ferryRequest->photo->extension();
            $ferryRequest->photo->move(public_path('photos'), $imageName);
            $ferry->photo=$imageName;
        }
        $ferry->save();
       return redirect()->route('ferry.index')->with('info', "Le bateau a bien été crée");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ferrys $ferry)
    {
        $equipement = Equipement::all();
        return view("show", compact('ferry', 'equipement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ferrys $ferry)
    {
        return view('edit', compact ('ferry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FerryRequest $ferryRequest, Ferrys $ferry)
    {
        $ferryRequest->file("photo")->getPathname();
        $imageName=time().'.'.$ferryRequest->photo->extension();
        $ferryRequest->photo->move(public_path('photos'), $imageName);

        $ferry->nom= $ferryRequest-> input('nom');
        $ferry->longueur= $ferryRequest-> input('longueur');
        $ferry->largeur= $ferryRequest-> input('largeur');
        $ferry->vitesse= $ferryRequest-> input('vitesse');
        $ferry->photo = $imageName;
        $ferry->save();
        
        return redirect()->route('ferry.index')->with('info', 'Le bateau a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ferrys $ferry) : RedirectResponse
    {
        $ferry->delete();
        return redirect()->route('ferry.index')->with('info', "le bateau a été supprimé");    
    }


    public function creerPDF(){

        $ferry=Ferrys::all();

        $data=[
            'titre' => 'Liste des bateaux',
            'date' => date("d/m/y"),
            'ferrys'=>$ferry
        ];
        
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->download('ferrys_pdf.pdf');

    }
}
