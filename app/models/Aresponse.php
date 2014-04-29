<?php

class Aresponse extends Eloquent
{
    protected $table = 'aresponses';
    public $timestamps = true;
    protected $guarded = array();

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function ad()
    {
        return $this->belongsTo('Adver', 'adver_id');
    }
}
