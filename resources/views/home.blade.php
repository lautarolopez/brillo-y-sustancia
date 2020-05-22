@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')
    @if (session()->pull('sale_success')) 
        <div class="span-container">
            <span class="success"><p>Compra finalizada! </p><i class="far fa-thumbs-up"></i></span>
        </div>
    @endif
    @if (session()->pull('sale_failure', false))
        <div class="span-container">
            <span class="failure"><p>Compra rechazada </p><i class="far fa-thumbs-down"></i></span>
        </div>
    @endif
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
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <form action="/send" method="post">
                @csrf
                <span>
                    @error('name')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                    <input name="name" type="text" class="name @error('name') is-invalid @enderror" placeholder="Tu nombre" required value= {{ old('name')}}>
                </span>
                
                <span>
                    @error('email')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                    <input name="email" type="email" class="email @error('email') is-invalid @enderror" placeholder="Tu email" required value= {{ old('email')}}>
                </span>
                
                @error('message')
                    <small class="alert alert-danger">{{ $message }}</small>
                @enderror
                <textarea name= "message" placeholder="Tu mensaje" class="message @error('message') is-invalid @enderror" required value= {{ old('message')}}></textarea>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </article>
    </section>

<script>
    let div = document.querySelector('div.span-container');
    if (div){
        let span = div.firstElementChild;
        setTimeout(() => {
            span.classList.add('appear');
        }, 1);
        setTimeout(() => {
            span.classList.remove('appear');
            span.classList.add('vanish');
        }, 7000);
        setTimeout(() => {
            div.parentNode.removeChild(div);
        }, 7100);
    }    
</script>
@stop
