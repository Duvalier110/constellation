<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Update Statut</title>
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
                            <form action="/statut/traitement" method="POST">
                                @csrf
                                <div class="row g-3">
                                <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="id" value="{{ $chambres->id}}" id="name" placeholder="Votre nom" readonly>
                                            <label for="name">Id</label>
                                        </div>
                                     </div>

                                     <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="num_etage" value="{{ $chambres->num_etage}}" id="name" placeholder="Votre nom" readonly>
                                            <label for="name">Numéro de l'étage</label>
                                        </div>
                                     </div>

                                     <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="num_chambre" value="{{ $chambres->num_chambre}}" id="name" placeholder="Votre nom" readonly>
                                            <label for="name">Numéro de la Chambre de la chambre</label>
                                        </div>
                                     </div>
                                
                               
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"  name="nom" value="{{ $chambres->nom_client}}" id="name" placeholder="categorie"readonly >
                                            <label for="name">Categorie</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="libelle" value="{{ $chambres->libelle}}" id="prenom" placeholder="libelle"readonly>
                                            <label for="prenom">Libelle</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="prix" id="name" value="{{ $chambres->prix}}" placeholder="Votre nom"readonly>
                                            <label for="name">Prix</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="radio" name="statut" value="libre">Libre
                                            <input type="radio" name="statut" value="occuper">Occuper
                                            <!-- <label for="name">Statut</label> -->
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="col-12">
                                       <button class="couleur btn btn-primary w-100 py-3" type="submit" style=" bacground-color: blue;">Modifier</button>
                                       <!-- <a class="btn btn-danger w-100 py-3" href="/room">Annuler la reservation</a> -->
                                    </div>
                                </div>
                            </form>
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
