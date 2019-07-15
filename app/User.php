<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Collection;
use Lexx\ChatMessenger\Traits\Messagable;
use Hash;
use App\Models\Messages;
/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Messagable;

    protected $fillable = ['name', 'email', 'username','password', 'remember_token','status','add_by'];

    protected $hidden = [
        'password', 'api_token','remember_token'
 ];

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
function messages ()
{
  return $this->hasMany(Messages::class);
}


}
