<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Demandes de Réservation</title>
    @include('dash_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="{{ 'js/preloader.js' }}"></script>
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
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="alert alert-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show"
                                            style="width: 18cm;" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close" style="align: right"></button></pre>
                                        </div>
                                        <br>
                                    @endif



                                    <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                                </div>
                                <!-- /.card-header -->


                                <div class="card">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Email</th>
                                                    <th>Statut</th>
                                                    <th>début</th>
                                                    <th>Total Heure</th>
                                                    <th>prix total</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->id }}</td>
                                                        <td>{{ $reservation->nom_client }}</td>
                                                        <td>{{ $reservation->prenom_client }}</td>
                                                        <td>{{ $reservation->email }}</td>
                                                        <td>{{ $reservation->statut }}</td>
                                                        <td>{{ $reservation->date_debut }}</td>
                                                        <td>{{ $reservation->heur }}</td>
                                                        <td>{{ $reservation->total }} FCFA</td>


                                                        <td>
                                                            {{-- see --}}
                                                            <a class="btn btn-success"
                                                                href="/show_demande/{{ $reservation->id }}"
                                                                target="_blank" rel="noopener">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-eye"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                                    <path
                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                </svg>
                                                            </a>
                                                            <!-- Button trigger modal update -->

                                                            <button class="btn btn-primary editbtn" type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                </svg>
                                                            </button>


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



                    {{-- STATUT --}}
                    <div class="modal fade" id="editModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel"aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editer le statut</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="form-group" action="/valider_reservation" method="POST">
                                    @csrf
                                    <input type="number" class="form-control" id="id" name="id"
                                        style="display: none;">
                                    <div class="mb-3 row">

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">statut
                                            </label><br>
                                            <input type="radio" name="statut" value="Approuver">Approuver <br>
                                            <input type="radio" name="statut" value="Rejeter">Rejeter
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                            value="fermer" />
                                        <input type="submit" class="btn btn-primary" value="Editer" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- STATUT --}}
            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2023-2024 Ivan-Duvalier</a>.</strong> tout droit reservé.
        </footer>

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
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#id').val(data[0]);
                // $('#User').val(data[1]);
                // $('#num_chambre').val(data[2]);
                // $('#num_etage').val(data[3]);
                $('#statut').val(data[6]);
            });
        });
    </script>
</body>

</html>
