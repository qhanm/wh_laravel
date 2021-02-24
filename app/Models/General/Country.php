<?php
namespace App\Models\General;

use App\Components\Model;

/***
 * Class Country
 * @package App\Models\General
 * @property string $code
 * @property string $name
 */
class Country extends Model
{
    protected $table = 'country';

    public $timestamps = false;

    protected $fillable = [
        'name', 'code'
    ];
}
