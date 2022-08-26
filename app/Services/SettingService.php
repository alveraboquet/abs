<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Str;

class SettingService
{
    public static function getSetting($name)
    {
        $setting =   Setting::firstWhere('name', $name)->pluck('value');
        return $setting;
    }
}
