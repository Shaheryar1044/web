<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\TemplateEdition;
use App\Template;
use App\FinalTemplate;

class TemplateController extends Controller
{
    //
    public function index(){
        $templates = Template::all();
		//dd($templates);
        return view('admin.template.index', compact('templates')); 
     }
    
	public function finalEditions(){
		return view('admin.template.finalTemplate.create'); 
	}
	
    public function create(){

    	return view('admin.template.create');
    }
    public function editTemplate($id){
        $temp = Template::where('id','=',$id)->first();
    	return view('admin.template.edit',compact('temp'));
    }
    public function updateTemplate($id , Request $request){
		//dd($request->all());
		if($request->hasFile('image')) {
			$fileType = 'image'; 
			$extension = $request->file('image')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_path = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('image')->move($upload_path, $fileName);
		}
		if($request->hasFile('audio')) {
			$fileType = 'audio';
			$extension = $request->file('audio')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_pathA = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('audio')->move($upload_path, $fileName);
		}
		if($request->hasFile('video')) {
			$fileType = 'video';
			$extension = $request->file('video')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_pathB = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('video')->move($upload_path, $fileName);
		}
		$pp = Template::where('id','=',$id)->first();
            Template::where('id','=',$id)->update([
    			'name' 				=> $request->name,
				'name_en' 				=> $request->name_en,
				'name_fr' 				=> $request->name_fr,
    			'image' 			=> isset($full_path) ? $full_path : $pp->image,
    			'audio' 			=> isset($full_pathA) ? $full_pathA : $pp->audio,
				'video'             => isset($full_pathB) ? $full_pathB : $pp->video,
    			'part_of_series'	=> $request->is_part,
				'type'	=> $request->type,
    			'series_no' 		=> $request->series,
				'template_text'     =>$request->template_text,
				'template_text_en'     =>$request->template_text_en,
				'template_text_fr'     =>$request->template_text_fr
    		]);
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Template Updated.');
			return redirect()->back();
    }
    public function deleteTemplate($id, Request $request){
        TemplateEdition::where('regarding_template_id','=',$id)->delete();
        Template::where('id','=',$id)->delete();
    	$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'Template Deleted.');
		return redirect()->back();
    }
    
    public function store(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name'  => 'required',
    		//'image' =>  'required|mimes:jpeg,jpg,png',
    		//'audio' =>  'required|mimes:mp3,webm',

    	]);
    	if($validator->fails()){

    		return back()->withInput()->withErrors($validator);
    	}else{
			if($request->hasFile('audio')) {
				$file = $this->uploadHelper('audio');
			}
			if($request->hasFile('image')) {
				$image = $this->uploadHelper('image');
			}
			//dd($request->all());
			if($request->hasFile('video')) {
				$fileType = 'video';
				$extension = $request->file('video')->getClientOriginalExtension();
				$fileName = rand(11111,99999).'_'.time().'.'.$extension;
				$upload_path = public_path('uploads/templates/'.$fileType);
				$full_pathB = '/public/uploads/templates/'.$fileType.'/'.$fileName;
				$check = $request->file('video')->move($upload_path, $fileName);
			}
    		$template = Template::create([
    			'name' 				=> $request->name,
				'name_en' 				=> $request->name_en,
				'name_fr' 				=> $request->name_fr,
    			'image' 			=> isset($image) ? $image : '',
    			'audio' 			=> isset($file) ? $file : '',
				'video'             => isset($full_pathB) ? $full_pathB : '',
    			'part_of_series'	=> $request->is_part,
				'type'	=> $request->type,
    			'series_no' 		=> $request->series,
				'template_text'     =>$request->template_text,
				'template_text_en'     =>$request->template_text_en,
				'template_text_fr'     =>$request->template_text_fr
    		]);
    		if($template){
				$request->session()->flash('status', 'success');
				$request->session()->flash('message', 'Template is created.');
				return redirect()->back();
			}else {
				$request->session()->flash('status', 'error');
				$request->session()->flash('message', 'Failed to create new Template, please check your information.');
				return Redirect::back()->withInput($request->all);
			}
    	}
    	
    }
	
	public function storefinalTemplate(Request $request){
		//dd($request->all());
    	$validator = Validator::make($request->all(),[
			'name'  => 'required',
    		//'image' =>  'required|mimes:jpeg,jpg,png',
    		//'audio' =>  'required|mimes:mp3,webm',
			//'final_template_text'  => 'required',
    	]);
    	if($validator->fails()){

    		return back()->withInput()->withErrors($validator);
    	}else{
			if($request->hasFile('audio')) {
				$file = $this->uploadHelper('audio');
			}
			if($request->hasFile('image')) {
				$image = $this->uploadHelper('image');
			}
			if($request->hasFile('video')) {
				$fileType = 'video';
				$extension = $request->file('video')->getClientOriginalExtension();
				$fileName = rand(11111,99999).'_'.time().'.'.$extension;
				$upload_path = public_path('uploads/templates/'.$fileType);
				$full_pathB = '/public/uploads/templates/'.$fileType.'/'.$fileName;
				$check = $request->file('video')->move($upload_path, $fileName);
			}
    		$template = FinalTemplate::create([
    			'name' 				=> $request->name,
    			'image' 			=> isset($image) ? $image : '',
    			'audio' 			=> isset($file) ? $file : '',
				'video' 			=> isset($full_pathB) ? $full_pathB : '',
				'type'   => $request->type,
    			'score_btn' 		=> $request->score_btn,
				'final_template_text'     => $request->final_template_text,
				'final_template_text_en' => $request->final_template_text_en,
				'final_template_text_fr' => $request->final_template_text_fr
    		]);
    		if($template){
				$request->session()->flash('status', 'success');
				$request->session()->flash('message', 'Final Template is created.');
				return redirect()->back();
			}else {
				$request->session()->flash('status', 'error');
				$request->session()->flash('message', 'Failed to create new Template, please check your information.');
				return Redirect::back()->withInput($request->all);
			}
    	}
    }
	
	public function editfinalTemplate($id) {
		$finalTemp = FinalTemplate::where('id','=',$id)->first();
		return view('admin.template.finalTemplate.edit',[
			'finalTemp' => $finalTemp
		]);
	}
	
	public function indexfinalTemplate(){
		$temp = FinalTemplate::all();
		return view('admin.template.finalTemplate.index',[
			'templates' => $temp
		]);
	}
	
	public function updatefinalTemplate($id, Request $request) {
		//dd($request->score_btn);
		if($request->hasFile('image')) {
			$fileType = 'image'; 
			$extension = $request->file('image')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_path = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('image')->move($upload_path, $fileName);
		}
		if($request->hasFile('audio')) {
			$fileType = 'audio';
			$extension = $request->file('audio')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_pathA = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('image')->move($upload_path, $fileName);
		}
		if($request->hasFile('video')) {
			$fileType = 'video';
			$extension = $request->file('video')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_pathB = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('video')->move($upload_path, $fileName);
		}
		$templateP = FinalTemplate::where('id','=',$id)->first();
		$template = FinalTemplate::where('id','=',$id)->update([
			'name' 				=> $request->name,
			'image' 			=> isset($full_path) ? $full_path : $templateP->image,
			'audio' 			=> isset($full_pathA) ? $full_pathA : $templateP->audio,
			'video' 			=> isset($full_pathB) ? $full_pathB : $templateP->video,
			'type'   => $request->type,
			'score_btn' 		=> $request->score_btn,
			'final_template_text'     => $request->final_template_text,
			'final_template_text_en' => $request->final_template_text_en,
			'final_template_text_fr' => $request->final_template_text_fr
		]);
		$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'Final Template is Updated.');
		return redirect()->back();
	}
	
	public function deletefinalTemplate($id , Request $request) {
		$finalTemp = FinalTemplate::where('id','=',$id)->delete();
		$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'Final Template is Deleted.');
		return redirect()->back();
	}
}
