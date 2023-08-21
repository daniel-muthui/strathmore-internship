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
    public function index(Request $request)
    {
        $category = $request->query('category');

        $query = Internship::query();

        if ($category) {
            $query->where('category', $category);
        }

        $companies = $query->get();

        return view('internship.index', [
            'companies' => $companies,
            'category' => $category,
        ]);

        // $companies = Internship::all();
        // return view('internship.index', ['company' => $companies]);
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

    public function FileUpload(Request $request, $inputName, $fieldname = 'file', $path = 'Images/')
    {
        $file = ($path != 'Images/') ? $request->file($inputName) : $request->file('file_data')[$inputName];

        // Generate a unique filename using user ID and timestamp
        $fileRename = ($path != 'Images/') ? $request->user()->id . '_' . $fieldname . '_' . time() . '.' . $file->extension() : $fieldname . '_' . time() . '.' . $file->extension();

        $fileGet = public_path('Storage/' . $path . $fileRename);
        if (File::exists($fileGet)) {
            File::delete($fileGet);
        }
        $file->move('storage/' . $path, $fileRename);

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
            'category' => 'required|string',
            'application_deadline' => 'required|date',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $Intern = new Internship();
    
        // Generate a unique image filename
        $imageFileName = $this->FileUpload($request, 'image', 'companyLogofile', $path = 'images');
    
        $data = [
            'company_name' => $request->company_name,
            'position' => $request->position,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'category' => $request->category,
            'application_deadline' => $request->application_deadline,
            'image_url' => $imageFileName,
        ];
    
        $Intern->create($data);
    
        return redirect()->route('internship.index')
            ->with('success', 'Internship created successfully.');
    
    
        
        // if (Internship::create($data)) {
        //     return redirect()->route('internship.index');
        // }
    }
        public function fetchDescription(Request $request)
    {
        $description = ''; // Fetch the description data from the database based on your model
        return response()->json(['required_skills' => $description]);
    }
}


