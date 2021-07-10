<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //
    function show() {
       return  Member::all() ;
    }
    function storeData(){
        $newMember = new Member();
        
        $newMember->name = 'moaad';
        $newMember->email = 'moaad@gmail.com';
        $newMember->address = 'address1';
        $newMember->save();
    }
    function oneToOne(){
        // this will get data from another table called company
        // then in the model we can use it in Member::find(1)->oneToOne;
        return $this->hasOne('App\Models\Company');
    }
    function oneToMany(){
        // this will get data from another table called company
        // then in the model we can use it in Member::find(1)->oneToMany;
        return $this->hasMany('App\Models\Company');
    }
    // route model binding
    function binding(Member $key){
        // the key is the id of the wanted record will grab it from the DB
        return $key;
    }
}
