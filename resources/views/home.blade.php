@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

    <section class="social-container">
        <img src="../storage/PrideBackground.png" alt="pride-background">
        <span>
            <a class="fb" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="tw" href="#"><i class="fab fa-twitter"></i></a>
            <a class="ig" href="#"><i class="fab fa-instagram"></i></a>
        </span>
    </section>

    <!--FIN JUMBOTRON REDES SOCIALES -->

    <!-- PREGUNTAS FRECUENTES -->

    <section class="faq" id="faq">
        <article class="row align-items-center text-center justify-content-left top-buffer mb-5">
            <h2 class="col-12">Preguntas frecuentes</h2>
        </article>
        <article class="row align-items-center text-center justify-content-left top-buffer mx-5">
            <div class="col-sm-12 col-md-6">
                <h3>¿Lorem, ipsum dolor sit amet consectetur adipisicing elit?</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias unde nulla similique pariatur, eum, veritatis quo quos ad quidem doloremque dignissimos et voluptates at aliquam consectetur veniam optio! Est, accusantium?</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <h3>¿Lorem, ipsum dolor sit amet consectetur adipisicing elit?</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias unde nulla similique pariatur, eum, veritatis quo quos ad quidem doloremque dignissimos et voluptates at aliquam consectetur veniam optio! Est, accusantium?</p>
            </div>
        </article>
    </section>

    <!-- FIN PREGUNTAS FRECUENTES -->

    <section class="contact" id="contact">
        <article class="ancho-interior">
            <h2 class="contact-title">Contactanos!</h2>
            <form action={{route('contact.send')}} method="post">
                @csrf
                <span>
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                    <input name="name" type="text" class="name @error('name') is-invalid @enderror" placeholder="Tu nombre" value= {{ old('name')}}>
                </span>
                <span>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                    <input name="email" type="email" class="email @error('email') is-invalid @enderror" placeholder="Tu email" value= {{ old('email')}}>
                </span>

                <span class="message">
                    @error('message')
                        <small>{{ $message }}</small>
                    @enderror
                    <textarea name= "message" placeholder="Tu mensaje" class="message @error('message') is-invalid @enderror" value= {{ old('message')}}></textarea>
                </span>

                <button type="submit" class="btn">Enviar</button>
            </form>
        </article>
    </section>
@stop
