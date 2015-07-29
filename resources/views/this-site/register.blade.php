@extends('this-site')

@section('css')
@parent
<link href="{{{ asset('/assets/css/oneui.min.css') }}}" rel="stylesheet">
<style>
    .help-block {
        color:#ff0000;
    }

#bg {
position: fixed;
top: 0;
left: 0;
}

.bgwidth {
width: 100%;
}

.bgheight {
height: 100%;
}

.form-material {
width: 100%;
}

@media (min-width: 1200px) {
.vertical-align {
display: flex;
align-items: center;
}
}
</style>
@endsection

@section('content')
<img src="{{{ asset('/assets/img/background-street.jpg') }}}" id='bg'>
@parent

{!! Form::open(array('url' => '/register','class' => 'js-validation-material form-horizontal push-10-t')) !!}

<div class="row vertical-align">
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
<h3 class="block-title">{{$translator->translate("Business Details")}}</h3>
</div>
<!-- end header-->
<div class="block-content">

<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('business[name]', null, array('class' => 'form-control')) !!}
<label for="business-name">{{$translator->translate("Business Name")}}</label>
@if($errors->first('business-name'))
<div class="help-block text-right">{{$translator->translate($errors->first('business-name'))}}</div>
@endif
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('business[subdomain]', null, array('class' =>
'form-control')) !!}
<label for="business-subdomain">{{$translator->translate("Subdomain")}}</label>
@if($errors->first('business-subdomain'))
<div class="help-block text-right">{{$translator->translate($errors->first('business-subdomain'))}}</div>
@else
<div class="help-block text-right">.{{$_ENV['ROOT_DOMAIN']}}</div>
@endif
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('business[phone]', null, array('class' => 'form-control
js-masked-phone')) !!}
<label for="business-phone">{{$translator->translate("Phone")}}</label>
@if($errors->first('business-phone'))
<div class="help-block text-right">{{$translator->translate($errors->first('business-phone'))}}</div>
@endif
</div>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('business[email]', null, array('class' =>
'form-control')) !!}
<label for="business-email">{{$translator->translate("Email")}}</label>
@if($errors->first('business-email'))
<div class="help-block text-right">{{$translator->translate($errors->first('business-email'))}}</div>
@endif
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('address[country]', null, array('class' =>
'form-control')) !!}
<label for="address-country">{{$translator->translate("Country")}}</label>
@if($errors->first('address-country'))
<div class="help-block text-right">{{$translator->translate($errors->first('address-country'))}}</div>
@endif
</div>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('address[state]', null,
array('class' => 'form-control')) !!}
<label for="address-state">{{$translator->translate("State/Province")}}</label>
@if($errors->first('address-state'))
<div class="help-block text-right">{{$translator->translate($errors->first('address-state'))}}</div>
@endif
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('address[city]', null,
array('class' => 'form-control')) !!}
<label for="address-city">{{$translator->translate("City")}}</label>
@if($errors->first('address-city'))
<div class="help-block text-right">{{$translator->translate($errors->first('address-city'))}}</div>
@endif
</div>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!! Form::text('address[postal]',
null, array('class' =>
'form-control')) !!}
<label for="address-postal">{{$translator->translate("Postal")}}</label>
@if($errors->first('address-postal'))
<div class="help-block text-right">{{$translator->translate($errors->first('address-postal'))}}</div>
@endif
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 clearfix">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!!Form::text('address[street_number]',null,array('class'=>'form-control'))!!}
<label for="address-street-number">{{$translator->translate("#")}}</label>
@if($errors->first('address-street-number'))
<div class="help-block text-right">{{$translator->translate($errors->first('address-street-number'))}}</div>
@endif
</div>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<div class="form-material form-material-primary input-group floating">
{!!Form::text('address[street_name]',null,array('class'=>'form-control'))!!}
<label for="address-street-name">{{$translator->translate("Street Name")}}</label>
@if($errors->first('address-street-name'))
<div class="help-block text-right">{{$translator->translate($errors->first('address-street-name'))}}</div>
@endif
</div>
</div>
</div>
</div>
</div>
<!-- end container -->

</div>
</div>
</div>


<div class="col-lg-4">
<!-- Material (floating) Register -->
<div class="block block-themed">
<div class="block-header bg-success">
<ul class="block-options">
<li>
<button type="button"
data-toggle="block-option"
data-action="content_toggle"></button>
</li>
</ul>
<h3 class="block-title">
User Details</h3>
</div>
<div class="block-content">

<div class="form-group">
<div class="col-sm-6">
<div class="form-material form-material-primary input-group floating">
<input class="form-control"
type="text"
id="user-first-name"
name="user[first_name]">
<label for="user-first-name">First
Name</label>
</div>
</div>
<div class="col-sm-6">
<div class="form-material input-group floating">
<input class="form-control"
type="text"
id="user-last-name"
name="user[last_name]">
<label for="user-last-name">Last
Name</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-6">
<div class="form-material input-group floating">
<input class="form-control"
type="text"
id="user-username"
name="user[username]">
<label for="user-username">Username</label>
</div>
</div>
<div class="col-sm-6">
<div class="form-material input-group floating">
<input class="form-control"
type="text"
id="user-email"
name="user[email]">
<label for="user-email">Email</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<div class="form-material input-group floating">
<input class="form-control"
type="password"
id="user-password"
name="user[password]">
<label for="user-password">Password</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<div class="form-material input-group floating">
<input class="form-control"
type="password"
id="user-confirm-password"
name="user[confirm_password]">
<label for="user-confirm-password">Confirm
Password</label>

<div class="help-block text-right">{{$translator->translate("This must match your password.")}}</div>
</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<label><a data-toggle="modal"
data-target="#modal-terms"
href="#">Terms</a> <span
class="text-danger">*</span></label>
</div>
<div class="col-xs-12">
<label class="css-input css-checkbox css-checkbox-primary"
for="val-terms2">
<input type="checkbox"
id="val-terms2"
name="val-terms2"
value="1"><span></span>
I agree to
the
terms
</label>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<button class="btn btn-sm btn-primary"
type="submit">
Submit
</button>
</div>
</div>

</div>
</div>
<!-- END Material (floating) Register -->

</div>
<input type="hidden" name="_token"
value="{{ csrf_token() }}">
<!--</form>-->

</div>
<!--end vert align-->
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
$(window).load(function () {
var theWindow = $(window),
$bg = $("#bg"),
aspectRatio = $bg.width() / $bg.height();

function resizeBg() {
if ((theWindow.width() / theWindow.height()) < aspectRatio) {
$bg
.removeClass()
.addClass('bgheight');
} else {
$bg
.removeClass()
.addClass('bgwidth');
}

}
theWindow.resize(resizeBg).trigger("resize");
});
</script>

@endsection