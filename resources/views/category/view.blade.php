<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  
<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">View Category</h3>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">

<tr>
<td>Nama</td>
<td><a class="form-control btn-default">@php echo $category->nama; @endphp</a></td>
</tr>


<tr>
<td>&nbsp;</td>
<td>
<a href="{{ url('category') }}" class="btn btn-sm btn-danger btn-flat pull-right">Kembali</a></td>
</tr>
</table>
		</div>
	</div>
	</div>
</div>