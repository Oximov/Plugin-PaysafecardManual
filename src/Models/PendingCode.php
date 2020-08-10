<?php

namespace Azuriom\Plugin\PaysafecardManual\Models;

use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendingCode extends Model
{
    use SoftDeletes;

    protected $table = 'paysafecard_pending_codes';

    protected $fillable = ['user_id', 'code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
