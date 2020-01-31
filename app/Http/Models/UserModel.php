<?php
/**
 * @author benyq
 * @emil 1520063035@qq.com
 * create at 2020/1/30
 * description:
 */


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{

    public $timestamps = false;

    protected $table = 't_user';

    public static function login()
    {
        $user = UserModel::query()->first();
        $user['token'] = 'bearer ' . auth('api')->login($user);
        return $user;
    }

    public static function list()
    {
        return self::query()->get()->toArray();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}