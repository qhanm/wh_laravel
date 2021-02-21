<?php

namespace App\Models\General;

use App\Components\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/***
 * Class Information
 * @package App\Models\General
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $email
 * @property string $phone
 * @property string $fax
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $postal_code
 */
class Information extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'information';
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'fax',
        'address',
        'city',
        'country',
        'postal_code',
    ];
}
