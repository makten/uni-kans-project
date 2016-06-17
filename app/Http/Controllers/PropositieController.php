<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Marktsegment;
use App\Team;
use App\Thema;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Auth;
use App\User;
use Datatables;
use App\Propositie;
use Laracasts\Flash\Flash;


class PropositieController extends Controller
{

    /**
     * InnovationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param $id
     */
    public function create()
    {
        $themas = Thema::lists('thema_name', 'id')->all();
        $admins = Admins::lists('mannr', 'id')->all();
        $marktsegmenten = Marktsegment::lists('markt_naam', 'id')->all();

        if (in_array(Auth::user()->id, $admins)) {
            return view('administration.content.create_edit_propositie', compact('themas', 'marktsegmenten'));
        } else {
            flash()->overlay('U heeft geen rechten om deze actie uit te voeren. Neem contact op met de admin!');
            return redirect()->back();
        }


    }

    /**
     * @param $id
     */
    public function store(Request $request)
    {

        $data = $request->all();

        //Save uploaded files -----
        if ($request->hasFile('pro_avatar')) {
            $data['pro_avatar'] = $this->uploadFile($request, 'innovations', 'pro_avatar', $request->get('pro_name'));
        }

        if ($request->hasFile('pro_saleskit')) {
            $data['pro_saleskit'] = $this->uploadFile($request, 'documents', 'pro_saleskit', $request->get('pro_name'));
        }

        if ($request->hasFile('pro_technical_doc')) {
            $data['pro_technical_doc'] = $this->uploadFile($request, 'documents', 'pro_technical_doc', $request->get('pro_name'));
        }

        if ($request->hasFile('pro_marktinfo')) {
            $data['pro_marktinfo'] = $this->uploadFile($request, 'documents', 'pro_marktinfo', $request->get('pro_name'));
        }

        $data['user_id'] = Auth::user()->id;

        if ($request->has('pro_marktsegmenten')) {
            $markten = implode(', ', $request->get('pro_marktsegmenten'));
            $data['pro_marktsegmenten'] = $markten;
        }

        if ($request->has('pro_references')) {
            $refs = implode(', ', $request->get('pro_references'));
            $data['pro_references'] = $refs;
        }

        if ($request->has('pro_themas')) {
            $themas = implode(', ', $request->get('pro_themas'));
            $data['pro_themas'] = $themas;
        }

        $propositie = Auth::user()->proposities()->create($data);
        $propositie->addToIndex();

        //Attach a selected themas to this propositie
//        if ($request->has('pro_themas')) {
//            foreach($request->get('pro_themas') as $thema)
//            {
//                $th = Thema::where('thema_name', '=', $thema)->first();
//                $propositie->themas()->attach($th);
//            }
//        }

        //Create a team for this propositie and add creater as owner
        $team = new Team();
        $team->team_name = $propositie->pro_name . '_' . 'Team';
        $team->propositie_id = $propositie->id;
        $team->save();
        $team->users()->attach(Auth::user()->id);

        return redirect('dashboard');

    }


    /**
     * @param $id
     */
    public function show($propositie)
    {
        $prop = Propositie::with(array('nestedReacties' => function ($q) {
            $q->orderBy('reacties.id', 'ASC');
        }))->where('id', $propositie)->first();

        $team = $prop->team;
        $teamMembers = $prop->team->users;

        return view('administration.content.show', compact('prop', 'team', 'teamMembers'));
    }

