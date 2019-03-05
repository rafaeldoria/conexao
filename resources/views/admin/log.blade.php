@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.min.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 offset-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach ($breadcrumb as $value)
                        <li @if ($loop->last) class="breadcrumb-item active" aria-current="page" @else class="breadcrumb-item" @endif>
                            @if ($loop->last) {{$value["title"]}}
                            @else <a href="{{$value["route"]}}">{{$value["title"]}}</a>@endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
                  <h3 class="box-title">Logs</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover dataTable" role="grid">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 40px">Log</th>
                    <th style="width: 40px">Tipo</th>
                    <th style="width: 40px">User Id</th>
                </tr>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{$log->id}}</td>
                        <td>{{$log->desc_log}}</td>
                        <td>{{$log->typeLog->desc_type_logs}}</td>
                        <td>{{$log->user_id}}</td>
                    </tr>
                @endforeach
              </table>
            </div>
            
            <div class="box-footer clearfix">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $logs->links() }}
                    </ul>
                </nav>
            </div>
          <!-- /.box -->
    </div>
</div>	

@endsection
