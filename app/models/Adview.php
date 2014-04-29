<?php

class Adview extends Eloquent
{
    protected $table = 'adviews';
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($aview)
        {
            $aview->view_time = date('Y-m-d H:i:s', time());
        });
    }
}
