<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','body','photocover','credit_id'];
    protected $table = 'notices';
    protected $primaryKey = 'id';

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}
