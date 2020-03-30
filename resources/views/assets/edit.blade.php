

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Form Update Karyawan</h3>
    </div><!-- /.box-header -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="box-body">
    <form method="post" action="{{ url ('assets/updatePost', $assets->id_assets )}}">
          {{ csrf_field() }}
      <table id="example2" class="table table-bordered table-hover">

<tr>
<td>Kode Assets</td>
<td><input disabled class="form-control" type="text" name="kode_assets" value=" {{$assets->kode_assets}} "/>
</tr>
<tr>
<td>Nama</td>
<td><input class="form-control" type="text" name="nama" value="{{$assets->nama}}"/>
</tr>
<tr>
<td>Tanggal Pembelian</td>
<td><input class="form-control" type="date" name="tanggal_pembelian" value="{{$assets->tanggal_pembelian}}"/>
</tr>
<tr>
  <td ><label for="job_title">Pilih Category</label></td>
  <td>
              <select  class="form-control btn-default" name='id_category'>
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
  <td ><label for="job_title">Pilih Supplier</label></td>
  <td>
              <select  class="form-control btn-default" name='id_supplier'>
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
  <td ><label for="job_title">Pilih Departments</label></td>
  <td>
              <select  class="form-control btn-default" name='id_departments'>
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
<td><input class="form-control" type="text" name="price" value="{{$assets->price}}"/>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Update"/>
<a href="{{ url('assets') }}" class="btn btn-sm btn-danger btn-flat pull-right">Kembali</a></td>
</tr>

</table>      
</form>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->
