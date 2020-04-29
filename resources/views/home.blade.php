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
            <form action="#contact" method="post">
                @csrf
                <input name="name" type="text" class="name" placeholder="Tu nombre" value= {{ old('name')}}>
                <input name="email" type="email" class="email" placeholder="Tu email" value= {{ old('email')}}>
                <textarea name= "message" placeholder="Tu mensaje" class="message" value= {{ old('message')}}></textarea>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </article>
    </section>
@stop
