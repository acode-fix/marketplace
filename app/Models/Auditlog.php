<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditlog extends Model
{
    use HasFactory;
    //protected $guarded = [];

    protected $fillable = [
        'action', 'view_type', 'username', 'IP_address', 'date', 'user_id'
    ];
    // public $timestamps = false;
    // protected $appends = ['dateHumanize','json_data'];

    // private $userInstance = "\App\Models\User";

    static function getLog() {
        $userInstance = config('user-activity.model.user');
        if(!empty($userInstance))
        return $userInstance;
    }

    

    // public function getDateHumanizeAttribute()
    // {
    //     return Carbon::parse($this->attributes['log_date'])->diffForHumans();
    // }

    // public function getJsonDataAttribute()
    // {
    //     return json_decode($this->data,true);
    // }

    // public function user()
    // {
    //     return $this->belongsTo($this->userInstance);
    // }
}
