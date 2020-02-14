@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empoylee</div>

                <div class="card-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                     <a href="{{ route('employees.create') }}" class="btn btn-success">Create New Empoylee</a>
                    </p>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped {{ count($employees) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>company_id</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if (count($employees) > 0)
                                @foreach ($employees as $employee)
                                    <tr data-entry-id="{{ $employee->id }}">
                                        <td field-key='first_name'>{{ $employee->first_name }}</td>
                                        <td field-key='last_name'>{{ $employee->last_name }}</td>
                                        <td field-key='company_id'>
                                            {{$employee->company_id}}
                                        </td>
                                        <td>                               
                                            <a href="{{ route('employees.edit',[$employee->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("are you sure")."');",
                                                'route' => ['employees.destroy', $employee->id])) !!}
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
