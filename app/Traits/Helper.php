<?php

namespace App\Traits;

trait Helper
{
    public function uploadImage($request)
    {
        $path = $request->file('logo')->store('public');
        return $path;
    }
}
