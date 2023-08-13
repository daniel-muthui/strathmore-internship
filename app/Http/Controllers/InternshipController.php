<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Crypt;
use File;

class InternshipController extends Controller
{
    public function index()
    {
        $companies = Internship::all();
        return view('internship.index', ['company' => $companies]);
    }

    public function create()
    {
        return view('internship.create');
    }

    public function editAction(Request $request)
    {
        
        $data = $request->data;

        $update = Internship::where('id', '=', $request->id)->update($data[0]);
        if ($update) {
            return response('success');
        }else{
            return response('fail');
        }
    }

    public function deleteAction(Request $request)
    {
        $delete = Internship::where('id', '=', $request->id)->delete();
        if ($delete) {
            return back()->with('success', 'Deleted Successfully');
        }
        return back()->with('fail', 'Modification failed');
    }

    public $FILE_NAME = "avatar.jpg";

    public function FileUpload(Request $request, $inputName, $fieldname='file', $path=''){
        $file = ($path != 'Images/')?$request->file($inputName):$request->file('file_data')[$inputName];

        $fileRename = ($path != 'Images/')?$request->user()->id.'_'.$fieldname.'.'.$file->extension(): $fieldname.'.'.$file->extension();

        $filGet = public_path('Storage/'.$path.$fileRename);
        if(File::exists($filGet)){
            File::delete($filGet);
        }
        $file->move('storage/'.$path,$fileRename);

        return $fileRename;
    }
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'position' => 'required|string',
            'description' => 'required|string',
            'job_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required|string',
            'application_deadline' => 'required|date',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $Intern = new Internship();
    
         // Initialize imageUrl variable
        // $img =[];
        // if ($request->hasFile('image_url')) {
        //     $image = $request->file('image_url');
        //     $imagePath = public_path('/images');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
    
        //     // Store the uploaded image in the defined path
        //     $image->move($imagePath, $imageName);
        //     // $this-save();
        //     // $image->storeAs($imagePath, $imageName, 'public');
        //     // Intern->image_url = $imageName;
        // }
        
        $this->FILE_NAME = $this->FileUpload($request, 'image', 'companyLogofile', $path='images');
        $data = [
            'company_name' => $request->company_name,
            'position' => $request->position,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'application_deadline' => $request->application_deadline,
            'image_url' => $this->FILE_NAME,
        ];
        
        if (Internship::create($data)) {
            return redirect()->route('internship.index');
        }
    }
}


