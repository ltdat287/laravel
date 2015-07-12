@extends('layouts.main')

@section('title')
Chỉnh sửa thông tin
@stop

@section('content')
<h2 class="page-header">Chỉnh sửa thông tin</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					  <div class="panel-heading">
							<h3 class="panel-title">Panel title</h3>
					  </div>
					  <div class="panel-body">
							Panel content
					  </div>
				</div>


					<div class="form-group">
						<span class="alert alert-success">
					        {{ isset($result) ? $result : "Không thành công" }}
					    </span>
				   </div>


			    	<div class="form-group">
			    		<a href="{{{url('class/list')}}}" class="btn btn-default btn-block">Trở về</a>
			    	</div>

		    </div>
	   </div>
    </div>
@stop