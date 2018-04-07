@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.auth.register_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.auth.register_box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                        <div class="row">
                            <div class="col-12 col-md-6"><!--first name-->
                                <div class="form-group input-group">
                                  <label class="has-float-label">
                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.first_name'))
                                        ->attribute('maxlength', 191) }}
                                    <span>{{ __('validation.attributes.frontend.first_name') }}</span>
                                  </label>
                                </div><!--form group-->
                            </div><!--col first name-->
                            <div class="col-12 col-md-6"><!--last name-->
                                <div class="form-group input-group">
                                  <label class="has-float-label">
                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.last_name'))
                                        ->attribute('maxlength', 191) }}
                                    <span>{{ __('validation.attributes.frontend.last_name') }}</span>
                                  </label>
                                </div><!--form group-->
                            </div><!--col last name-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label class="has-float-label">
                                    {{ html()->text('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191) }}
                                    <span>{{ __('validation.attributes.frontend.email') }}</span>
                                  </label>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label class="has-float-label">
                                    {{ html()->text('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->attribute('maxlength', 191) }}
                                    <span>{{ __('validation.attributes.frontend.password') }}</span>
                                  </label>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label class="has-float-label">
                                    {{ html()->text('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->attribute('maxlength', 191) }}
                                    <span>{{ __('validation.attributes.frontend.password_confirmation') }}</span>
                                  </label>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if (config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    {!! Captcha::display() !!}
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.auth.register_button')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                {!! $socialiteLinks !!}
                            </div>
                        </div><!--/ .col -->
                    </div><!-- / .row -->

                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

@push('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush
