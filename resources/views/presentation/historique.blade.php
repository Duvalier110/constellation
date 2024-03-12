<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Historique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- loader --}}
    <link rel="stylesheet" href="{{ 'js/style.css' }}">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <script src="{{ 'js/preloader.js' }}"></script>
    <div class="container-xxl bg-white p-0">
        @include('viewheader')

        {{-- Edit Demande --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editer la Categorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                        <div class="row">
                            <form action="/update/demande/traitement" method="POST">
                                @csrf
                                <input type="text" name="id" id="id"  style="display: none">
                                <input type="text" id="prix" name="prix_chambre" value=""  style="display: none">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nom_client" id="name"
                                                value="@if (auth()->check()) {{ Auth::user()->name }} @endif"
                                                placeholder="Votre nom">
                                            <label for="name">Votre Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">



                                            <input type="text" class="form-control"
                                                value="@if (auth()->check()) {{ Auth::user()->prenom }} @endif"
                                                name="prenom_client" id="prenom" placeholder="Votre Prenom">

                                            <label for="prenom">Votre Prenom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email"
                                                value="@if (auth()->check()) {{ Auth::user()->email }} @endif"
                                                id="name" placeholder="Votre nom">
                                            <label for="name">Votre Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"
                                                value="@if (auth()->check()) {{ Auth::user()->telephone }} @endif"
                                                name="telephone_client" id="name"
                                                placeholder="Numéro de téléphone">
                                            <label for="name">Numéro de Téléphone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input  type="datetime-local" min="{{ now()->format('Y-m-d\TH:i') }}" class="form-control datetimepicker-input"
                                                id="date1" name="date_debut" onchange="calculer()"
                                                placeholder="Arriver" data-target="#date3"
                                                data-toggle="datetimepicker" />
                                            <label for="checkin">Arriver</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <input type="datetime-local" min="{{ now()->format('Y-m-d\TH:i') }}" class="form-control datetimepicker-input"
                                                id="date2" name="date_fin" onchange="calculer()"
                                                placeholder="Départ" data-target="#date4"
                                                data-toggle="datetimepicker" />
                                            <label for="checkout">Départ</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="heur" name="heur"
                                                placeholder="heure" readonly>
                                            <label for="name">Nombre d'Heure</label>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="total" name="prix"
                                                placeholder="heure" readonly>
                                            <label for="name">Prix total</label>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Demande spéciale" name="demande" value="Aucune" id="message"
                                                style="height: 100px"></textarea>
                                            <label for="message">Demande spéciale</label>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="fermer" />
                            <input type="submit" class="btn btn-primary" value="Editer" />
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- etit  --}}

        <!-- Booking Start -->
        <div class="container-xxl py-5">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" style="width: 15cm;" role="alert">
                    <strong>{{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            style="align: right"></button>

                </div>
                <br>
            @endif
            <div class="container">
                {{-- <a href="/complet" class="btn btn-primary">Historique Complète</a> --}}
                <table id="example1" class="table">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Date d'arriver</th>
                            <th>Date de départ</th>
                            <th>Total Heure</th>
                            <th>Prix</th>
                            <th>prix total</th>
                            <th>Statut</th>
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
                                <td>{{ $reservation->date_debut }}</td>
                                <td>{{ $reservation->date_fin }}</td>
                                <td>{{ $reservation->heur }}</td>
                                <td>{{ $reservation->prix }}</td>
                                <td>{{ $reservation->total }} FCFA</td>


                                <td>{{ $reservation->statut }}</td>



                                <td>
                                      {{-- see --}}
                                      <a class="btn btn-success" href="/caracteristique_demande/{{ $reservation->id }}"
                                        target="_blank" rel="noopener">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                      </a>


                                    @if( $reservation->statut == 'Approuver' || $reservation->statut == 'Rejeter')

                                      <button class="btn btn-primary editbtn" type="submit" style="display: none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                    @else
                                    <button class="btn btn-primary editbtn" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                    @endif








                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>


        <script language="javascript">
            function calculer(heure) {

                var d1 = new Date(document.getElementById('date1').value);
                var d2 = new Date(document.getElementById('date2').value);
                var prix = parseInt(document.getElementById('prix').value);
                if (d2 >= d1) {
                    var diffTime = Math.abs(d2 - d1);
                    var differcheHours = (diffTime / (1000 * 60 * 60));
                    document.getElementById('heur').value = differcheHours;
                    document.getElementById('total').value = differcheHours * prix;
                }
                if (d1 >= d2) {
                    alert("verifier les deux dates")
                }
            }
        </script>





        @include('viewfooter')

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ 'lib/wow/wow.min.js' }}"></script>
        <script src="{{ 'lib/easing/easing.min.js' }}"></script>
        <script src="{{ 'lib/waypoints/waypoints.min.js' }}"></script>
        <script src="{{ 'lib/counterup/counterup.min.js' }}"></script>
        <script src="{{ 'lib/owlcarousel/owl.carousel.min.js' }}"></script>
        <script src="{{ 'lib/tempusdominus/js/moment.min.js' }}"></script>
        <script src="{{ 'lib/tempusdominus/js/moment-timezone.min.js' }}"></script>
        <script src="{{ 'lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js' }}"></script>



        <!-- Template Javascript -->
        <script src="{{ 'js/main.js"></script>' }}"></script>

        <script>
            $(document).ready(function() {
                $('.editbtn').on('click', function() {
                    $('#editModal').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    $('#id').val(data[0]);
                    $('#prix').val(data[7]);
                    //  $('#User').val(data[1]);
                    //  $('#nom').val(data[2]);
                    //  $('#libelle').val(data[3]);
                });
            });
        </script>

</body>

</html>
