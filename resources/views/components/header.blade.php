<div class="sticky-top z-3">
    <nav class="bg-black">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="#" class="nav-link"><i
                            class="fab fa-instagram fa-lg link-white-simple"></i></a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link"><i
                            class="fab fa-whatsapp fa-lg link-white-simple"></i></a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="{{ route('contact.show') }}"
                        class="nav-link link-white text-uppercase">{{ __('labels.contact') }}</a></li>
            </ul>
        </div>
    </nav>

    <header class="py-3 border-bottom bg-white">
        <div class="container d-flex flex-wrap">
            <div class="row w-100 d-flex justify-content-between align-items-center">
                <div class="col-12 col-lg-4 d-flex justify-content-lg-start justify-content-center mb-3 mb-lg-0">
                    <ul class="nav d-none d-lg-flex">
                        <li class="nav-item"><a href="{{ route('event.index') }}"
                                class="nav-link link-black fw-bolder px-2 text-uppercase">{{ __('labels.events') }}</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('space.index') }}"
                                class="nav-link link-black fw-bolder px-2 text-uppercase">{{ __('labels.spaces') }}</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('calendar') }}"
                                class="nav-link link-black fw-bolder px-2 text-uppercase">{{ __('labels.calendar') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-lg-4 d-flex justify-content-center">
                    <a href="/" class="d-flex justify-content-center align-items-center">
                        <x-application-logo />
                    </a>
                </div>

                <div class="col-12 col-lg-4 d-flex justify-content-lg-end justify-content-center mt-3 mt-lg-0">

                    @guest
                        <ul class="nav d-none d-lg-flex">
                            <li class="nav-item"><a href="{{ route('login') }}"
                                    class="btn btn-deep-purple-out btn-sm px-2 me-2 text-uppercase">{{ __('labels.login') }}</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('register') }}"
                                    class="btn btn-lime-yellow btn-sm text-uppercase">{{ __('labels.sign_up') }}</a></li>
                        </ul>
                    @endguest
                    @auth
                        <div class="dropdown d-none d-lg-flex">
                            <button class="btn btn-lime-yellow dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">{{ __('labels.hello') }}
                                {{ Auth::user()->name }}
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('labels.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('save-events.index') }}">
                                        {{ __('labels.save-events') }}
                                    </a>
                                </li>
                                @unlessrole('user')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.panel') }}">
                                            {{ __('labels.panel') }}
                                        </a>
                                    </li>
                                @endunlessrole
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            {{ __('labels.log-out') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth

                </div>

                {{-- DROPDOWN --}}
                <div class="col-12 d-flex justify-content-center">
                    <ul class="nav d-lg-none">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase link-black" href="#" role="button"
                                data-bs-toggle="dropdown">{{ __('labels.show_all') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('event.index') }}">{{ __('labels.events') }}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('space.index') }}">{{ __('labels.spaces') }}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('calendar') }}">{{ __('labels.calendar') }}</a></li>
                                @guest
                                    <li class="dropdown-item"><a href="{{ route('login') }}"
                                            class="text-uppercase">{{ __('labels.login') }}</a></li>
                                    <li class="dropdown-item"><a
                                            href="{{ route('register') }}"class="text-uppercase">{{ __('labels.sign_up') }}</a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="dropdown-submenu position-relative">
                                        <a class="dropdown-item" href="#" role="button" aria-expanded="false">
                                            {{ __('Configuración') }} ▸
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('profile.edit') }}">{{ __('labels.profile') }}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('save-events.index') }}">
                                                    {{ __('labels.save-events') }}
                                                </a>
                                            </li>
                                            @unlessrole('user')
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.panel') }}">
                                                        {{ __('labels.panel') }}
                                                    </a>
                                                </li>
                                            @endunlessrole
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="dropdown-item">{{ __('labels.log-out') }}</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
