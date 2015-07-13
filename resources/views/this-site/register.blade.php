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
            <h3 class="block-title">Hooray!</h3>
        </div>
        <div class="block-content">
            <p class="lead">Once you've got these forms filled out, we're going to generate your custom website!
            {{ Translate::getString() }}
            </p>
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
            <h3 class="block-title">Farm Details</h3>
        </div>
        <div class="block-content">

            <div class="form-group">
                <?php if($errors->first('farm-name')){ ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            <?php echo $errors->first('farm-name') ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-sm-12">
                    <div class="form-material form-material-primary input-group floating">
                        {!! Form::text('farm[name]', null, array('class' => 'form-control')) !!}
                        <label for="farm-name">Farm Name</label>
                        <div class="help-block text-right">This is a help block!</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php if($errors->first('farm-subdomain')){ ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            <?php echo $errors->first('farm-subdomain') ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-sm-12">
                    <div class="form-material input-group floating">
                        {!! Form::text('farm[subdomain]', null, array('class' => 'form-control')) !!}
                        <label for="farm-subdomain">Subdomain</label>
                        <span class="input-group-addon">.{{$_ENV['ROOT_DOMAIN']}}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control js-masked-phone" type="text" id="farm-phone" name="farm[phone]">
                        <label for="farm-phone">Phone</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="text" id="farm-email" name="farm[email]">
                        <label for="farm-email">Email</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="address-country" name="address[country]">
                        <label for="address-country">Country</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="address-state" name="address[state]">
                        <label for="address-state">State/Province</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="address-city" name="address[city]">
                        <label for="address-city">City</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="address-postal" name="address[postal]">
                        <label for="address-postal">Postal</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="address-street-number"
                               name="address[street_number]">
                        <label for="address-street-number">###</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="address-street-name" name="address[street_name]">
                        <label for="address-street-name">Street Name</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <!-- Material (floating) Register -->
    <div class="block block-themed">
        <div class="block-header bg-city-dark">
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
                    <div class="form-material input-group floating">
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
                <div class="col-sm-9">
                    <div class="form-material input-group floating">
                        <input class="form-control" type="password" id="user-confirm-password"
                               name="user[confirm_password]">
                        <label for="user-confirm-password">Confirm Password</label>
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