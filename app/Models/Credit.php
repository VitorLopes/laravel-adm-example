<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credit extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $table = 'credits';
    protected $primaryKey = 'id';

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

}
