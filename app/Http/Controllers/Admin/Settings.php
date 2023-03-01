<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Setting;

class Settings extends Controller
{
    // Get list from Settings from database
    function getAPI(){
        
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();

        if($settings == ''){
            $settings['school'] = '0';
            $settings['room'] = '0';
            $settings['student'] = '0';
        }else{}

        return view('admin/api',['settings'=>$settings]);
    }


    // Get list from Settings from database
    function getSetting(){
        
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();

        if($settings == ''){
            $settings['user_id'] = '0';
            $settings['name'] = 'Plateform Name';
            $settings['copyrights'] = 'Company';
        }else{}

        return view('admin/settings',['settings'=>$settings]);
    }

    
    //Check validation and add Settings
    function addSetting(Request $req){

        $req->validate([
            'name'=>'required | max:225',
            'school'=>'required | max:225',
            'room'=>'required | max:225',
            'student'=>'required | max:225',
            'dateortime'=>'required | max:225',
            'list_name'=>'required | max:225',
            'copyrights'=>'required | max:225',
        ]);

        $setting= new Setting;
        $setting->user_id=Auth::user()->id;
        $setting->name=$req->name;
        $setting->logo=$req->logo.'';
        $setting->school=$req->school;
        $setting->room=$req->room;
        $setting->student=$req->student;        
        $setting->dateortime=$req->dateortime;
        $setting->list_name=$req->list_name;
        $setting->copyrights=$req->copyrights.'';
        $setting->ip_address=request()->ip();
        $setting->save();

        return redirect('/admin/settings');
    }

    //Check validation and update product
    function updateSetting(Request $req){

        $req->validate([
            'name'=>'required | max:225',
            'school'=>'required | max:225',
            'room'=>'required | max:225',
            'student'=>'required | max:225',
            'dateortime'=>'required | max:225',
            'list_name'=>'required | max:225',
        ]);

        $setting= Setting::find($req->id);
        $setting->user_id=Auth::user()->id;
        $setting->name=$req->name;
        $setting->logo=$req->logo.'';
        $setting->school=$req->school;
        $setting->room=$req->room;
        $setting->student=$req->student;        
        $setting->dateortime=$req->dateortime;
        $setting->list_name=$req->list_name;
        $setting->copyrights=$req->copyrights.'';
        $setting->ip_address=request()->ip();
        $setting->save();

        return redirect('/admin/settings');

    }

}
