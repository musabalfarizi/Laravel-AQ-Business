<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": false,
      "bInfo": true,
      "bAutoWidth": true
    });
  });
</script>
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">DATA Assets</h3>
    </div><!-- /.box-header -->

   

    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Kode Assets</th>
            <th>Nama</th>
            <th>Tanggal Pembelian</th>
            <th>Nama Kategori</th>
            <th>Nama Supplier</th>
            <th>Nama Departments</th>
            <th>Price</th>

          </tr>
        </thead>
        <tbody>
        
        @foreach($assets as $a)
          <tr>
      <td>{{$a->kode_assets}}</td>
      <td>{{$a->nama_assets}}</td>
      <td>{{$a->tanggal_pembelian}}</td>
      <td>{{$a->nama_category}}</td>
      <td>{{$a->nama_supplier}}</td>
      <td>{{$a->nama_departments}}</td>
      <td>{{$a->price}}</td>
     
    </form>
    </div> 
      </td>
          </tr>
           @endforeach
         
        </tbody>
        <tfoot>
  
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->


