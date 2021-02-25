<?php
    use App\Helpers\HtmlHelper;
    /** @var array $roles */
?>

@extends('authentication.layout')

@section('content')
    <div class="login-box-body" id="container">
        <p class="login-box-msg">Sign in to start your session</p>
        <form id="frmLogin" action="{{ route('authentication.checkLogin') }}" method="post" data-pjax=''>
            @csrf
            {!! HtmlHelper::inputIcon($errors, 'username', 'glyphicon glyphicon-user', 'text') !!}
            {!! HtmlHelper::inputIcon($errors, 'password', 'glyphicon glyphicon-lock', 'password') !!}
            <div class="form-group @if($errors->has('role')) has-error @endif">
                <label>Login with</label>
                <select name="role" class="form-control select2" style="width: 100%;">
                    @foreach($roles as $key => $role)
                        @if(old('role') == $key)
                            <option value="{{ $key }}" selected>{{ $role }}</option>
                        @else
                            <option value="{{ $key }}">{{ $role }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('role'))
                    <span class="help-block">{{ $errors->first('role') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember_token"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="#">I forgot my password</a><br>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
        $('.select2').select2();

        $(document).on('submit', 'form[data-pjax]', function(event) {
            event.preventDefault();
            //console.log($.pjax.submit(event, '#container'));
            $.pjax.submit(event, '#container')
        })
    </script>
@endsection
