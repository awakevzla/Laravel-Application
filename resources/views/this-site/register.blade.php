@extends('this-site')

@section('css')
    @parent
    <link href="{{{ asset('/assets/css/oneui.min.css') }}}" rel="stylesheet">
@endsection

@section('content')
    @parent
    <div class="col-lg-4">
        <!-- Headings Bold -->
        <div class="block block-themed">
            <div class="block-header bg-city-dark">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">Hooray!</h3>
            </div>
            <div class="block-content">
                <p class="lead">Once you've got these form filled out, we're going to generate your custom website!</p>
            </div>
        </div>
        <!-- END Headings Bold -->
    </div>

    <div class="col-lg-4">
        <!-- Material (floating) Register -->
        <div class="block block-themed">
            <div class="block-header bg-city-dark">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">Farm Details</h3>
            </div>
            <div class="block-content">
                <form class="js-validation-material form-horizontal push-10-t" action="base_forms_validation.html" method="post">
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material input-group floating">
                                <input class="form-control" type="text" id="farm-name" name="farm[name]">
                                <label for="val-username2">Farm Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material input-group floating">
                                <input class="form-control" type="text" id="farm-subdomain" name="farm[subdomain]">
                                <label for="register6-account">Subdomain</label>
                                <span class="input-group-addon">.example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material input-group floating">
                                <input class="form-control" type="password" id="val-password2" name="val-password2">
                                <label for="val-password2">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material input-group floating">
                                <input class="form-control" type="password" id="val-confirm-password2" name="val-confirm-password2">
                                <label for="val-confirm-password2">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <select class="form-control" id="val-skill2" name="val-skill2">
                                    <option value="">Please select</option>
                                    <option value="html">HTML</option>
                                    <option value="css">CSS</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="ruby">Ruby</option>
                                    <option value="php">PHP</option>
                                    <option value="asp">ASP.NET</option>
                                    <option value="python">Python</option>
                                    <option value="mysql">MySQL</option>
                                </select>
                                <label for="val-skill2">Best Skill</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material input-group floating">
                                <input class="form-control" type="text" id="val-website2" name="val-website2">
                                <label for="val-website2">Website</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material input-group floating">
                                <input class="form-control" type="text" id="val-digits2" name="val-digits2">
                                <label for="val-digits2">Digits</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" id="val-number2" name="val-number2" placeholder="3.0">
                                <label for="val-number2">Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" id="val-range2" name="val-range2" placeholder="3">
                                <label for="val-range2">Range [1, 5]</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label><a data-toggle="modal" data-target="#modal-terms" href="#">Terms</a> <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-xs-12">
                            <label class="css-input css-checkbox css-checkbox-primary" for="val-terms2">
                                <input type="checkbox" id="val-terms2" name="val-terms2" value="1"><span></span> I agree to the terms
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material (floating) Register -->
    </div>
@endsection

@section('js')
    <script src="{{{ asset('/assets/js/oneui.min.js') }}}"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/base_forms_validation.js"></script>
@endsection