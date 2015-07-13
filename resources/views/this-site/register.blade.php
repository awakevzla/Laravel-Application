@extends('this-site')

@section('css')
@parent
<link href="{{{ asset('/assets/css/oneui.min.css') }}}" rel="stylesheet">
<style>
    .form-material {
        width: 100%;
    }
</style>
@endsection

@section('content')
@parent
{!! Form::open(array('url' => '/register','class' => 'js-validation-material form-horizontal push-10-t')) !!}
<div class="col-lg-4">
    <!-- Headings Bold -->
    <div class="block block-themed">
        <div class="block-header bg-city-dark">
            <ul class="block-options">
                <li>
                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                </li>
            </ul>
            <h3 class="block-title">{{$translator->translate("Yes!")}}</h3>
        </div>
        <div class="block-content">
            <p class="lead">
                {{$translator->translate("Once you've got these forms filled out, we're going to generate your custom website!")}}
            </p>

            <p>IP Address: {{ Request::getClientIp() }}</p>
        </div>
    </div>
    <!-- END Headings Bold -->
</div>

<div class="col-lg-4">
    <!-- Material (floating) Register -->
    <div class="block block-themed">
        <div class="block-header bg-primary">
            <ul class="block-options">
                <li>
                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                </li>
            </ul>
            <h3 class="block-title">{{$translator->translate("Farm Details")}}</h3>
        </div>
        <div class="block-content">

            <div class="form-group">
                @if($errors->first('farm-name'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        {{$translator->translate($errors->first('farm-name'))}}
                    </div>
                </div>
                @endif
                <div class="col-sm-12">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('farm[name]', null, array('class' => 'form-control')) !!}
                        <label for="farm-name">{{$translator->translate("Farm Name")}}</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if($errors->first('farm-subdomain'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        {{$translator->translate($errors->first('farm-subdomain'))}}
                    </div>
                </div>
                @endif
                <div class="col-sm-12">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('farm[subdomain]', null, array('class' => 'form-control')) !!}
                        <label for="farm-subdomain">{{$translator->translate("Subdomain")}}</label>
                        <span class="input-group-addon">.{{$_ENV['ROOT_DOMAIN']}}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if($errors->first('farm-phone') | $errors->first('farm-email'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        @if($errors->first('farm-phone'))
                        {{$translator->translate($errors->first('farm-phone'))}}
                        @else
                        {{$translator->translate($errors->first('farm-email'))}}
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('farm[phone]', null, array('class' => 'form-control js-masked-phone')) !!}
                        <label for="farm-phone">{{$translator->translate("Phone")}}</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('farm[email]', null, array('class' => 'form-control')) !!}
                        <label for="farm-email">{{$translator->translate("Email")}}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                @if($errors->first('address-country') | $errors->first('address-state'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        @if($errors->first('address-country'))
                        {{$translator->translate($errors->first('address-country'))}}
                        @else
                        {{$translator->translate($errors->first('address-state'))}}
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('address[country]', null, array('class' => 'form-control')) !!}
                        <label for="address-country">{{$translator->translate("Country")}}</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('address[state]', null, array('class' => 'form-control')) !!}
                        <label for="address-state">{{$translator->translate("State/Province")}}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                @if($errors->first('address-city') | $errors->first('address-postal'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        @if($errors->first('address-city'))
                        {{$translator->translate($errors->first('address-city'))}}
                        @else
                        {{$translator->translate($errors->first('address-postal'))}}
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('address[city]', null, array('class' => 'form-control')) !!}
                        <label for="address-city">{{$translator->translate("City")}}</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('address[postal]', null, array('class' => 'form-control')) !!}
                        <label for="address-postal">{{$translator->translate("Postal")}}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                @if($errors->first('address-street-number') | $errors->first('address-street-name'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        @if($errors->first('address-street-number'))
                        {{$translator->translate($errors->first('address-street-number'))}}
                        @else
                        {{$translator->translate($errors->first('address-street-name'))}}
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-sm-4">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('address[street_number]', null, array('class' => 'form-control')) !!}
                        <label for="address-street-number">{{$translator->translate("#")}}</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('address[street_name]', null, array('class' => 'form-control')) !!}
                        <label for="address-street-name">{{$translator->translate("Street Name")}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <!-- Material (floating) Register -->
    <div class="block block-themed">
        <div class="block-header bg-success">
            <ul class="block-options">
                <li>
                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                </li>
            </ul>
            <h3 class="block-title">User Details</h3>
        </div>
        <div class="block-content">

            <div class="form-group">
                <div class="col-sm-6">
                    <div class="form-material form-material-primary input-group floating">
                        <input class="form-control" type="text" id="user-first-name" name="user[first_name]">
                        <label for="user-first-name">First Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="text" id="user-last-name" name="user[last_name]">
                        <label for="user-last-name">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="text" id="user-username" name="user[username]">
                        <label for="user-username">Username</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="text" id="user-email" name="user[email]">
                        <label for="user-email">Email</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="user-password" name="user[password]">
                        <label for="user-password">Password</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="user-confirm-password"
                               name="user[confirm_password]">
                        <label for="user-confirm-password">Confirm Password</label>

                        <div class="help-block text-right">{{$translator->translate("This must match your password.")}}</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <label><a data-toggle="modal" data-target="#modal-terms" href="#">Terms</a> <span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-xs-12">
                    <label class="css-input css-checkbox css-checkbox-primary" for="val-terms2">
                        <input type="checkbox" id="val-terms2" name="val-terms2" value="1"><span></span> I agree to the
                        terms
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                </div>
            </div>

        </div>
    </div>
    <!-- END Material (floating) Register -->

</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<!--</form>-->

{!! Form::close() !!}

@endsection

@section('js')
<script src="{{{ asset('/assets/js/oneui.min.js') }}}"></script>

<!-- Page JS Plugins -->
<script src="{{{ asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}}"></script>

<!-- Page JS Code -->
<script>
    $(function () {
        App.initHelpers(['masked-inputs']);
    });
</script>
@endsection