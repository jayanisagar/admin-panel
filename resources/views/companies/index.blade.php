@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company</div>

                <div class="card-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                     <a href="{{ route('companies.create') }}" class="btn btn-success">Create New Company</a>
                    </p>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped {{ count($companies) > 0 ? 'datatable' : '' }} @can('companies_delete') dt-select @endcan">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>website</th>
                                <th>logo</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if (count($companies) > 0)
                                @foreach ($companies as $company)
                                    <tr data-entry-id="{{ $company->id }}">
                                        <td field-key='name'>{{ $company->name }}</td>
                                        <td field-key='email'>{{ $company->email }}</td>
                                        <td field-key='website'>{{ $company->website }}</td>
                                        <td field-key='logo'>
                                            @if($company->logo)
                                            <a href="{{ asset($company->logo) }}" target="_blank">
                                                <img src="{{asset($company->logo)}}" height="40" width="40">
                                            </a>
                                            @endif
                                        </td>
                                        <td>                               
                                            <a href="{{ route('companies.edit',[$company->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("are you sure")."');",
                                                'route' => ['companies.destroy', $company->id])) !!}
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
