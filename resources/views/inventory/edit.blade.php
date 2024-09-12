@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.edit_header') }}</div>

                <div class="card-body">
                    <form id='form_update' method="POST" action="{{ route('inventory.update') }}">
                        @csrf
                        <input id="atc_id" type="hidden" value="{{$article->get('id')}}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('messages.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $article->get('name') }}" required autocomplete="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('messages.description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $article->get('description') }}" required>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('messages.quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $article->get('quantity') }}" required>

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('messages.price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $article->get('price') }}" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button class="btn btn-primary">
                                    {{ __('messages.edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        document.getElementById('form_update').addEventListener('submit', function(evt){
        
            evt.preventDefault();    

            var id = document.getElementById('atc_id').value;
            var name = document.getElementById('name').value;
            var description = document.getElementById('description').value;
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;
            var token = document.getElementsByName('_token')[0].value;

            fetch("/inventory/update", {
                headers: {
                    'X-CSRF-TOKEN': token// <--- aquí el token
                },
                method:"POST",
                body: JSON.stringify({ 
                    atc_id: id,
                    name: name,
                    description: description, 
                    quantity: quantity, 
                    price: price 
                })
            })
            .then(r => r.json())
            .then(respuesta => {
            console.log(respuesta);
});

        });

    }, false);

    
</script>

