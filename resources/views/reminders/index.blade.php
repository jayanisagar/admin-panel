@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reminder</div>

                <div class="card-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                     <a href="{{ route('reminders.create') }}" class="btn btn-success">Create New Reminder</a>
                    </p>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped {{ count($reminders) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>date</th>
                                <th>time</th>
                                <th>company_id</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if (count($reminders) > 0)
                                @foreach ($reminders as $reminder)
                                    <tr data-entry-id="{{ $reminder->id }}">
                                        <td field-key='name'>{{ $reminder->name }}</td>
                                        <td field-key='email'>{{ $reminder->email }}</td>
                                        <td field-key='date'>{{ $reminder->date }}</td>
                                        <td field-key='time'>{{ $reminder->time }}</td>
                                        <td field-key='company_id'>
                                            {{$reminder->company_id}}
                                        </td>
                                        <td>                               
                                            <a href="{{ route('reminders.edit',[$reminder->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("are you sure")."');",
                                                'route' => ['reminders.destroy', $reminder->id])) !!}
                                            {!! Form::submit(trans('delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                            {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12">no entries in table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
