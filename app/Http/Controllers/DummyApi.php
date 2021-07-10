<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;

class DummyApi extends Controller
{
    //
    function getData(){
        return ['name' => 'moaad', 'age' => 21];
    }
    function getList(){
        $members = Member::all();
        return $members;
    }
    function add(Request $req){
        
      if($req->address == null)return 'address is null';

        $newMember = new Member();
        $newMember->name = $req->name;
        $newMember->email = $req->email;
        $newMember->address = $req->address;
        $result = $newMember->save();
        if($result){
            return ['msg' => 'data was saved'] ;
        }else{
            return ['msg' => 'data was not saved'];
        }
    }
    function edit(Request $req){
        $member = Member::findOrFail($req->id);
        $member->name = $req->name;
        $member->email = $req->email;
        $member->address = $req->address;
        $result = $member->save();
        if($result){
            return ['msg' => 'member was  updated successfully'];
        }else{
            return ['msg' => 'error'];
        }

    }
    function destroy(Request $req){
       
        $member = Member::findOrfail($req->id);
        $result = $member->delete();
        if($result){
            return ['msg' => 'member was deleted successfully'];
        }else{
            return ['msg' => 'error deleting the member'];
        }
    }
    function search($searchTerm){
        $items = Member::where('name', "like" , "%" .  $searchTerm . "%")->get();
        return $items;
    }
    
}
