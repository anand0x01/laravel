<?php namespace shub;

use Input;
use Image;
use Str;

class FormHandler
{
    public static function uploadImage($name, $wid = 200)
    {
        if(Input::hasFile($name))
        {
            $file = Input::file($name);
            $tdir = '/media/uploads/' . date('Y') . '/' . date('m') . '/' . date('d');
            $ctpath = public_path() . $tdir;
            if(!file_exists($ctpath))
                mkdir($ctpath, 0777, true);
            $tdir = $tdir . '/' . Str::quickRandom(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file->getRealPath())->widen($wid)->save(public_path() . $tdir, 88);
            return $tdir;
        }
        else
        {
            return null;
        }
    }

}
