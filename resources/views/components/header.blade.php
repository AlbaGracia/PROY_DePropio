<div class="sticky-top">
<nav class="bg-black border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link"><i class="fab fa-instagram fa-lg link-white-simple"></i></a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fab fa-whatsapp fa-lg link-white-simple"></i></a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#"
                    class="nav-link link-white text-uppercase">{{ __('labels.contact') }}</a></li>
        </ul>
    </div>
</nav>

<header class="py-3 border-bottom bg-white">
    <div class="container">
        <div class="row w-100 d-flex justify-content-between align-items-center">
            <div class="col-12 col-lg-4 d-flex justify-content-lg-start justify-content-center mb-3 mb-lg-0">
                <ul class="nav d-none d-lg-flex">
                    <li class="nav-item"><a href="{{route('event.index')}}"
                            class="nav-link link-black px-2 text-uppercase">{{ __('labels.events') }}</a></li>
                    <li class="nav-item"><a href="#"
                            class="nav-link link-black px-2 text-uppercase">{{ __('labels.spaces') }}</a></li>
                    <li class="nav-item"><a href="#"
                            class="nav-link link-black px-2 text-uppercase">{{ __('labels.calendar') }}</a></li>
                </ul>
            </div>

            <div class="col-12 col-lg-4 d-flex justify-content-center">
                <a href="/" class="d-flex justify-content-center align-items-center">
                    <x-application-logo />
                </a>
            </div>

            <div class="col-12 col-lg-4 d-flex justify-content-lg-end justify-content-center mt-3 mt-lg-0">
                <ul class="nav d-none d-lg-flex">
                    <li class="nav-item"><a href="{{ route('login') }}"
                            class="btn btn-deep-purple-out px-2 me-2 text-uppercase">{{ __('labels.login') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('register') }}"
                            class="btn btn-lime-yellow text-uppercase">{{ __('labels.sign_up') }}</a></li>
                </ul>
            </div>

            {{-- DROPDOWN --}}
            <div class="col-12 d-flex justify-content-center">
                <ul class="nav d-lg-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase link-black" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('labels.show_all') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">{{ __('labels.events') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('labels.spaces') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('labels.calendar') }}</a></li>
                            <li class="dropdown-item"><a href="{{ route('login') }}" class="text-uppercase">{{ __('labels.login') }}</a></li>
                            <li class="dropdown-item"><a href="{{ route('register') }}"class="text-uppercase">{{ __('labels.sign_up') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
</div>