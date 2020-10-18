@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Reminder</div>

                <div class="card-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['reminders.store'], 'files' => true]) !!}

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
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                                {!! Form::label('date', trans('date').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('date', old('date'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('date'))
                                    <p class="help-block">
                                        {{ $errors->first('date') }}
                                    </p>
                                @endif
                            </div>

                            <div class="col-xs-6 form-group">
                                {!! Form::label('time', trans('time').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('time', old('time'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('time'))
                                    <p class="help-block">
                                        {{ $errors->first('time') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 form-group">
                                {!! Form::label('company_id', trans('company_id').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('company_id', old('company_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('company_id'))
                                    <p class="help-block">
                                        {{ $errors->first('company_id') }}
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
