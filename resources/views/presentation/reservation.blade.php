<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Room</title>
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
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                    <h1 class="mb-5"> <span class="text-primary text-uppercase">{{ $chambres->nom}}</span></h1>
                </div>

                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ $chambres->photo }}" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ $chambres->photo }}">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ $chambres->photo }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ $chambres->photo }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <ul>
                  @foreach ($errors->all() as $error)
                  <li class="alert alert-danger">{{ $error }}</li>
                  @endforeach
                </ul>
                            <form action="/reservation/traitement" name="heure" method="POST">
                                @csrf
                                <input type="text" name="statut" value="En attente" style="display: none">
                                <input type="text" class="form-control" value=" {{ $chambres->id }}" name="Chambre" id="Chambre" style="display: none" >
                                <input type="text" name="num_chambre" value="{{ $chambres->num_chambre }}" style="display: none;" >
                                <input type="text" name="num_etage" value="{{ $chambres->num_etage }}" style="display: none;" >
                                <input type="text" name="prix_chambre" id="prix" value="{{ $chambres->prix }}" onchange="calculer('heure')" style="display: none;" >
                                <input type="text" name="User" id="" value="@if (auth()->check()){{ Auth::user()->id }}@endif" style="display: none">


                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nom_client" id="name"
                                            value="@if (auth()->check()) {{ Auth::user()->name }}@endif"
                                            placeholder="Votre nom" >
                                            <label for="name">Votre Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">



                                            <input type="text" class="form-control"
                                            value="@if (auth()->check()) {{ Auth::user()->prenom }}@endif"
                                            name="prenom_client" id="prenom" placeholder="Votre Prenom">

                                            <label for="prenom">Votre Prenom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email"
                                            value="@if (auth()->check()){{ Auth::user()->email }}@endif"
                                             id="name" placeholder="Votre nom">
                                            <label for="name">Votre Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"
                                            value="@if (auth()->check()) {{ Auth::user()->telephone }}@endif"
                                             name="telephone_client" id="name" placeholder="Numéro de téléphone">
                                            <label for="name">Numéro de Téléphone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="datetime-local" min="{{ now()->format('Y-m-d\TH:i') }}" class="form-control datetimepicker-input" id="date1" name="date_debut" onchange="calculer('heure')" placeholder="Arriver" data-target="#date3" data-toggle="datetimepicker" />
                                            <label for="checkin">Arriver</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <input type="datetime-local" min="{{ now()->format('Y-m-d\TH:i') }}"  class="form-control datetimepicker-input" id="date2" name="date_fin" onchange="calculer('heure')" placeholder="Départ" data-target="#date4" data-toggle="datetimepicker" />
                                            <label for="checkout">Départ</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="heur" name="heur" placeholder="heure" readonly>
                                            <label for="name">Nombre d'Heure</label>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="total" name="prix" placeholder="heure" readonly>
                                            <label for="name">Prix total</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Demande spéciale" name="demande" value="Aucune" id="message" style="height: 100px"></textarea>
                                            <label for="message">Demande spéciale</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                       <button class="btn btn-primary w-100 py-3" type="submit">Reservez maintenant</button>
                                       <!-- <a class="btn btn-danger w-100 py-3" href="/room">Annuler la reservation</a> -->
                                    </div>
                                    {{-- <div class="col-12">
                                       <a class="btn btn-success w-100 py-3" href="https://hter.link/qPN9R">Effectuer le payement</a>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        <script language="javascript">
            function calculer(heure)
            {
                var date1 = document.getElementById('date1').value;
                var date2 = document.getElementById('date2').value;

            var d1 = new Date(date1) ;
            var d2 = new Date(date2) ;
            var prix= parseInt(document.getElementById('prix').value);
            if(d2>=d1)
            {
            var  diffTime = Math.abs(d2 - d1);
            var differcheHours= (diffTime / (1000 * 60 * 60));
             document.getElementById('heur').value = differcheHours;
            document.getElementById('total').value = differcheHours *  prix;
            }
            if(d1>=d2)
            {
                alert("verifier les deux dates")
            }
            }
        </script>


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
