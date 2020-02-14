@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Empoylee</div>

                <div class="card-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['employees.store'], 'files' => true]) !!}

                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 form-group">
                                {!! Form::label('first_name', trans('first_name').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('first_name'))
                                    <p class="help-block">
                                        {{ $errors->first('first_name') }}
                                    </p>
                                @endif
                            </div>

                            <div class="col-xs-6 form-group">
                                {!! Form::label('last_name', trans('last_name').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('last_name'))
                                    <p class="help-block">
                                        {{ $errors->first('last_name') }}
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
