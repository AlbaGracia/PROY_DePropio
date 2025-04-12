@extends('layouts.master')

@section('content')
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Your Favorite Place for Free Bootstrap Themes</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Start Bootstrap can help you build better websites using the Bootstrap
                        framework! Just download a theme and start customizing, no strings attached!</p>
                    <a class="btn btn-outline-light btn-lg" href="#about">Find Out More</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Sección de Testimonio -->
    <aside class="text-center bg-bright-purple py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-2">"Una solución intuitiva a un problema común que todos
                        enfrentamos, ¡todo en una sola app!"</div>
                </div>
            </div>
        </div>
    </aside>
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="#" title="Project Name">
                        <img class="img-fluid" src="{{ asset('images/space.jpg') }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-deep-purple">Category</div>
                            <div class="project-name text-deep-purple">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="#" title="Project Name">
                        <img class="img-fluid" src="{{ asset('images/event.jpg') }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-deep-purple">Category</div>
                            <div class="project-name text-deep-purple">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="#" title="Project Name">
                        <img class="img-fluid" src="{{ asset('images/calendar.jpg') }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-deep-purple">Category</div>
                            <div class="project-name text-deep-purple">Project Name</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- About-->
    <section class="page-section bg-white" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-deep-purple mt-0 fs-1">We've got what you need!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Start Bootstrap has everything you need to get your new
                        website up and
                        running in no time! Choose one of our open source, free to download, and easy to use
                        themes! No
                        strings attached!</p>
                    <a class="btn btn-lime-yellow btn-sm" href="#services">Get Started!</a>
                </div>
            </div>
        </div>
    </section>
@endsection
