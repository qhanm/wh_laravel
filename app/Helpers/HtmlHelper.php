<?php
namespace App\Helpers;

use Illuminate\Support\ViewErrorBag;

class HtmlHelper
{
    static function inputIcon(ViewErrorBag $errors, string $attribute, string $icon, string $type = 'text', string $placeholder = '') : string
    {
        if(empty($placeholder)){
            $placeholder = 'Enter ' . StringHelper::parseAttributeToString($attribute);
        }
        return '
            <div class="form-group has-feedback '. ($errors->has($attribute) ? 'has-error' : "") .'">
                <input type="'. $type .'" class="form-control" name="'. $attribute .'" value="'. old($attribute) .'" placeholder="'. $placeholder .'">
                <span class="'. $icon .' form-control-feedback"></span>
                '.($errors->has($attribute) ? '<span class="help-block">'. $errors->first($attribute) .'</span>' : '').'
            </div>
        ';
    }

    static function input(ViewErrorBag $errors, string $attribute, string $type = 'text',string $name = '',string $placeholder = '') : string
    {
        if(empty($name)){
            $name = StringHelper::parseAttributeToString($attribute);
        }

        if(empty($placeholder)){
            $placeholder = 'Enter ' . $name;
        }

        return '
            <div class="form-group has-feedback '. ($errors->has($attribute) ? 'has-error' : "") .'">
                <label for="'. $attribute .'">'.$name.'</label>
                <input type="'.$type.'" class="form-control" id="'.$attribute.'" name="'. $attribute .'" value="'. old($attribute) .'" placeholder="'. $placeholder .'">
                '.($errors->has($attribute) ? '<span class="help-block">'. $errors->first($attribute) .'</span>' : '').'
            </div>
        ';
    }

    public static function select(array $data, string $name, string $selected = '', bool $isSelect2 = true) : string
    {
        $select2 = '';
        if($isSelect2){
            $select2 = 'select2';
        }
        $html = '<select name="'.$name.'" class="form-control '.$select2.'" style="width: 100%;">';
        if(count($data) > 0)
        {
            foreach ($data as $k => $v)
            {
                if($selected == $k){
                    $html .= '<option value="'.$k.'" selected>'.$v.'</option>';
                }else{
                    $html .= '<option value="'.$k.'">'.$v.'</option>';
                }
            }
        }
        $html .= '</select>';
        return '
            <div class="form-group has-feedback ">
                <label for="postal_code">'. StringHelper::parseAttributeToString($name) .'</label>
                '.$html.'
            </div>
        ';
    }

    ##
    ## Base action view, edit, delete
    static function renderAction(string $route, string $primaryKey,array $actions = []) : string
    {
        if(empty($actions)) return '';

        $html = '';

        foreach($actions as $action)
        {
            $icon = '';
            switch ($action)
            {
                case 'view':
                    $icon = 'fa fa-fw fa-eye';
                    break;
                case 'edit':
                    $icon = 'fa fa-fw fa-edit';
                    break;
                case 'delete':
                    $icon = 'fa fa-fw fa-trash-o';
                    break;
            }

            $html .= '<a href="'. sprintf('%s/%s/%s', $route, $action, $primaryKey) .'">
                <i class="'.$icon.'"></i>
            </a>';
        }
        return $html;
    }
}
