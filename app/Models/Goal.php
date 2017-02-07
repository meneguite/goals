<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    protected $dates = [ 'start', 'finish' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'current', 'goal', 'start', 'finish', 'type', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = date("Y-m-d H:i:s", strtotime($value));
    }

    public function setFinishAttribute($value)
    {
        $this->attributes['finish'] = date("Y-m-d H:i:s", strtotime($value));
    }
}
