<?php

class Adoubt extends Eloquent
{
    protected $table = 'adoubts';
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($t)
        {
            $t->created_at = date('Y-m-d H:i:s', time());
        });
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function ad()
    {
        return $this->belongsTo('Adver', 'adver_id');
    }

    public function isSolved()
    {
        return !is_null($this->answer);
    }
}
