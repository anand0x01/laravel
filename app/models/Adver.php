<?php

class Adver extends Eloquent
{
    protected $table = 'advers';
    public $timestamps = true;

    protected $fillable = array('*');

    public static $sectors = array(
        'Automobiles & Components',
        'Banks',
        'Capital Goods',
        'Commercial & Professional Services',
        'Consumer Durables & Apparel',
        'Diversified Financials',
        'Food & Drug Retailing',
        'Food Beverage & Tobacco',
        'Health Care Equipment & Services',
        'Hotels Restaurants & Leisure',
        'Household & Personal Products',
        'Pharmaceuticals & Biotechnology',
        'Real Estate',
        'Retailing',
        'Semiconductors & Semiconductor Equipment',
        'Software & Services',
        'Technology Hardware & Equipment',
        'Telecommunication Services',
        'Transportation',
        'Utilities',
        'Energy',
    );

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function details()
    {
        return $this->hasOne('Advernormals', 'adver_id');
    }

    public function aviews()
    {
        return $this->hasMany('Adview', 'adver_id');
    }

    public function responses()
    {
        return $this->hasMany('Aresponse', 'adver_id');
    }

    public function doubts()
    {
        return $this->hasMany('Adoubt', 'adver_id');
    }

    public function scopeListable($query)
    {
        return $query->where('confirmed', 1)
                    ->where('is_viewable', 1)
                    ->where('is_sold', 0)
                    ->where('created_at', '>', \Carbon\Carbon::now()->subYear());
    }

    public function getDegree()
    {
        $degree = '';
        if($this->details->degree_ug)
            $degree .= ', Undergraduate';
        if($this->details->degree_g)
            $degree .= ', Graduate';
        if($this->details->degree_phd)
            $degree .= ', PHD';
        $degree[0] = '';
        return $degree;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function sourceType()
    {
        if($this->ad_type == 1)
            return 'Company';
        elseif($this->ad_type == 2)
            return 'Non - Profit';
    }

    public function fcreatedOn()
    {
        return $this->created_at->format('F d, Y');
    }

    public function getStatus()
    {
        $msg = array();
        if($this->confirmed)
            $msg[] = 'Confirmed';
        else
            $msg[] = 'Project Flagged';
        if($this->is_viewable)
            $msg[] = 'Viewable';
        else
            $msg[] = 'Hidden';
        if($this->is_sold)
            $msg = array('Sold');
        else
            $msg[] = 'Unsold';
        return implode(',', $msg);
    }

    public function formattedDesc($lt = 0)
    {
        if($lt){
            return '<p>' . preg_replace('/[\r\n]+/', '</p><p>', Str::limit($this->details->description, $limit = $lt, $end = '...')) . '</p>';
        }
        return '<p>' . preg_replace('/[\r\n]+/', '</p><p>', $this->details->description) . '</p>';
    }

    public function getImageUrl()
    {
        if(is_null($this->details->image))
            return 'media/img/Project-2013_2.png';
        return $this->details->image;
    }

    public function getSlugData()
    {
        return array($this->id, substr(Str::slug($this->getTitle()), 0, 50));
    }

    public function sectorName()
    {
        return self::$sectors[$this->details->sector_id];
    }

    public function projectType()
    {
        $exist = array('type_sm' => 'Sales and Marketing', 'type_mr' => 'Market Research', 'type_pd' => 'Product Development');
        $outcome = array();
        foreach ($exist as $index => $value) {
            if($this->details->{$index})
                $outcome[] = $value;
        }
        return implode(', ', $outcome);
    }

    public function getContact()
    {
        return $this->details->phone;
    }

    public function getDegrees()
    {
        $exist = array('degree_ug' => 'Undergraduate', 'degree_g' => 'Graduate', 'degree_phd' => 'PHD');
        $outcome = array();
        foreach ($exist as $index => $value) {
            if($this->details->{$index})
                $outcome[] = $value;
        }
        return implode(', ', $outcome);
    }

    public function createdTill()
    {
        return $this->created_at->diffForHumans(\Carbon\Carbon::now());
    }

    public function studentsNo()
    {
        return $this->details->students;
    }

    public function hasManageRights()
    {
        if($this->user_id == Auth::user()->id)
            return true;
        return false;
    }

    public function activeTill()
    {
        return $this->created_at->addYear()->diffForHumans(\Carbon\Carbon::now());
    }

    public function isVerified()
    {
        return $this->confirmed == 1;
    }

    public function isActive()
    {
        return $this->is_viewable == 1;
    }

    public function isSold()
    {
        return $this->is_sold == 1;
    }

    public function getActions()
    {
        $buttons = array(array('bname' => 'Delete', 'url' => '#', 'extra' => null));
        if($this->isVerified()) {
            if($this->isActive())
                $buttons[] = array('bname' => 'Pause', 'url' => '#', 'extra' => null);
            else
                $buttons[] = array('bname' => 'Mark Active', 'url' => '#', 'extra' => null);

            if(!$this->isSold())
                $buttons[] = array('bname' => 'Mark Sold', 'url' => '#', 'extra' => null);
            return $buttons;
        }
        $buttons[] = array('special' => true, 'messages' => 'Your project has not been validated yet, It will sonn be validated and activated.Thanks for your patience.');
        return $buttons;
    }
}
