@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Company</div>

                <div class="card-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['companies.store'], 'files' => true]) !!}

                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 form-group">
                                {!! Form::label('name', trans('name').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>

                            <div class="col-xs-6 form-group">
                                {!! Form::label('email', trans('email').'*', ['class' => 'control-label']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 form-group">
                                {!! Form::label('website', trans('website').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('website', old('website'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('website') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-xs-6 form-group">
                                {!! Form::label('logo', trans('logo').'*', ['class' => 'control-label']) !!}
                                {!! Form::file('logo', ['class' => 'form-control']) !!}
                                {!! Form::hidden('photo_max_size', 2) !!}
                                <p class="help-block"></p>
                                @if($errors->has('logo'))
                                    <p class="help-block">
                                        {{ $errors->first('logo') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::submit(trans('save'), ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
