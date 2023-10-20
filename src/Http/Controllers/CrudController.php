<?php

namespace Mustafiz\CrudGenerator\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mustafiz\CrudGenerator\Models\CrudGenerator;

class CrudController extends Controller
{
    public function index(){
       $data_list =  CrudGenerator::orderBy('id','DESC')->paginate(10);
        return view('crud-generator::index',compact('data_list'));
    }
    public function create(){
        return view('crud-generator::create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|max:100|unique:crud_generators',
            'phone' => 'required|max:20|unique:crud_generators',
            'address' => 'required',
        ]);
        $create = CrudGenerator::create($request->all());
        if($create){
            return redirect()->route('crud.index')->with('success', 'Entry created successfully.');
        }else{
            return view('crud-generator::create');
        }
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
            'address' => 'required',
        ]);
        $up = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $update = CrudGenerator::where('id',$id)->update($up);
        if($update){
            return redirect()->route('crud.index')->with('success', 'Entry update successfully.');
        }else{
            return redirect()->back();
        }
    }
    public function edit($id){
       $edit_data = CrudGenerator::find($id);
        return view('crud-generator::edit',compact('edit_data'));
    }
    public function delete($id){
        CrudGenerator::find($id)->delete();
        return redirect()->back()->with('success','Entry delete successfully');
    }

}
