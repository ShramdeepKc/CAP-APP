<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class AppHelpers
{
    public static function getAppNameById($appId)
    {
        // Retrieve the name of the app from the database using the app ID
        $appName = DB::table('apps')->where('id', $appId)->value('name_en');

        return $appName;
    }
   
}
?>