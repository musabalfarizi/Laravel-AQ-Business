<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  
<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">View Supplier</h3>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
<tr>
<td>Kode Supplier</td>
<td><a class="form-control btn-default">@php echo $supplier->kode_supplier; @endphp</a></td>
</tr>
<tr>
<td>Nama</td>
<td><a class="form-control btn-default">@php echo $supplier->nama; @endphp</a></td>
</tr>
<tr>
<td>Email</td>
<td> <a class="form-control btn-default"> @php echo $supplier->email; @endphp</a></td>
</tr>
<tr>
<td>Logo</td>
<td><a class="form-group btn-default"> <img style="max-width:100px;max-height:100px;float:left;"  src="{{ url('/storage/app/company/'.$supplier->logo) }}"></a></td>
</tr>

<tr>
<td>&nbsp;</td>
<td>
<a href="{{ url('supplier') }}" class="btn btn-sm btn-danger btn-flat pull-right">Kembali</a></td>
</tr>
</table>
		</div>
	</div>
	</div>
</div>