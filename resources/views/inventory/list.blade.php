@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.header_inventory') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">{{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.description') }}</th>
                            <th scope="col">{{ __('messages.quantity') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col">{{ __('messages.options') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr class="text-left">
                                <th>{{$article->name}}</th>
                                <td>{{$article->description}}</td>
                                <td>{{$article->quantity}}</td>    
                                <td>{{'$'.$article->price}}</td>
                                <td>
                                    <a class="navbar-brand" href="{{route('inventory.edit', $article->id)}}">
                                        <i class="bi bi-pencil">Editar</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
