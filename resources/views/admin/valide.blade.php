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

       


      <CEnter>
                
                    <div class="col-lg-6 w-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <ul>
                  @foreach ($errors->all() as $error)
                  <li class="alert alert-danger">{{ $error }}</li>
                  @endforeach
                </ul>
                            <form action="/valider_reservation" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{ $reservations->id }}" style="display: none;" >
                                <div class="row g-3">
                                <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="id_chambre" value="{{ $reservations->id_chambre}}" id="name" placeholder="Votre nom" readonly>
                                            <label for="name">Id de la chambre</label>
                                        </div>
                                     </div>

                                     <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="num_etage" value="{{ $reservations->num_etage}}" id="name" placeholder="Votre nom" readonly>
                                            <label for="name">Numéro de l'étage</label>
                                        </div>
                                     </div>

                                     <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="num_chambre" value="{{ $reservations->num_chambre}}" id="name" placeholder="Votre nom" readonly>
                                            <label for="name">Numéro de la Chambre de la chambre</label>
                                        </div>
                                     </div>
                                
                               
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"  name="nom_client" value="{{ $reservations->nom_client}}" id="name" placeholder="Votre nom"readonly >
                                            <label for="name">Votre Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="prenom_client" value="{{ $reservations->prenom_client}}" id="prenom" placeholder="Votre Prenom"readonly>
                                            <label for="prenom">Votre Prenom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email_client" id="name" value="{{ $reservations->email_client}}" placeholder="Votre nom"readonly>
                                            <label for="name">Votre Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="telephone_client" id="name" value="{{ $reservations->telephone_client}}" placeholder="Numéro de téléphone" readonly>
                                            <label for="name">Numéro de Téléphone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="checkin" name="date_debut" value="{{ $reservations->date_debut}}" placeholder="Arriver" data-target="#date3" data-toggle="datetimepicker" readonly />
                                            <label for="checkin">Arriver</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="checkout" name="date_fin" value="{{ $reservations->date_fin}}" placeholder="Départ" data-target="#date4" data-toggle="datetimepicker" readonly />
                                            <label for="checkout">Départ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="heures" value="{{ $reservations->heures}}" placeholder="heure"  readonly>
                                            <label for="name">Heure D'arriver et de départ</label>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" placeholder="Demande spéciale" name="demande" value="{{ $reservations->demande }}" id="message" style="height: 100px"  readonly>
                                            <label for="message">Demande spéciale</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                        <!-- <label for="name">Statut</label> -->
                                            <!-- <input type="text" class="form-control" id="name" name="heures" value="{{ $reservations->heures}}" placeholder="heure"  readonly> -->
                                            <input type="radio" name="statut" value="Aprouver" >Aprouver     
                                            <input type="radio" name="statut" value="Rejeter">Rejeter
                                            
                                        </div>
                                    </div>
                                    <div class="col-12">
                                       <button class="couleur btn btn-primary w-100 py-3" type="submit">Valider</button>
                                       <!-- <a class="btn btn-danger w-100 py-3" href="/room">Annuler la reservation</a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </CEnter>
        <!-- Booking End -->


    <!-- JavaScript Libraries -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js"></script>
</body>

</html>
