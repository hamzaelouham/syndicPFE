<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Validator;

use App\Models\User;

use Illuminate\Support\Facades\Hash;


class Admincontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('is.admin');
    }
    /*
    *  @return void
    */    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashbord');   
    }

    public function allRole()
    {
        $all = User::all();

        return view('admin.Role')->with('all',$all);
    }

    public function EditRole(Request $request, $id)
    {   
        $isFind = User::findOrFail($id);

        return view('admin.update')->with('isFind',$isFind);
    }

    public function update(Request $request, $id)
    {   

        $user = User::find($id);
        $user->name  = $request->input("name");
        $user->email = $request->input("email");
        $user->role  = $request->input("role");
        
        if($request->input('approve') != null)
        { $user->approve = 1; }
        else
        { $user->approve = 0;}

        $user->update();
        
        return redirect('/all-menbre-role');
    }

    public function delete($id)
    {
       $user = User::findOrFail($id);  
       
       $user->delete();
       
      return redirect('/all-menbre-role');

    }
    public function display()
    {
        return  view("admin.addUser");
    }

    public function addUser(Request $request)
    {
        $valide = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        if($valide->passes())
        {
            $user = new User();
    
            $defaultpassword = "123456789";
    
            $user->name = $request->name;
    
            $user->role = $request->role;
            
            $user->email = $request->email;
            
            $user->password = Hash::make($defaultpassword);
            
            $user->save();
    
            return response()->json(['ok'=>true],200);
        
        }
        
           return response()->json(['ok'=>false],409); 
                    
    }

}
