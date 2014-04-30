<?php

class Mtmplist extends Eloquent
{
    protected $table = 'tmplists';
    public $timestamps = false;

    protected $guarded = array();

    public function owner()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo('User', 'student_id', 'id');
    }
}