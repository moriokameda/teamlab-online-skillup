<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as IAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;

class SocialAccounts extends Model implements IAuthenticatable
{
    //
    use Authenticatable,Notifiable;
    /**
     * テーブルの主キー
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'social_user_id',
        'user_name',
        'user_avatar',
    ];

}
