<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\Designation;

class EmployeeHelper
{
    
    public static function getImagePath($imgName)
    {
        $imgpath = asset('bower_components/admin-lte/dist/img/avatar04.png');

        if(! is_null($imgName)) {
            $imgpath = asset('photos/'.$imgName) ;
        }
        return $imgpath;
    }

    public static function getDesignationName($desId)
    {
        $desName = '---';
        if(! is_null($desId)) {
            $des = Designation::where('id', $desId)->select('name')->first();
            if(! empty($des)) {
                $desName = $des->name;
            }
        }

        return $desName;
    }


}
