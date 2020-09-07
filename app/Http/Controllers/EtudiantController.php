<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;


use PDF;
use App\Etudiant;
use Illuminate\Support\Facades\Validator;

class EtudiantController extends Controller
{

    public function __construct()
    {

        return $this->middleware('auth');
    }


    public function index()
    {


        $etudiants = Etudiant::paginate(3);


        return view('etudiant.index', compact(['etudiants']) );


    }

    public function create()
    {           activity()->causedBy(auth()->user())->log('jai créé un étudiant');

        return view('etudiant.create');
    }

    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'nom' => 'required|alpha|max:255',
            'prenom' => 'required|alpha|max:255',
            'dtn' => 'date',
            'lieun' => 'required|alpha|max:255',

        ])->validate();

        $etudiant = Etudiant::create(['nom' => $request->nom,
            'prenom' => $request->prenom,
            'dtn' => $request->dtn,
            'lieun' => $request->lieun

        ]);

        return redirect('etudiants')->with('success', 'création étudiant');
    }

    public function edit( $id)
    {
        $etudiant = Etudiant::find($id);
        activity()->causedBy(auth()->user())->performedOn($etudiant)->log('jai modifié un étudiant');
        return view('etudiant.edit', ['etudiant' => $etudiant]);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::find($id);

        $etudiant->update(['nom' => $request->nom,
        'prenom'=> $request->prenom,
        'dtn' => $request->dtn,
        'lieun'=>$request->lieun
        ]);
        activity()->causedBy(auth()->user())->performedOn($etudiant)->log('jai mis a jour un etudiant');
        return redirect('etudiants')->with('success', ' mise à jour étudiant');;
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('etudiants');
    }


    public function del(Request $request)
    {
//        dd($request);
        $delid = $request->input('delid');
        Etudiant::whereIn('id', $delid)->delete();

        return redirect()->back()->with('success', 'suppression des étudiants séléctionnés ');
    }
    public function report(Request $request)
    {
        $etudiants = Etudiant::all();

        if($request->view_type === 'download') {
            $pdf = PDF::loadView('etudiant.pdfview', ['etudiants' => $etudiants]);

            return $pdf->download('etudiants.pdf');
        } else {
            $view = View('etudiant.pdfview', ['etudiants' => $etudiants]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());

            return $pdf->stream();
        }
    }



       /* DB::table('etudiants')->
        where('nom', 'like', '%' . $request->get('nom') . '%')
            ->orWhere('prenom', 'like', '%' . $request->get('prenom') . '%')
            ->orWhere('lieun', 'like', '%' . $request->get('lieun') . '%')
            ->get();


        return view('etudiant.index', compact('search', 'etudiants'));*/
        public function search(Request $request)
    {
        $columnsToSearch = ['nom', 'prenom', 'lieun'];


        $searchQuery = '%' . $request->search . '%';

        $etudiants = Etudiant::where('id', 'LIKE', $searchQuery);

        foreach($columnsToSearch as $column) {
            $etudiants = $etudiants->orWhere($column, 'LIKE', $searchQuery);
        }

        $etudiants = $etudiants->get();

        return view('etudiant.search', compact('search', 'etudiants'));
    }



}
