<?php
namespace App\Models\Accounts;

use App\Components\Model;

/***
 * Class Role
 * @package App\Models\Accounts
 * @property int $id
 * @property string $name
 * @property int $level
 */
class Role extends Model
{
    const ROLES = [
        'client' => 'Client',
        'staff' => 'Staff',
    ];

    const ROLE_CLIENT = 4;

    protected $table = 'role';

    protected $fillable = [
        'name',
        'level'
    ];

}
