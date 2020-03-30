<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  
<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">View Assets</h3>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">

<tr>
<td>Kode Assets</td>
<td><a disabled class="form-control btn-default">@php echo $assets->kode_assets; @endphp</a></td>
</tr>
<tr>
<td>Nama</td>
<td><a class="form-control btn-default">@php echo $assets->nama; @endphp</a></td>
</tr>
<tr>
<td>Tanggal Pembelian</td>
<td><a class="form-control btn-default">@php echo $assets->tanggal_pembelian; @endphp</a></td>
</tr>
<tr>
	<td ><label for="job_title">Nama Category:</label></td>
	<td>
              <select disabled class="form-control btn-default" name='id_category'>
       @if($jenis = DB::table('category')->get())
       @endif
        @foreach($jenis as $ku)
        
        <option value="{{ $ku->id_category }}"
                @if ($assets->id_category === $ku->id_category)   selected
                @endif
            >
            {{ $ku->nama }}</option>
        @endforeach
</select>
</td>
</tr>
<tr>
	<td ><label for="job_title">Nama Supplier:</label></td>
	<td>
              <select disabled class="form-control btn-default" name='id_supplier'>
       @if($jenis = DB::table('supplier')->get())
       @endif
        @foreach($jenis as $ku)
        
        <option value="{{ $ku->id_supplier }}"
                @if ($assets->id_supplier === $ku->id_supplier)   selected
                @endif
            >
            {{ $ku->nama }}</option>
        @endforeach
</select>
</td>
</tr>
<tr>
	<td ><label for="job_title">Nama Departments:</label></td>
	<td>
              <select disabled class="form-control btn-default" name='id_departments'>
       @if($jenis = DB::table('departments')->get())
       @endif
        @foreach($jenis as $ku)
        
        <option value="{{ $ku->id_departments }}"
                @if ($assets->id_departments === $ku->id_departments)   selected
                @endif
            >
            {{ $ku->nama }}</option>
        @endforeach
</select>
</td>
</tr>
<tr>
<td>price</td>
<td><a class="form-control btn-default">@php echo $assets->price; @endphp</a></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<a href="{{ url('assets') }}" class="btn btn-sm btn-danger btn-flat pull-right">Kembali</a></td>
</tr>
</table>
		</div>
	</div>
	</div>
</div>