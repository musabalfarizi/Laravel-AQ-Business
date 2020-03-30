
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Form Tambah Assets</h3>
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
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif
    <div class="box-body">
    <form method="post" action="{{url('assets/createPost')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
      <table id="example2" class="table table-bordered table-hover">

<tr>
<td>Nama</td>
<td><input class="form-control" type="text" name="nama" value=""/>
</tr>
<tr>
<td>Tanggal Pembelian</td>
<td><input class="form-control" type="date" name="tanggal_pembelian" value=""/>
</tr>
<tr>
<td>Pilihan Category</td>
<td><select class="form-control pup" name="id_category" id="id_category" required="">
        @if($category = DB::table('category')->get())
        @foreach($category as $row)
        
        <option value="{{ $row->id_category }}">
            {{ $row->nama }}</option>
        @endforeach
        @endif
        </select></td>
</tr>
<tr>
<td>Pilihan Supplier</td>
<td><select class="form-control pup" name="id_supplier" id="id_supplier" required="">
        @if($supplier = DB::table('supplier')->get())
        @foreach($supplier as $row)
        
        <option value="{{ $row->id_supplier }}">
            {{ $row->nama }}</option>
        @endforeach
        @endif
        </select></td>
</tr>
<tr>
<td>Pilihan Departments</td>
<td><select class="form-control pup" name="id_departments" id="id_departments" required="">
        @if($departments = DB::table('departments')->get())
        @foreach($departments as $row)
        
        <option value="{{ $row->id_departments }}">
            {{ $row->nama }}</option>
        @endforeach
        @endif
        </select></td>
</tr>
<tr>
<td>Price</td>
<td><input class="form-control" type="number" name="price" value=""/>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Simpan"/>
<a href="{{ url('assets') }}" class="btn btn-sm btn-danger btn-flat pull-right">Kembali</a></td>
</tr>

</table>      
</form>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->
