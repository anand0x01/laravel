<?php

class Student extends Eloquent
{
    protected $table = 'students';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
