<?php
namespace App\Models\Accounts;

use App\Models\General\Information;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/***
 * Class Client
 * @package App\Models\Accounts
 * @property int $id
 * @property int $fk_information
 * @property int $fk_role
 * @property string $username
 * @property string $password
 * @property string $remember_token
 * @property string $no
 * @property string $internal_ref
 * @property Information $information
 * @property string $created_at
 * @property string $updated_at
 */
class Client extends Authenticatable
{
    use Notifiable;

    protected $table = 'client';
    protected $guarded = 'client';

    protected $fillable = [
        'fk_information',
        'fk_role',
        'username',
        'password',
        'remember_token',
        'no',
        'internal_ref',
        'information',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'fk_role');
    }

    public function information()
    {
        return $this->hasOne(Information::class, 'id', 'fk_information');
    }

}
