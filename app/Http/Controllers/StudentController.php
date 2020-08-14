<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\StudentImage;
use App\DegreeMaster;
use App\Degree;

use Image;

class StudentController extends Controller
{
    public function index(){

    	$students = Student::all();

    	return view('index')->with('students', $students);
    }


    public function create(){

    	$degree_masters = DegreeMaster::all();

    	
    	return view('create')->with('degree_masters', $degree_masters);
    }

    public function store(Request $request){


    	$this->validate($request, [

    		'name'  => 'required|string|max:50',
    		'phone'  => 'required',
    		'fname'  => 'required|string|max:50',
    		'mname'  => 'required|string|max:50',
    		'image'  => 'image',

    		/*'degree'  => 'required|string',
    		'point'  => 'required',*/

    	],

    	[
    		'name.required' => 'Please enter a name',
    		'phone.required' => 'Please enter a phone number',
    		'fname.required' => 'Please enter father name',
    		'mname.required' => 'Please enter mother name',
    		'image.image' => 'Please select a valid image',
    	]

    );

    	/*dd('submitted');*/
    	$student = new Student;
    	$student->name = $request->name;
    	$student->phone = $request->phone;
    	$student->fname = $request->fname;
    	$student->mname = $request->mname;
    	//$student->degree = $request->degree;
    	//$student->point = $request->point;
    	//$student->image = $request->image;

    	$student->save();

    	

    	$degree_master = new DegreeMaster;



    	$degree = new Degree;
    	$degree->student_id = $student->id;
    	
    	$degree->degree_id = $request->degree_id;
    	$degree->point = $request->point;

    	$degree->save();
    	


    	if (count($request->student_image)>0) {

    		foreach ($request->student_image as $image) {
    		
    		//if ($request->hasFile('student_image')) {
    		
    		//$image = $request->file('student_image');
    		$img = time(). '.' .$image->getClientOriginalExtension();
    		$location = public_path('images/students/'.$img);
    		Image::make($image)->save($location);

    		$student_image = new StudentImage;
    		$student_image->student_id = $student->id;
    		$student_image->image = $img;
    		$student_image->save();
    			//}
    		}
    	}

    	

    	session()->flash('success', 'Student has been added successfully!');

    	return redirect()->route('create');
    }
}
