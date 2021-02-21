<?php
namespace App\Helpers;

use Illuminate\Support\ViewErrorBag;

class HtmlHelper
{
    static function inputIcon(ViewErrorBag $errors, string $attribute, string $icon, string $placeholder = '') : string
    {
        return '
            <div class="form-group has-feedback '. ($errors->has($attribute) ? 'has-error' : "") .'">
                <input type="text" class="form-control" name="'. $attribute .'" value="'. old($attribute) .'" placeholder="'. $placeholder .'">
                <span class="'. $icon .' form-control-feedback"></span>
                '.($errors->has($attribute) ? '<span class="help-block">'. $errors->first($attribute) .'</span>' : '').'
            </div>
        ';
    }
}
