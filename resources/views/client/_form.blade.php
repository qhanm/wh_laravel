<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('client.index') }}" class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @if($errors->has('error'))
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                    {{ $errors->first('error') }}
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6">
                            {!! \App\Helpers\HtmlHelper::input($errors, 'email') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'username') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'password', 'password') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'first_name') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'middle_name') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'last_name') !!}
                        </div>

                        <div class="col-md-6">
                            {!! \App\Helpers\HtmlHelper::input($errors, 'address') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'postal_code') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'city') !!}

                            {!! \App\Helpers\HtmlHelper::select($countries, 'country', (string)old('country')) !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'phone') !!}
                            {!! \App\Helpers\HtmlHelper::input($errors, 'fax') !!}
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
