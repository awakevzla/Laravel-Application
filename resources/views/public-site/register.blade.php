@extends('public-site')

@section('css')
    @parent
            <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset("bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css"/>

    <style>
        body {
            background: url(img/street-light.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .register {
            height: 95vh;
        }

        .input-group,
        input[type=text] {
            width: 100%;
        }

        .help-block {
            padding: 0 6px 0 0;
            color: #ff0000;
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

    @parent
    <div class="register row vertical-align">
        <div class="col-lg-12">
            {!! Form::open(array('url' => '/register','class' => 'js-validation-material form-horizontal push-10-t')) !!}
            <div class="row vertical-align">
                <div class="col-lg-4">
                    <!-- Headings Bold -->
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">{{$translator->translate("Hey there!")}}</h3>
                        </div>
                        <div class="box-body">
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
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">{{$translator->translate("Business Details")}}</h3>
                        </div>
                        <hr>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material-primary input-group">
                                        <label for="business-name">{{$translator->translate("Business Name")}}</label>
                                        {!! Form::text('business[name]', null, array('class' => 'form-control')) !!}
                                        @if($errors->first('business-name'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('business-name'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material-primary input-group">
                                        <label for="business-subdomain">{{$translator->translate("Subdomain")}}</label>
                                        {!! Form::text('business[subdomain]', null, array('class' => 'form-control')) !!}
                                        @if($errors->first('business-subdomain'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('business-subdomain'))}}</div>
                                        @else
                                            <div class="text-right">.{{$_ENV['ROOT_DOMAIN']}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="business-phone">{{$translator->translate("Phone")}}</label>
                                        {!! Form::text('business[phone]', null, array('class' => 'form-control')) !!}
                                        @if($errors->first('business-phone'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('business-phone'))}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="business-email">{{$translator->translate("Email")}}</label>
                                        {!! Form::text('business[email]', null, array('class' =>'form-control')) !!}
                                        @if($errors->first('business-email'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('business-email'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="address-country">{{$translator->translate("Country")}}</label>
                                        {!! Form::text('address[country]', null, array('class' =>'form-control')) !!}
                                        @if($errors->first('address-country'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('address-country'))}}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="address-state">{{$translator->translate("State/Province")}}</label>
                                        {!! Form::text('address[state]', null,array('class' => 'form-control')) !!}
                                        @if($errors->first('address-state'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('address-state'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="address-city">{{$translator->translate("City")}}</label>
                                        {!! Form::text('address[city]', null,
                                        array('class' => 'form-control')) !!}
                                        @if($errors->first('address-city'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('address-city'))}}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="address-postal">{{$translator->translate("Postal")}}</label>
                                        {!! Form::text('address[postal]',
                                        null, array('class' =>
                                        'form-control')) !!}
                                        @if($errors->first('address-postal'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('address-postal'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="address-street-number">{{$translator->translate("Street Number")}}</label>
                                        {!!Form::text('address[street_number]',null,array('class'=>'form-control'))!!}
                                        @if($errors->first('address-street-number'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('address-street-number'))}}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="address-street-name">{{$translator->translate("Street Name")}}</label>
                                        {!!Form::text('address[street_name]',null,array('class'=>'form-control'))!!}
                                        @if($errors->first('address-street-name'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('address-street-name'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END box body -->
                    </div>
                    <!-- END box info -->
                </div>
                <!-- END col-lg-4 -->

                <div class="col-lg-4">
                    <!-- User Details -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">{{$translator->translate("User Details")}}</h3>
                        </div>
                        <hr>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material-primary input-group">
                                        <label for="user-first-name">First Name</label>
                                        {!!Form::text('user[first_name]',null,array('class'=>'form-control'))!!}

                                        @if($errors->first('user-first-name'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('user-first-name'))}}</div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label for="user-last-name">Last Name</label>
                                        {!!Form::text('user[last_name]',null,array('class'=>'form-control'))!!}

                                        @if($errors->first('user-last-name'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('user-last-name'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label for="user-username">Username</label>
                                        {!!Form::text('user[username]',null,array('class'=>'form-control'))!!}
                                        @if($errors->first('user-username'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('user-username'))}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label for="user-email">Email</label>
                                        {!!Form::text('user[email]',null,array('class'=>'form-control'))!!}
                                        @if($errors->first('user-email'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('user-email'))}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label for="user-password">Password</label>
                                        {!!Form::password('user[password]',array('class'=>'form-control'))!!}
                                        @if($errors->first('user-password'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('user-password'))}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label for="user-confirm-password">Confirm Password</label>
                                        {!!Form::password('user[confirm_password]',array('class'=>'form-control'))!!}
                                        @if($errors->first('user-confirm-password'))
                                            <div class="help-block text-right">{{$translator->translate($errors->first('user-confirm-password'))}}</div>
                                        @else
                                            <div class="text-right">{{$translator->translate("This must match your password.")}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label><a data-toggle="modal"
                                              data-target="#modal-terms"
                                              href="#">Terms</a> <span
                                                class="text-danger">*</span></label>

                                    <div class="input-group">
                                        {!!Form::checkbox('terms', '1', false)!!}
                                        <label for="terms">&nbsp;I agree to the terms</label>
                                        @if($errors->first('terms'))
                                            <div class="help-block">{{$translator->translate($errors->first('terms'))}}</div>
                                        @endif
                                    </div>

                                    <div class="input-group">
                                        <button class="btn btn-sm btn-primary"
                                                type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END box body -->
                    </div>
                    <!-- END box info -->
                </div>
                <!-- END col-lg-4 -->

                <input type="hidden" name="_token"
                       value="{{ csrf_token() }}">

            </div>
            <!--end vert align-->
            {!! Form::close() !!}
            <!--</form>-->
        </div>
        <!-- END  col-lg-12 -->
    </div>
    <!-- END row-->
@endsection