@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

    {{-- @forelse ($products as $product)
        {{ $product->name }}
        <form method="post" action="{{ route('deleteFromCart', $product->url) }}">
            @csrf @method('DELETE')
            <button class="btn" type="submit"><i class="fas fa-ban"></i></button>
        </form>
        <button class="btn" onclick='minus({{$product->id}})'><i class="fas fa-minus"></i></button>
        <input type="number" min="1" id={{$product->id . "inputdata"}} value={{ $product->pivot->quantity }}>
        <button class="btn" onclick='plus({{$product->id}}, {{$product->stock}})'><i class="fas fa-plus"></i></button>
    @endforelse --}}
    @if ($products->isNotEmpty())
        <form method="post" action="{{ route('checkOutCart') }}">
            @csrf
            @foreach ($products as $product)
                {{ $product->name }}
                <a class="btn" href="#" onclick='deleteItem(event, "{{ $product->url }}")'><i class="fas fa-ban"></i></a>
                <button class="btn" onclick='minus(event, "{{$product->id}}")'><i class="fas fa-minus"></i></button>
                <input type="number" min="1" id={{$product->id . "inputdata"}} name={{ $product->id }} value={{ $product->pivot->quantity }}>
                <button class="btn" onclick='plus(event, "{{$product->id}}", "{{$product->stock}}")'><i class="fas fa-plus"></i></button>
            @endforeach
            <button class="btn" type="submit">Completar la compra</button>
        </form>
        <form id="delete-item-form" method="post" action="{{ route('deleteFromCart') }}">
            @csrf @method('DELETE')
            <input type="hidden" name="url" id="hiddenInput">
        </form>
    @endif    
@stop

<script>
    let minus = (e, id) => {
        e.preventDefault();
        let input = document.getElementById(id + "inputdata");
        if (input.value > 1) {
            input.setAttribute('value', input.value--);
        }
    }

    let plus = (e, id, stock) => {
        e.preventDefault();
        let input = document.getElementById(id + "inputdata");
        if (input.value + 1 < stock){ 
            input.setAttribute('value', input.value++);
        } else {
            alert("No tenemos tanto stock! :/")
        }
    }

    let deleteItem = (e, url) => {
        e.preventDefault();
        document.getElementById('hiddenInput').value = url;
        document.getElementById('delete-item-form').submit();
    }
</script>
