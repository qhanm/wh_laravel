<?php
namespace App\Models\Accounts;

use App\Models\General\Information;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/***
 * Class Staff
 * @package App\Models\Accounts
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $remember_token
 * @property int $fk_information
 * @property int $fk_role
 * @property string $created_at
 * @property string $updated_at
 */
class Staff extends Authenticatable
{
    use Notifiable;

    protected $table = 'staff';

    protected $guarded = 'staff';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function information()
    {
        return $this->hasOne(Information::class, 'id', 'fk_information');
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'fk_role');
    }
}
