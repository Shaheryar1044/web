<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Challenge;
use App\ChallengeFile;
use DB;
class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('admin.challenge.index', compact('challenges'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.challenge.create');
    }
    
    public function challengeEdit($id){
        $challenges = Challenge::where('id','=',$id)->first();
        return view('admin.challenge.edit', compact('challenges'));
    }
   
    public function challengeDelete($id, Request $request){
        $challenges = Challenge::where('id','=',$id)->delete();
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Challange Deleted');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       //dd($request->all());
       $challenge = Challenge::create([
        'challenge_name'       => $request->challenge_name,
        'challenge_type'       => $request->type_of_challenge,
        'text_above_challenge' => $request->text_above_challenge,
        'text_above_challenge_en' => $request->text_above_challenge_en,
        'text_above_challenge_fr' => $request->text_above_challenge_fr,
        'hints'                => $request->challenge_hints,
        'hints_en'                => $request->challenge_hints_en,
        'hints_fr'                => $request->challenge_hints_fr,
        'hint1'                => $request->first_hint,
        'hint1_en'                => $request->first_hint_en,
        'hint1_fr'                => $request->first_hint_fr,
        'hint2'                => $request->hint2,
        'hint2_en'                => $request->hint2_en,
        'hint2_fr'                => $request->hint2_fr,
        'hint3'                => $request->hint3,
        'hint3_en'                => $request->hint3_en,
        'hint3_fr'                => $request->hint3_fr,
        'hint1_text'           => $request->text_above_first_hint,
        'hint1_text_en'           => $request->text_above_first_hint_en,
        'hint1_text_fr'           => $request->text_above_first_hint_fr,
        'hint2_text'           => $request->text_above_2nd_hint_1,
        'hint2_text_en'           => $request->text_above_2nd_hint_en,
        'hint2_text_fr'           => $request->text_above_2nd_hint_fr,
        'hint3_text'           => $request->text_above_3rd_hint,
        'hint3_text_en'           => $request->text_above_3rd_hint_en,
        'hint3_text_fr'           => $request->text_above_3rd_hint_fr,
        'lock_type'            => $request->lock,
        'final_code'           => $request->finalCode
       ]);
       if($challenge){
        foreach ($request->file('challenge_files') as $file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'_'.time().'.'.$extension;
            $upload_path = public_path('uploads/challenges/');
            $full_path = '/public/uploads/challenges/'.$fileName;
            $check = $file->move($upload_path, $fileName);
            DB::table('challenge_files')->insert(['challenge_id' =>$challenge->id, 'file_path'=> $full_path]);

        }
        
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Challenge is created.');
        return redirect()->back();
            
              
       }
            $request->session()->flash('status', 'error');
            $request->session()->flash('message', 'Failed to create new Chellange, please check your information.');
            return Redirect::back()->withInput($request->all);
           
    }
	
	public function duplicateChallange($id , Request $request){
		$challenge = Challenge::where('id','=',$id)->first();
		$challengeNew = Challenge::where('id','=',$id)->create([
            'challenge_name'       => $challenge->challenge_name,
            'challenge_type'       => $challenge->challenge_type,
            'text_above_challenge' => $challenge->text_above_challenge,
            'hints'                => $challenge->hints,
            'hint1'                => $challenge->hint1,
            'hint2'                => $challenge->hint2,
            'hint3'                => $challenge->hint3,
            'hint1_text'           => $challenge->hint1_text,
            'hint2_text'           => $challenge->hint2_text,
            'hint3_text'           => $challenge->hint3_text,
            'lock_type'            => $challenge->lock_type,
            'final_code'           => $challenge->final_code,
            'hints_en'             => $challenge->hints_en,
            'hints_fr'             => $challenge->hints_fr,
            'hint1_en'             => $challenge->hint1_en,
            'hint1_fr'             => $challenge->hint1_fr,
            'hint2_en'             => $challenge->hint2_en,
            'hint2_fr'             => $challenge->hint2_fr,
            'hint3_en'             => $challenge->hint3_en,
            'hint3_fr'             => $challenge->hint3_fr,
            'hint1_text_en'        => $challenge->hint1_text_en,
            'hint1_text_fr'        => $challenge->hint1_text_fr,
            'hint2_text_en'        => $challenge->hint2_text_en,
            'hint2_text_fr'        => $challenge->hint2_text_fr,
            'hint3_text_en'        => $challenge->hint3_text_en,
            'hint3_text_fr'        => $challenge->hint3_text_fr,
            'text_above_challenge_en' => $challenge->text_above_challenge_en,
            'text_above_challenge_fr' => $challenge->text_above_challenge_fr,
       ]);
        if($challengeNew){
            $files = ChallengeFile::where('challenge_id', $challenge->id)->get();
            foreach ($files as $f) {
               ChallengeFile::create([
                    'challenge_id' => $challengeNew->id,
                    'file_path' =>$f->file_path,
               ]);
            }
        }
		$request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Challenge is Duplicated.');
        return redirect()->back();
	}
    
     public function challengeUpdate($id , Request $request){
       Challenge::where('id','=',$id)->update([
            'challenge_name'       => $request->challenge_name,
            'challenge_type'       => $request->type_of_challenge,
            'text_above_challenge' => $request->text_above_challenge,
            'text_above_challenge_en' => $request->text_above_challenge_en,
            'text_above_challenge_fr' => $request->text_above_challenge_fr,
            'hints'                => $request->challenge_hints,
            'hints_en'                => $request->challenge_hints_en,
            'hints_fr'                => $request->challenge_hints_fr,
            'hint1'                => $request->first_hint,
            'hint1_en'                => $request->first_hint_en,
            'hint1_fr'                => $request->first_hint_fr,
            'hint2'                => $request->hint2,
            'hint2_en'                => $request->hint2_en,
            'hint2_fr'                => $request->hint2_fr,
            'hint3'                => $request->hint3,
            'hint3_en'                => $request->hint3_en,
            'hint3_fr'                => $request->hint3_fr,
            'hint1_text'           => $request->text_above_first_hint,
            'hint1_text_en'           => $request->text_above_first_hint_en,
            'hint1_text_fr'           => $request->text_above_first_hint_fr,
            'hint2_text'           => $request->text_above_2nd_hint_1,
            'hint2_text_en'           => $request->text_above_2nd_hint_en,
            'hint2_text_fr'           => $request->text_above_2nd_hint_fr,
            'hint3_text'           => $request->text_above_3rd_hint,
            'hint3_text_en'           => $request->text_above_3rd_hint_en,
            'hint3_text_fr'           => $request->text_above_3rd_hint_fr,
            'lock_type'            => $request->lock,
            'final_code'           => $request->finalCode
       ]);
		 //dd($request->all());
       if($request->hasFile('challenge_files')) {
		   ChallengeFile::where('challenge_id','=', $id)->delete();
            foreach ($request->file('challenge_files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111,99999).'_'.time().'.'.$extension;
                $upload_path = public_path('uploads/challenges/');
                $full_path = '/public/uploads/challenges/'.$fileName;
                $check = $file->move($upload_path, $fileName);
                DB::table('challenge_files')->insert(['challenge_id' =>$id, 'file_path'=> $full_path] );
            }
       }
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Challenge Updated.');
		 if($request->save_back == 1) {
		 	return redirect('/admin/challenges');
		 } else {
		 	return redirect()->back();
		 }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(challenge $challenge)
    {
        //
    }
}
