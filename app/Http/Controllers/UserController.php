<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    function index(Request $request){
        $user = User::where('email', $request->email)->first();

        // return $request->all();

        // if(!$user) return 'no user with the email: ' . $request->email;
        // if(!Hash::check($request->password, $user->password)){
        //     return 'the password is wrong';
        // }

        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => ['These credentials do not match our records']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    function getData() {
        // $items = Http::get('https://reqres.in/api/users?page=1');


        return view('users', ['items' => $items['data']]);
    }
    function testRequest(Request $req) {
        return $req->input();
    }
    function loginUser(Request $req){
        print_r($req->input());
        $user = new User();
        $data = $req->input();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->save();
        session()->put('user', $user['name']);
        
        return redirect('/profile');
    }

    function show() {
        $data = User::paginate(5);
        return view('users', ['items' => $data]);
    }

    function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/list');
    }
    function showData($id){
        $user = User::findOrFail($id);
        return view('edit', ['user' => $user]);
    }
    function update(Request $req){
        $user = User::findOrFail($req->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->save();
        return redirect('/list');
    }

    function validateApi(Request $req){
        $rules = array(
            'email' => 'required',
            'password' => 'required|min:3|max:6'
        );

        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 401) ;
        }else{
            return "ok";
        }
    }
}
