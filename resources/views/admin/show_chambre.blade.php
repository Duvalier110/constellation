<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détaille sur {{ $chambres->nom }} </title>
    {{-- loader --}}
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
                               <br>


                                                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                                    <!-- <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6> -->
                                                    <h1 class="mb-5"> <span
                                                            class="text-secondary text-uppercase">{{ $chambres->nom }}</span>
                                                    </h1>
                                                </div>

                                                <div class="row g-5">
                                                    <div class="col-lg-6">
                                                        <div class="row g-3">
                                                            <div class="col-6 text-end">
                                                                <img class="img-fluid rounded w-75 wow zoomIn"
                                                                    data-wow-delay="0.1s" src="{{ $chambres->photo1 }}"
                                                                    style="margin-top: 25%;">
                                                            </div>
                                                            <div class="col-6 text-start">
                                                                <img class="img-fluid rounded w-100 wow zoomIn"
                                                                    data-wow-delay="0.3s" src="{{ $chambres->photo2 }}">
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <img class="img-fluid rounded w-50 wow zoomIn"
                                                                    data-wow-delay="0.5s" src="{{ $chambres->photo3 }}">
                                                            </div>
                                                            <div class="col-6 text-start">
                                                                <img class="img-fluid rounded w-75 wow zoomIn"
                                                                    data-wow-delay="0.7s" src="{{ $chambres->photo4 }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6" class="card-body">
                                                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                                                            <ul>
                                                                <table class="table card-body">
                                                                    <thead>
                                                                        <th>Categorie</th>
                                                                        <th>{{ $chambres->nom }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Numéro de l'étage</th>
                                                                        <th>{{ $chambres->num_etage }}</th>

                                                                    </thead>
                                                                    <thead>
                                                                        <th>Numéro de la chambre</th>
                                                                        <th>{{ $chambres->num_chambre }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Nombre de lit</th>
                                                                        <th>{{ $chambres->lit }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Nombr d'adulte</th>
                                                                        <th>{{ $chambres->adulte }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Nombre d'enfant</th>
                                                                        <th>{{ $chambres->enfant }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Numéro de baignoire</th>
                                                                        <th>{{ $chambres->baignoire }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Prix</th>
                                                                        <th>{{ $chambres->prix }}$</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th>Libelle</th>
                                                                        <th>{{ $chambres->libelle }}</th>
                                                                    </thead>
                                                                    <thead>
                                                                        <th> <a href="/service" class="btn btn-danger" style="width: 4cm">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                                                              </svg>Retour</a></th>
                                                                    </thead>

                                                                </table>

                                                        </div>
                                                    </div>


                                        </div>
                                        <!-- Footer End -->


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
                var data = $tr.children("td").map(function() {
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
