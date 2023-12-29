<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Traits\Common;
class CarController extends Controller
{
    use Common;
  // private $columns =['title', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // return dd($request->request);
       //$car = new Car();
      // $car->title = $request->title;
      // $car->description = $request->description;
       //if(isset($request->published)){
       // $car->published= 1 ;
      // }else{
       // $car->published= 0;
      // }
      // $car->save();
       //return 'Data added successfully';
       //$data=$request->only($this->columns);
       $messages=$this->messages();
       $data=$request->validate([
        'title'=>'required|string|max:50',
        'description'=> 'required|string',
        'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');    
        $data['image'] = $fileName;
       $data['published']= isset($request->published);
       car::create($data);
       return redirect('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('showcar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('updatecar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages=$this->messages();
       $data=$request->validate([
        'title'=>'required|string|max:50',
        'description'=> 'required|string',
        'image' => [Rule::requiredIf(function () use ($id){

            if (!empty(Car::find($id)->image)) {
      
               return false;
            }
      
              return true;
      
           }),'mimes:png,jpg,jpeg|max:2048'],
        ], $messages);
        $data['published']= isset($request->published);
       if ($request->hasFile('image')){
           $fileName = $this->uploadFile($request->image, 'assets/images');    
            $data['image'] = $fileName;
            // بيمسح من ع السيرفر الصورة بس لازم اتاكد انها مش موجودة في حتي تانية
            unlink("assets/images/" . $request->oldImage);
       }
        car::where('id', $id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        car::where('id', $id)->delete();
        return redirect('cars');
    }

    public function trashed()
    {
       $cars= car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }
    public function forceDelete(string $id)
    {
        car::where('id', $id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id)
    {
        car::where('id', $id)->restore();
        return redirect('cars');
    }
    public function messages(){
        return[
            'title.required'=>'العنوان مطلوب',
            'title.string'=>'Should be string',
            'description.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
         ];

    }
}
