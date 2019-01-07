@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    conexaonerd.com.br
                </div>
            </div>
        </div>
	</div>
	<br><br>
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              	<h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
					<th style="width: 10px">#</th>
					<th>Task</th>
					<th>Progress</th>
					<th style="width: 40px">Label</th>
                </tr>
                <tr>
					<td>1.</td>
					<td>Update software</td>
					<td>
						<div class="progress progress-xs">
						<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
						</div>
					</td>
					<td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
					<td>2.</td>
					<td>Clean database</td>
					<td>
						<div class="progress progress-xs">
						<div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
						</div>
					</td>
					<td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
					<td>3.</td>
					<td>Cron job running</td>
					<td>
						<div class="progress progress-xs progress-striped active">
						<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
						</div>
					</td>
					<td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
					<td>4.</td>
					<td>Fix and squish bugs</td>
					<td>
						<div class="progress progress-xs progress-striped active">
						<div class="progress-bar progress-bar-success" style="width: 90%"></div>
						</div>
					</td>
					<td><span class="badge bg-green">90%</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              	<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
						<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">&laquo;</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
						<a class="page-link" href="#">&raquo;</a>
						</li>
					</ul>
				</nav>
			</div>
          <!-- /.box -->
    </div>
</div>
@endsection
