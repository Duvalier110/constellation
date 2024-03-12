<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Historique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
   {{-- loader --}}
  <link rel="stylesheet" href="{{ ('js/style.css') }}">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

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
    <script src="{{ ('js/preloader.js') }}"></script>
    <div class="container-xxl bg-white p-0">
 @include('viewheader')


        <!-- Booking Start -->
        <div class="container-xxl py-5">
            <div class="container">


                                         <center>
                                            <caption>
                                                <p style=" font-size: 46px;">Constellation Hotel: Chambre numéro {{ $demande->num_chambre }} </p>
                                            </caption>
                                         </center>

                                        <table class="table">
                                            


                                            <thead>
                                                <tr>
                                                    <th>prenom du client</th>
                                                    <th>{{ $demande->prenom_client }}</th>
                                                </tr>
                                            </thead>

                                            <thead>
                                                <tr>
                                                    <th>Numéro de la chambre</th>
                                                    <th>{{ $demande->num_chambre }}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>numéro de l'étage</th>
                                                    <th>{{ $demande->num_etage }}</th>
                                                </tr>
                                            </thead>

                                            <thead>
                                                <tr>
                                                    <th>Email du client</th>
                                                    <th>{{ $demande->email }}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>numéro de téléphone</th>
                                                    <th>{{ $demande->telephone_client }}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>date de début</th>
                                                    <th>{{ $demande->date_debut }}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>date de fin</th>
                                                    <th>{{ $demande->date_fin }}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>Nombres d'heure total</th>
                                                    <th>{{ $demande->heur }} h</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>Prix de la chambre</th>
                                                    <th>{{ $demande->prix }} FCFA</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>Prix Total</th>
                                                    <th>{{ $demande->total }} FCFA</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>demande</th>
                                                    <th>{{ $demande->demande }}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>Statut</th>
                                                    <th>{{ $demande->statut }}</th>
                                                </tr>
                                            </thead>

                                        </table>

                                    </div>
                                </div>


                        @include('viewfooter')
                            <!-- JavaScript Libraries -->
                            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="{{ ('lib/wow/wow.min.js') }}"></script>
                            <script src="{{ ('lib/easing/easing.min.js') }}"></script>
                            <script src="{{ ('lib/waypoints/waypoints.min.js') }}"></script>
                            <script src="{{ ('lib/counterup/counterup.min.js') }}"></script>
                            <script src="{{ ('lib/owlcarousel/owl.carousel.min.js') }}"></script>
                            <script src="{{ ('lib/tempusdominus/js/moment.min.js') }}"></script>
                            <script src="{{ ('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
                            <script src="{{ ('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

                            <!-- Template Javascript -->
                            <script src="{{ ('js/main.js"></script>
                        </body>

                        </html>
