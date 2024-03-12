<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Détaille sur {{ $categorie->nom }} </title>
  {{-- loader --}}
  @include('dash_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <script src="{{ ('js/preloader.js') }}"></script> 
<div class="wrapper">

  
  @include('../nav')
  @include('../sider')


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>





    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
                <a href="/categorie" class="btn btn-danger" style="width: 4cm">Retour</a>

                <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
              </div>
              <!-- /.card-header -->


            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" style="width: 15cm;" role="alert">
                     <strong>{{ session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="align: right"></button>
                    
                  </div>
              <br>
            @endif 

           
                @if(session('supp'))
                 <div class="alert alert-danger alert-dismissible fade show" style="width: 15cm; " role="alert">
                  {{ session('supp')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="align: right"></button>
                 </div>
              <br>
            @endif 
            
                <table id="example1" class="table">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Id Employer</th>
                    <th>Nom</th>
                    <th>Libelle</th>

                  </tr>
                  </thead>
                  <tbody>
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->User }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td>{{ $categorie->libelle }}</td>
                                
                            </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>



  <!-- /.content-wrapper -->
 @include('../footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('dash_js')
<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#editModal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      $('#id').val(data[0]);
       $('#User').val(data[1]);
       $('#nom').val(data[2]);
       $('#libelle').val(data[3]);
    });
  });
</script>
<!-- jQuery -->

</body>
</html>
