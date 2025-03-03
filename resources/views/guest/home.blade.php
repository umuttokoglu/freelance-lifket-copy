@extends('layout.guest.index')

@section('content')
    <!-- hero section -->
    <section class="hero-slider" data-aos="fade-down" data-aos-delay="100">
        <ul class="hero-slide">
            <!-- slide item -->
            <li class="active" data-slide="1">
                <!-- image item -->
                <img src="./imgs/slide1.webp" alt="Architecture - BuildXpert template">
                <!-- hero box item -->
                <div class="hero-box" data-aos="fade-down">
                    <h2>Contemporary Architecture</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross" aria-hidden="true"></i>
                    </a>
                </div>
            </li>

            <!-- slide item -->
            <li data-slide="2">
                <!-- image item -->
                <img src="./imgs/slide2.webp" alt="Architecture - BuildXpert template">
                <!-- hero box item -->
                <div class="hero-box" data-aos="fade-down">
                    <h2>Nature & Art of simplicity</h2>
                    <!-- button -->
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross" aria-hidden="true"></i>
                    </a>
                </div>
            </li>

            <!-- slide item -->
            <li data-slide="3">
                <!-- image item -->
                <img src="./imgs/slide3.webp" alt="Architecture - BuildXpert template">
                <!-- hero box item -->
                <div class="hero-box" data-aos="fade-down">
                    <h2>House of the future</h2>
                    <!-- button -->
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross" aria-hidden="true"></i>
                    </a>
                </div>
            </li>
        </ul>

        <!-- hero box -->
        <div class="hero-commands">
            <!-- hero button previous -->
            <button id="hero-btn-prev">
                <i class="lnr lnr-chevron-left" aria-hidden="true"></i>
                <span class="sr-only">Previous Slide</span>
            </button>
            <!-- hero button next -->
            <button id="hero-btn-next">
                <i class="lnr lnr-chevron-right" aria-hidden="true"></i>
                <span class="sr-only">Next Slide</span>
            </button>
        </div>
    </section>


    <!-- blog section -->
    <section class="container">
        <!-- title wrapper with corners -->
        <div class="title-corners" data-aos="fade-down">
            <!-- corners line -->
            <span class="corner-line line1" aria-hidden="true"></span>
            <span class="corner-line line2" aria-hidden="true"></span>
            <span class="corner-line line3" aria-hidden="true"></span>
            <span class="corner-line line4" aria-hidden="true"></span>
            <!-- title -->
            <h2>Latest News & Updates</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, quos obcaecati. Tempora laborum
                pariatur deserunt, reprehenderit illum voluptate.</p>
        </div>
        <!-- post grid -->
        <div class="grid gtc-3">
            <!-- post item -->
            <article class="post" data-aos="fade-down" data-aos-delay="100">
                <!-- post image -->
                <a href="./post.html">
                    <img src="./imgs/blog/post1.webp" alt="Blog post - BuildXpert template">
                </a>
                <!-- post title -->
                <h3>
                    <a href="./post.html">Top Sustainable Building Trends</a>
                </h3>
                <!-- post info -->
                <div class="flex">
                    <a href="./post.html">Trends</a>
                    <span>01/08/2024</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, aliquam similique laboriosam deserunt
                    atque accusamus...</p>
                <!-- post button -->
                <a href="./post.html" class="btn-arrow">Read more <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
            </article>

            <!-- post item -->
            <article class="post" data-aos="fade-down" data-aos-delay="200">
                <!-- post image -->
                <a href="./post.html">
                    <img src="./imgs/blog/post3.webp" alt="Blog post - BuildXpert template">
                </a>
                <!-- post title -->
                <h3>
                    <a href="./post.html">Tips for Planning Your Next Construction Project</a>
                </h3>
                <!-- post info -->
                <div class="flex">
                    <a href="./post.html">tips</a>
                    <span>15/03/2024</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, aliquam similique laboriosam deserunt
                    atque accusamus...</p>
                <!-- post button -->
                <a href="./post.html" class="btn-arrow">Read more <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
            </article>

            <!-- post item -->
            <article class="post" data-aos="fade-down" data-aos-delay="300">
                <!-- post image -->
                <a href="./post.html">
                    <img src="./imgs/blog/post2.webp" alt="Blog post - BuildXpert template">
                </a>
                <!-- post title -->
                <h3>
                    <a href="./post.html">Iconic Projects: Architecture That Changed the World</a>
                </h3>
                <!-- post info -->
                <div class="flex">
                    <a href="./post.html">Architecture</a>
                    <span>23/06/2024</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, aliquam similique laboriosam deserunt
                    atque accusamus...</p>
                <!-- post button -->
                <a href="./post.html" class="btn-arrow">Read more <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
            </article>
        </div>
    </section>


    <!-- services block section -->
    <section class="p-0">
        <!-- service block item -->
        <article class="grid service-block">
            <!-- service image -->
            <img src="./imgs/interior.webp" alt="Service - BuildXpert template" data-aos="zoom-in" data-aos-delay="100">
            <!-- service details -->
            <div>
                <!-- title wrapper with corners -->
                <div class="title-corners title-left" data-aos="fade-down">
                    <!-- corners line -->
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>
                    <!-- title -->
                    <h5>Lorem dolor adipisicing.</h5>
                    <h2 class="mb-0">Interior design</h2>
                </div>
                <p data-aos="fade-down" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Repellendus saepe optio est, sequi corporis dolores quam praesentium adipisci facere qui, quo minima
                    pariatur recusandae, blanditiis fugit. Nisi tempora obcaecati blanditiis.</p>
                <!-- button -->
                <a href="./service.html" class="btn-arrow" data-aos="fade-down" data-aos-delay="300">Read more <i
                        class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
            </div>
        </article>
        <!-- service block item -->
        <article class="grid service-block">
            <!-- service image -->
            <img src="./imgs/idea.webp" alt="Service - BuildXpert template" data-aos="zoom-in" data-aos-delay="100">
            <!-- service details -->
            <div>
                <!-- title wrapper with corners -->
                <div class="title-corners title-left" data-aos="fade-down">
                    <!-- corners line -->
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>
                    <!-- title -->
                    <h5>Sit amet adipisicing.</h5>
                    <h2 class="mb-0">We Commit To Big Ideas</h2>
                </div>
                <p data-aos="fade-down" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Repellendus saepe optio est, sequi corporis dolores quam praesentium adipisci facere qui, quo minima
                    pariatur recusandae, blanditiis fugit. Nisi tempora obcaecati blanditiis.</p>
                <!-- button -->
                <a class="btn-plus" href="./about.html" data-aos="fade-down" data-aos-delay="300">
                    <i class="lnr lnr-cross" aria-hidden="true"></i>
                </a>
            </div>
        </article>
    </section>


    <!-- faq section -->
    <section>
        <!-- faq item -->
        <article class="faq" data-faq-opened="false" data-aos="fade-up">
            <!-- faq question -->
            <div class="faq-question">
                <div class="container">
                    <h3>Is this template easy to customize even without coding skills?</h3>
                    <button>
                        <i class="lnr lnr-chevron-down" aria-hidden="true"></i>
                        <span class="sr-only">Open/Close faq</span>
                    </button>
                </div>
            </div>
            <!-- faq answer -->
            <div class="faq-answer">
                <div class="container grid align-center">
                    <p>Yes, our template is designed to be easily customizable, even for users without coding knowledge.
                        It includes predefined page templates, clean code, and detailed documentation to guide you step
                        by step.</p>
                    <!-- image -->
                    <img src="./imgs/blog/post4.webp" alt="Faqs - BuildXpert template">
                </div>
            </div>
        </article>

        <!-- faq item -->
        <article class="faq" data-faq-opened="false" data-aos="fade-up" data-aos-delay="100">
            <!-- faq question -->
            <div class="faq-question">
                <div class="container">
                    <h3>Is the template compatible with all browsers?</h3>
                    <button>
                        <i class="lnr lnr-chevron-down" aria-hidden="true"></i>
                        <span class="sr-only">Open/Close faq</span>
                    </button>
                </div>
            </div>
            <!-- faq answer -->
            <div class="faq-answer">
                <div class="container grid align-center">
                    <!-- faq text -->
                    <div>
                        <h3>Absolutely!</h3>
                        <p>The template has been tested on all major browsers, including Chrome, Firefox, Safari, Edge,
                            and Opera, to ensure optimal viewing everywhere.</p>
                        <!-- button -->
                        <a class="btn-plus" href="#">
                            <i class="lnr lnr-cross" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- faq image -->
                    <img src="./imgs/about.webp" alt="Faqs - BuildXpert template">
                </div>
            </div>
        </article>

        <!-- faq item -->
        <article class="faq" data-faq-opened="false" data-aos="fade-up" data-aos-delay="200">
            <!-- faq question -->
            <div class="faq-question">
                <div class="container">
                    <h3>Is the template optimized for search engines (SEO)?</h3>
                    <button>
                        <i class="lnr lnr-chevron-down" aria-hidden="true"></i>
                        <span class="sr-only">Open/Close faq</span>
                    </button>
                </div>
            </div>
            <!-- faq answer -->
            <div class="faq-answer">
                <div class="container grid align-center">
                    <p>Yes, the template is built with SEO best practices, including optimized code structure,
                        appropriate meta tags, and fast page loading to enhance visibility on search engines.</p>
                    <!-- image -->
                    <img src="./imgs/historic.webp" alt="History - BuildXpert template">
                </div>
            </div>
        </article>

        <!-- faq item -->
        <article class="faq" data-faq-opened="false" data-aos="fade-up" data-aos-delay="300">
            <!-- faq question -->
            <div class="faq-question">
                <div class="container">
                    <h3>Can I get support if I encounter any issues?</h3>
                    <button>
                        <i class="lnr lnr-chevron-down" aria-hidden="true"></i>
                        <span class="sr-only">Open/Close faq</span>
                    </button>
                </div>
            </div>
            <!-- faq answer -->
            <div class="faq-answer">
                <div class="container">
                    <p>Certainly! We offer fast and professional support to answer any questions or resolve any issues
                        you may encounter.</p>
                </div>
            </div>
        </article>

        <!-- faq item -->
        <article class="faq" data-faq-opened="false" data-aos="fade-up" data-aos-delay="400">
            <!-- faq question -->
            <div class="faq-question">
                <div class="container">
                    <h3>Does the template include future updates?</h3>
                    <button>
                        <i class="lnr lnr-chevron-down" aria-hidden="true"></i>
                        <span class="sr-only">Open/Close faq</span>
                    </button>
                </div>
            </div>
            <!-- faq answer -->
            <div class="faq-answer">
                <div class="container">
                    <p>Yes, purchasing the template gives you access to future updates, which will include new features
                        and continuous improvements.</p>
                </div>
            </div>
        </article>
    </section>

    <!-- project section -->
    <section class="container">
        <!-- title wrapper with corners -->
        <div class="title-corners" data-aos="fade-up">
            <!-- corners line -->
            <span class="corner-line line1"></span>
            <span class="corner-line line2"></span>
            <span class="corner-line line3"></span>
            <span class="corner-line line4"></span>
            <!-- title -->
            <h2>Portfolio</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, quos obcaecati. Tempora laborum
                pariatur deserunt, reprehenderit illum voluptate.</p>
        </div>

        <!-- post grid -->
        <div class="grid gtc-3 mb-3">
            <!-- project item -->
            <div class="project" data-aos="zoom-in" data-aos-delay="100">
                <!-- image -->
                <img src="./imgs/project/project1.webp" alt="Project - BuildXpert template">
                <!-- hover box -->
                <div class="holder">
                    <!-- plus button link -->
                    <a class="btn-plus" href="./single-portfolio.html">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </div>
            <!-- project item -->
            <div class="project" data-aos="zoom-in" data-aos-delay="200">
                <!-- image -->
                <img src="./imgs/project/project2.webp" alt="Project - BuildXpert template">
                <!-- hover box -->
                <div class="holder">
                    <!-- plus button link -->
                    <a class="btn-plus" href="./single-portfolio.html">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </div>
            <!-- project item -->
            <div class="project" data-aos="zoom-in" data-aos-delay="300">
                <!-- image -->
                <img src="./imgs/project/project3.webp" alt="Project - BuildXpert template">
                <!-- hover box -->
                <div class="holder">
                    <!-- plus button link -->
                    <a class="btn-plus" href="./single-portfolio.html">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </div>
            <!-- project item -->
            <div class="project" data-aos="zoom-in" data-aos-delay="400">
                <!-- image -->
                <img src="./imgs/project/project4.webp" alt="Project - BuildXpert template">
                <!-- hover box -->
                <div class="holder">
                    <!-- plus button link -->
                    <a class="btn-plus" href="./single-portfolio.html">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </div>
            <!-- project item -->
            <div class="project" data-aos="zoom-in" data-aos-delay="500">
                <!-- image -->
                <img src="./imgs/project/project5.webp" alt="Project - BuildXpert template">
                <!-- hover box -->
                <div class="holder">
                    <!-- plus button link -->
                    <a class="btn-plus" href="./single-portfolio.html">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </div>
            <!-- project item -->
            <div class="project" data-aos="zoom-in" data-aos-delay="600">
                <!-- image -->
                <img src="./imgs/project/project6.webp" alt="Project - BuildXpert template">
                <!-- hover box -->
                <div class="holder">
                    <!-- plus button link -->
                    <a class="btn-plus" href="./single-portfolio.html">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- button -->
        <div class="flex align-center justify-center" data-aos="fade-up" data-aos-delay="100">
            <a href="./portfolio.html" class="btn">SHOW MORE</a>
        </div>
    </section>


    <!-- sponsor -->
    <section class="border-y">
        <div class="carousel-inline">
            <!-- item -->
            <a href="#">
                <img src="./imgs/sponsor/sponsor1.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"/>
            </a>
            <!-- item -->
            <a href="#">
                <img src="./imgs/sponsor/sponsor2.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="100"/>
            </a>
            <!-- item -->
            <a href="#">
                <img src="./imgs/sponsor/sponsor3.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="200"/>
            </a>
            <!-- item -->
            <a href="#">
                <img src="./imgs/sponsor/sponsor4.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="300"/>
            </a>
            <!-- item -->
            <a href="#">
                <img src="./imgs/sponsor/sponsor5.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="400"/>
            </a>
            <!-- item -->
            <a href="#">
                <img src="./imgs/sponsor/sponsor6.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="500"/>
            </a>
            <!-- item -->
            <a href="#">
                <img src="./imgs/logo.svg" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="600"/>
            </a>
        </div>
    </section>


    <!-- contact section -->
    <section class="container grid">
        <!-- text -->
        <div>
            <!-- title wrapper with corners -->
            <div class="title-corners title-left" data-aos="fade-down">
                <!-- corners line -->
                <span class="corner-line line1" aria-hidden="true"></span>
                <span class="corner-line line2" aria-hidden="true"></span>
                <span class="corner-line line3" aria-hidden="true"></span>
                <span class="corner-line line4" aria-hidden="true"></span>
                <!-- title -->
                <h5>Bir Mesaj Yazın</h5>
                <h2 class="mb-0">Bizimle İletişime Geçin</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">Profesyonel servis anlayışımız ile siz değerli iş ortaklarımıza
                hakettiğiniz hızlı ve kaliteli servis hizmetini ekonomik fiyatlarla vermeyi taahhüt ediyoruz.</p></p>
        </div>

        <form method="post" action="{{ route('guest.iletisim.store') }}" data-aos="zoom-in" data-aos-delay="100">
            @csrf

            <input type="text" name="name" id="name" placeholder="Adınız...">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="email" name="email" id="email" placeholder="E-posta adresiniz...">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <textarea name="message" id="message" rows="8" placeholder="Mesjınız..."></textarea>
            @error('message')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <button type="submit" style="margin-left: 5px;">Gönder</button>

            @if(session()->has('message'))
                <p> {{ session('message') }} </p>
            @endif
        </form>
    </section>

    <!-- maps section -->
    <section class="p-0">
        <!-- google maps iframe -->
        <iframe title="Maps" src="https://www.google.com/maps?q=Venice+Italy&t=&z=8&ie=UTF8&iwloc=&output=embed"
                data-aos="fade-up" data-aos-delay="300"></iframe>
    </section>
@endsection
