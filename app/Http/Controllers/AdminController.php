<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use App\Models\Activity_Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        $users = User::all();
        return view('admin/dashboard',['users'=>$users,
                    'title' => 'dashboard'
    ]);
    }

    public function user(){
        $users = User::all();
        $division = Division::all();
        $totalUser = User::whereNotNull('nik')->count();
        $totalVisitors = Activity_Log::whereNotNull('id')->count();
        return view('admin/user',compact('division', 'totalUser', 'totalVisitors'), ['users'=>$users,
                    'title' => 'user'
    ]);
    }

    public function create(Request $request){
        // return $request->all();
        // die;
        $request->validate([
            'nik' => ['required', 'max:5'],
            'username' => ['required'],
            'division_id' => ['required'],
        ]);
        $defaultPassword = '12345678';
        $hashedPassword = Hash::make($defaultPassword);
        User::create([
            'username'=> $request->username,
            'nik'=> $request->nik,
            'division_id'=> $request->division_id,
            'password'=> $hashedPassword
        ]);
        if($request->session()){ 
            return redirect('/admin/user')->with('success', 'Data Berhasil di Tambahkan!');
        }else{
            return redirect('/admin/user')->with('error', 'Data Gagal di Tambahkan!');
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user');
    }
    public function edit($id){
        $users = User::find($id);
        $division = Division::all();
        return view('admin/user-edit', compact('division', 'users'),[
            'title' => 'user'
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nik' => ['required', 'max:5'],
            'username' => ['required'],
            'division_id' => ['required'] 
        ]);
        $user = User::find($id);
        $user->update([
            'username'=> $request->username,
            'nik'=> $request->nik,
            'division_id'=> $request->division_id
        ]);
        if($request->session()){ 
            return redirect('/admin/user')->with('success', 'Data Berhasil di Edit!');
        }else{
            return redirect('/admin/user')->with('error', 'Data Gagal di Edit!');
        }
        
    }
        
    }
    

