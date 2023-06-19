<?php

namespace App\Http\Controllers\api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        if($employees->count() < 1){
            return response()->json([
                'message'=>'No record found',
                'status'=>404    
            ],404);
        }
        return response()->json([
            'employees'=>$employees,
            'status'=>200
        ],200);
    }

    public function store(Request $request){
        $employee = Employee::create($request->all());
        if($employee){
            return response()->json([
                'message'=>'Employee added successfully',
                'status'=>201    
            ],201); 
        }else{
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>500    
            ],500);
        }
    }
    public function show($id){
        $employee = Employee::find($id);
        if($employee){
            return response()->json([
                'employee'=> $employee,
                'status'=>200    
            ],200);
        }else{
            return response()->json([
                'message'=>'No Such record',
                'status'=>404    
            ],404);
        }
        
    }
    public function destroy($id){
        $employee = Employee::find($id);
        $employee->delete();
        if($employee){
            return response()->json([
                'message'=>'record successfully deleted',
                'status'=>200    
            ],200);
        }
        else{
            return response()->json([
                'message'=>'No Such record',
                'status'=>404    
            ],404);
        }
        
    }
    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $employee->update($request->all());
        if($employee){
            return response()->json([
                'message'=>'Employee updated successfully',
                'status'=>201    
            ],201); 
        }else{
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>500    
            ],500);
        }
    }


}
