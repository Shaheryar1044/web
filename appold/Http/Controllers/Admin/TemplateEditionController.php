<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\TemplateEdition;
use App\Template;
class TemplateEditionController extends Controller
{
    //
    public function index(){
        $editionTemps = TemplateEdition::with('regardingTemplate')->Has('regardingTemplate')->get();
		//dd($editionTemps);
        return view('admin.template.tempedition.index', compact('editionTemps'));
    }
    public function create(){
    	$templates = Template::all();
    	return view('admin.template.tempedition.create', compact('templates'));
    }
    public function editTemplateEdition($id){
    	$edition = TemplateEdition::where('id','=',$id)->first();
    	$templates = Template::all();
    	return view('admin.template.tempedition.edit', compact('templates','edition'));
    }
    public function deleteTemplateEdition($id){
    	$edition = TemplateEdition::where('id','=',$id)->first();
    	//Template::where('id','=',$edition->regarding_template_id)->delete();
    	$edition->delete();
    	return back();
    }
    public function updateTemplateEdition($id , Request $request){
		if($request->hasFile('image')) {
			$fileType = 'image'; 
			$extension = $request->file('image')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_path = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = $request->file('image')->move($upload_path, $fileName);
		}
		$pp = TemplateEdition::where('id','=',$id)->first();
    	TemplateEdition::where('id','=',$id)->update([
			'name' 					=> $request->name,
			'regarding_template_id' => $request->regarding_temp,
			'image' 				=>isset( $full_path) ?  $full_path : $pp->image,
		]);
		$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'Template Editon Updated.');
		return redirect('/admin/template/editions');
    }
    public function store(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name'  => 'required',
    		'regarding_temp' => 'required',
    		'image' =>  'required|mimes:jpeg,jpg,png',

    	]);
    	if($validator->fails()){

    		return back()->withInput()->withErrors($validator);
    	}else{
    		$edition = TemplateEdition::create([
    			'name' 					=> $request->name,
    			'regarding_template_id' => $request->regarding_temp,
    			'image' 				=> $this->uploadHelper('image'),
    			

    		]);
    		if($edition){
				$request->session()->flash('status', 'success');
				$request->session()->flash('message', 'Template Editon is created.');
				return redirect()->back();
			}else {
				$request->session()->flash('status', 'error');
				$request->session()->flash('message', 'Failed to create new Template Edition, please check your information.');
				return Redirect::back()->withInput($request->all);
			}
    	}
    	
    }
}
