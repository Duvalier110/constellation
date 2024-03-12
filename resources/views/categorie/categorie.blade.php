<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des Categories</title>
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



    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"
            >Editer la Categorie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
           </div>
           <form class="form-group"
           action="/update/traitement" method="POST" enctype="multipart/form-data"  enctype="multipart/form-data">
           @csrf
           <input type="text" id="id" name="id"
            style="display: none;">

               <input type="numbre" class="form-control input-default"
               id="User" name="User" style="display: none" required>

            <div class="row">
              <div class="mb-3">
                <label for="exampleInputPassword1"
                    class="form-label">Nom</label>
                <input type="numbre" class="form-control input-default"
                    id="nom" name="nom"
                    required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1"  class="form-label">Libelle </label>
                <input type="text" class="form-control input-default"
                    id="libelle" name="libelle" maxlength="80" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1"  class="form-label">Photo</label>
                <input type="text" class="form-control input-default"
                    id="photo" name="libelle" maxlength="80" required>
            </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-danger"
                data-bs-dismiss="modal" value ="fermer"/>
                <input type="submit" class="btn btn-primary" value="Editer"/>
               </div>
            </div>
           </form>
        </div>
      </div>
     </div>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li class="alert alert-danger">{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus" viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Ajouter une Categorie
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                Ajouter une Categorie
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form class="form-group" action="/categorie/traitement" method="POST"  enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                     <input type="number" class="form-control" value="{{ Auth::user()->id }}" name="User" required style="display: none">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1"
                                        class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1"
                                        class="form-label">Libelle</label>
                                    <input type="numbre" class="form-control" name="libelle" maxlength="80" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1"  class="form-label">Photo</label>
                                  <input type="file" class="form-control input-default"
                                      id="photo" name="photo" maxlength="80" required>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


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
                    <th>Photo</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>

                  @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->User }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td>{{ $categorie->libelle }}</td>
                                <td><img src="{{ $categorie->photo }}" alt="photo" height="55cm" width="55cm"></td>
                                <td>
                                    {{-- see --}}
                                    <a class="btn btn-success"  href="/show_categorie/{{ $categorie->id }}" target="_blank" rel="noopener">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                      </svg>
                                    </a>

                                  <button class ="btn btn-primary editbtn" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>

                                  </button>
                                     <!-- Button trigger modal update -->




                                    <a onclick="return confirm('Voulez vous vraimment supprimer la Categorie ?')" href="/deletecategorie/{{ $categorie->id }}" class ="btn btn-danger deletebtn">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                          height="16" fill="currentColor"
                                          class="bi bi-danger" viewBox="0 0 16 16">
                                          <path
                                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                          <path
                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                      </svg>
                                  </a>



                                </td>
                            </tr>
                    @endforeach

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
