@extends(AdminCore())
@section('content')
    <style>
        .datepicker {
            width: fit-content;
        }
    </style>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/jquery-multi-select/css/multi-select{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{url('orbscope/admin')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <script src="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="{{url(AdminPath().'/customer')}}">{{trans('orbscope.customers')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>{{$title}}</span>
            </li>
        </ul>
    </div>

    <div class='row'>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <div>
                            <div class="dao-eyebrow">{{ trans('orbscope.customers') }}</div>
                            <span class="caption-subject bold font-dark">{{$title}}</span>
                        </div>
                    </div>

                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{url(AdminPath().'/customer')}}"
                           data-toggle="tooltip" title="{{trans('orbscope.show-all')}} {{trans('orbscope.customer')}}"
                           aria-label="{{trans('orbscope.show-all')}} {{trans('orbscope.customer')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('orbscope.full-screen')}}"
                           title="{{trans('orbscope.full-screen')}}"
                           aria-label="{{trans('orbscope.full-screen')}}">
                        </a>
                        <a style="width: auto;" class="btn btn-circle btn-icon-only btn-default" href="{{ url()->previous() }}" data-toggle="tooltip" title="{{trans('orbscope.back')}}">
                            <i class="fa fa-arrow-left"></i> {{trans('orbscope.back')}}
                        </a>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['files'=>true,'route'=>'customer.store','class'=>'dao-form']) !!}

                    <div class="dao-form-grid">
                        <!-- Name -->
                        <div class="dao-field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="name">
                                {{trans('orbscope.name')}} <span class="required" aria-required="true">*</span>
                            </label>
                            {!! Form::text('name',old('name'),['class'=>'form-control','id'=>'name','required'=>'required','placeholder'=>trans('orbscope.name')]) !!}
                            <i class="fa fa-spinner fa-spin loading hidden"></i>
                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <!-- Customer Type -->
                        <div class="dao-field{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="type">
                                {{trans('orbscope.customer_type')}} <span class="required" aria-required="true">*</span>
                            </label>
                            <select class="form-control" data-placeholder="{{trans('orbscope.customer_type')}}" required id="type" name="type">
                                <option value="">{{trans('orbscope.choose')}}...</option>
                                <option {{old('type')=='user'?'selected':''}} value="user">{{trans('orbscope.user')}}</option>
                                <option {{old('type')=='owner'?'selected':''}} value="owner">{{trans('orbscope.owner')}}</option>
                                <option {{old('type')=='guard'?'selected':''}} value="guard">{{trans('orbscope.guard')}}</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
                            @endif
                        </div>

                        <!-- Email -->
                        <div class="dao-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="email">{{trans('orbscope.email')}}</label>
                            {!! Form::email('email',old('email'),['class'=>'form-control','id'=>'email','placeholder'=>trans('orbscope.email')]) !!}
                            @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>

                        <!-- Identity ID -->
                        <div class="dao-field{{ $errors->has('id_number') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="id_number">{{trans('orbscope.identy_id')}}</label>
                            {!! Form::text('id_number',old('id_number'),['class'=>'form-control','id'=>'id_number','placeholder'=>trans('orbscope.identy_id')]) !!}
                            <i class="fa fa-spinner fa-spin loading hidden"></i>
                        </div>

                        <!-- Nationality -->
                        <div class="dao-field{{ $errors->has('nationality') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="nationality">{{trans('orbscope.nationality')}}</label>
                            {!! Form::text('nationality',old('nationality'),['class'=>'form-control','id'=>'nationality','placeholder'=>trans('orbscope.nationality')]) !!}
                        </div>

                        <!-- Passport ID -->
                        <div class="dao-field{{ $errors->has('passport_id') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="passport_id">{{trans('orbscope.passport_id')}}</label>
                            @if(auth()->user()->type=='admin')
                                {!! Form::text('passport_id',old('passport_id'),['class'=>'form-control','id'=>'passport_id','placeholder'=>trans('orbscope.passport_id')]) !!}
                            @else
                                {!! Form::text('passport_id',old('passport_id'),['class'=>'form-control','id'=>'passport_id','placeholder'=>trans('orbscope.passport_id')]) !!}
                            @endif
                            <i class="fa fa-spinner fa-spin loading hidden"></i>
                        </div>

                        <!-- ID Expiration Date -->
                        <div class="dao-field{{ $errors->has('id_expiration_date') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="id_expiration_date">{{trans('orbscope.id_expiration_date')}}</label>
                            {!! Form::text('id_expiration_date',old('id_expiration_date'),['class'=>'form-control date-picker','id'=>'id_expiration_date','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}
                        </div>

                        <!-- Passport Expiration Date -->
                        <div class="dao-field{{ $errors->has('passport_expiration_date') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="passport_expiration_date">{{trans('orbscope.passport_expiration_date')}}</label>
                            {!! Form::text('passport_expiration_date',old('passport_expiration_date'),['class'=>'form-control date-picker','id'=>'passport_expiration_date','data-date-format'=>'yyyy-mm-dd','placeholder'=>trans('orbscope.date')]) !!}
                            <i class="fa fa-spinner fa-spin loading hidden"></i>
                        </div>

                        <!-- Phone -->
                        <div class="dao-field{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="dao-field-label" for="phone">
                                {{trans('orbscope.phone')}} <span class="required" aria-required="true">*</span>
                            </label>
                            {!! Form::text('phone',old('phone'),['class'=>'form-control','id'=>'phone','required'=>'required','placeholder'=>trans('orbscope.phone')]) !!}
                            <i class="fa fa-spinner fa-spin loading hidden"></i>
                            @if ($errors->has('phone'))
                                <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                            @endif
                        </div>

                        <div class="dao-field dao-field-full" style="margin-top: 4px;">
                            <div class="dao-section-label" style="margin: 0;">
                                <span>{{ trans('orbscope.documents') }}</span>
                            </div>
                        </div>

                        <!-- Owner Bank Accounts (Conditionally revealed when type == owner) -->
                        <div class="dao-field dao-field-full owner_bank hidden">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-university"></i> {{trans('orbscope.bank_account')}}
                                    </div>
                                    <div class="tools"></div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>{{trans('orbscope.bank_account_number')}}</th>
                                                <th>{{trans('orbscope.bank_name')}}</th>
                                                <th>x</th>
                                            </tr>
                                            </thead>
                                            <tbody class="new_service">
                                            <tr>
                                                <td><input type="text" class="form-control" name="bank_account[]"></td>
                                                <td>
                                                    <select class="form-control" name="bank_id[]">
                                                        <option value=""></option>
                                                        @foreach(\App\Models\Bank::all() as $b)
                                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td style="padding-top: 15px;"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <a id="add_bankacount" class="btn btn-icon-only green" title="{{trans('orbscope.add')}}">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ID Image Upload Box -->
                        <div class="dao-field">
                            <label class="dao-field-label" for="logo">
                                {{trans('orbscope.id_image')}}
                                @if(auth()->user()->type!='admin') <span class="required" aria-required="true">*</span> @endif
                            </label>
                            <div class="dao-upload-zone">
                                <input type="file" class="dao-upload-native" name="id_image" @if(auth()->user()->type!='admin') required @endif id="logo">
                                <span class="dao-upload-icon"><i class="fa fa-cloud-upload"></i></span>
                                <span class="dao-upload-meta">
                                    <span class="dao-upload-hint">{{ trans('orbscope.choose_file_hint') }}</span>
                                    <span class="dao-upload-filename" data-empty="{{ trans('orbscope.no_file_chosen') }}">{{ trans('orbscope.no_file_chosen') }}</span>
                                </span>
                            </div>
                        </div>

                        <!-- Passport Image Upload Box -->
                        <div class="dao-field">
                            <label class="dao-field-label" for="passport_image">
                                {{trans('orbscope.passport_image')}}
                                @if(auth()->user()->type!='admin') <span class="required" aria-required="true">*</span> @endif
                            </label>
                            <div class="dao-upload-zone">
                                <input type="file" class="dao-upload-native" @if(auth()->user()->type!='admin') required @endif name="passport_image" id="passport_image">
                                <span class="dao-upload-icon"><i class="fa fa-id-card-o"></i></span>
                                <span class="dao-upload-meta">
                                    <span class="dao-upload-hint">{{ trans('orbscope.choose_file_hint') }}</span>
                                    <span class="dao-upload-filename" data-empty="{{ trans('orbscope.no_file_chosen') }}">{{ trans('orbscope.no_file_chosen') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions dao-form-actions">
                        <button type="submit" class="btn green dao-btn-gold">
                            <i class="fa fa-check"></i> {{trans('orbscope.add')}}
                        </button>
                        <a href="{{ url()->previous() }}" class="btn default dao-btn-outline">
                            {{trans('orbscope.cancel')}}
                        </a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <script>
        $(document).on('change', '#type', function () {
            var type = $(this).val();
            if (type=='owner'){
                $('.owner_bank').removeClass('hidden');
            }else {
                $('.owner_bank').addClass('hidden');
            }
        });
        $(document).on('click', '#add_bankacount', function () {
            $.ajax({
                url: '{{url(AdminPath().'/add_bankacount')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}'},
                beforeSend: function () {

                }, success: function (data) {
                    $('.new_service').append(data);
                }
            });
        });
    </script>
@endsection