    /**
     *
     */
    public function edit($id)
    {
        $propositie = Propositie::findOrFail($id);
        $themas = Thema::lists('thema_name', 'id')->all();
        $marktsegmenten = Marktsegment::lists('markt_naam', 'id')->all();
        $editThemas = explode(', ', $propositie->pro_themas);
        $editMarkt = explode(', ', $propositie->pro_marktsegmenten);

        return view('administration.content.create_edit_propositie', compact('propositie', 'themas', 'editThemas', 'marktsegmenten', 'editMarkt'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $propositie = Propositie::findOrFail($id);

        //Update the pivot table associated with this propositie
        if ($request->has('pro_themas')) {
            $themaId = [];
            foreach ($request->get('pro_themas') as $thema) {
                $th = Thema::where('thema_name', '=', $thema)->first();
                array_push($themaId, $th->id);
            }
            $propositie->themas()->sync($themaId);
        }

        //Save uploaded files -----
        if ($request->hasFile('pro_avatar')) {
            $data['pro_avatar'] = $this->uploadFile($request, 'innovations', 'pro_avatar', $request->get('pro_name'));
        }

        if ($request->hasFile('pro_saleskit')) {
            $data['pro_saleskit'] = $this->uploadFile($request, 'documents', 'pro_saleskit', $request->get('pro_name'));
        }

        if ($request->hasFile('pro_technical_doc')) {
            $data['pro_technical_doc'] = $this->uploadFile($request, 'documents', 'pro_technical_doc', $request->get('pro_name'));
        }

        if ($request->hasFile('pro_marktinfo')) {
            $data['pro_marktinfo'] = $this->uploadFile($request, 'documents', 'pro_marktinfo', $request->get('pro_name'));
        }


        if ($request->has('pro_marktsegmenten')) {
            $markten = implode(', ', $request->get('pro_marktsegmenten'));
            $data['pro_marktsegmenten'] = $markten;
        }

        if ($request->has('pro_themas')) {
            $themas = implode(', ', $request->get('pro_themas'));
            $data['pro_themas'] = $themas;
        }


        if ($request->has('pro_references')) {
            $refs = implode(', ', $request->get('pro_references'));
            $data['pro_references'] = $refs;
        }

        $propositie->update($data);
        $propositie->reindex();

        flash('Changes made');
        return redirect('dashboard');

//        dd($propositie);
    }


    /**
     *
     */
    public function delete($id)
    {
        $propositie = Propositie::findOrFail($id);

        $admins = Admins::lists('mannr', 'id')->all();


        if (Auth::user()->hasRole('admin')) {
            $propositie->delete();

            //Unlink all related files, including avatar from upload folder --------------------------------------------------------

            Flash::success("De propositie is verwijderd");
            return redirect('dashboard');

        } else {
            Flash::error("Hier heb je geen rechten voor!");
            return redirect('dashboard');
        }


    }

    public function search()
    {

//        dd(Input::get('searchresultspage'));
        if (Input::get('keyword', null) == '') {
            return redirect()->back()->withInput();
        } else {
            //        $proposities = Propositie::search(Input::get('keyword'));
            $proposities = Propositie::searchByQuery([
                "bool" => [
                    'must' => [
                        'multi_match' => [
                            'query' => Input::get('keyword'),
                            'fields' => ['pro_themas^5', 'pro_name', 'pro_marktsegmenten', 'pro_slug', 'pro_description']
                        ],
                    ],
                    "should" => [
                        'match' => [
                            'pro_description' => [
                                'query' => Input::get('keyword'),
                                'type' => 'phrase'
                            ]
                        ]
                    ]
                ]
            ]);

            $keyword = Input::get('keyword');
            $gevonden = $proposities->totalHits();
            return view('pages.searchresult', compact('proposities', 'keyword', 'gevonden'));
        }


    }

    public function uploadFile(Request $request, $destination, $inputName, $propositieName)
    {
        if (file_exists(base_path() . '/public/uploads/' . $destination . '/' . $request->file($inputName)->getClientOriginalName())) {
            unlink(base_path() . '/public/uploads/' . $destination . '/' . $request->file($inputName)->getClientOriginalName());
        }

        $extension = $request->file($inputName)->getClientOriginalExtension(); // getting image extension
        $originalName = $request->file($inputName)->getClientOriginalName();
        $fileName = $request->get($propositieName) . '_' . $originalName . '.' . $extension; // renaming image
        // rand(11111,99999).'_'.
        $request->file($inputName)->move(base_path() . '/public/uploads/' . $destination, $fileName); //Moving to upload destination

        return base_path() . '\public/uploads/' . $destination . '/' . $fileName;
    }


}
