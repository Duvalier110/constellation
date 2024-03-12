<div class="row gx-0">
    <div class="col-lg-3 bg-dark d-none d-lg-block">
        <a href="#" class="navbar-brand w-40 h-50 m-0 p-0 d-flex align-items-center justify-content-center">
            <h3 class="m-0 text-primary text-uppercase">Constellation</h3>
        </a>
    </div>
    <div class="col-lg-9">
        <div class="row gx-0 bg-white d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                    <i class="fa fa-envelope text-primary me-2"></i>
                    <p class="mb-0">ivannoss393@gmail.com.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-2">
                    <i class="fa fa-phone-alt text-primary me-2"></i>
                    <p class="mb-0">+237 680623711</p>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="d-inline-flex align-items-center py-2">
                    <a class="me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="me-3" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="me-3" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="me-3" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="/" class="nav-item nav-link">Acceuil</a>

                    <a href="/services" class="nav-item nav-link">Services</a>
                    <a href="/room" class="nav-item nav-link">Chambres</a>
                    <a href="/temoignage" class="nav-item nav-link ">Témoignage</a>
                    @if (auth()->check())
                        <a href="/historique" class="nav-item nav-link ">Historique</a>
                    @endif
                    {{-- <a href="/contact" class="nav-item nav-link">Contact</a> --}}
                    {{-- le code suivan s'exécute si l'utilisateur est connecté et s'il a la permission --}}
                    @if (auth()->check())
                        @if (Auth::User()->hasPermission('administrateur-bord'))
                            <a href="/dashboard" class="nav-item nav-link">Dashboard</a>
                        @endif
                    @endif
                    @guest
                        <button type="button" class="nav-item nav-link active "
                            style="background: transparent; border-width: 0px;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Connexion </button>
                    @else
                        {{-- le code suivan s'exécute si l'utilisateur est connecté  --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">
                                <img src="{{ Auth::user()->photo }}" alt="" height="30px" width="30px"
                                    style="border-radius: 100%">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <button class="btn" style="background: transparent; font-size: 12px">
                                    <a href="/profile" class="dropdown-item">Profile</a>
                                </button>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn" type="submit"
                                        style="background: transparent; font-size: 12px">Déconnexion</button>
                                </form>
                                </a>

                            </div>
                        </div>
                    @endguest
                    {{-- le lien suivant s'affiche si l utilisateur n\'est pas connecter --}}
                    @guest

                        <a href="/register" class="nav-item nav-link active">Inscription</a>
                    @endguest



                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        Connexion
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            {{-- <x-input-label  for="email" :value="__('Email')" /> --}}
                                            <x-text-input id="email" class="form-control" type="email"
                                                name="email" :value="old('email')" required autofocus
                                                autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                            <x-text-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                        <div>

                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Mot de passe Oublié?') }}
                                                </a>
                                            @endif


                                        </div>
                                        {{-- </form> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Connexion</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </nav>
    </div>
</div>



