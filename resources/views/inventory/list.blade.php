@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                          <div class="col-4">
                            {{ __('messages.header_inventory') }}
                          </div>
                          <div class="col-6"></div>
                          <div class="col-2 text-right">
                            <a class="btn btn-primary" href="{{route('inventory.create')}}">
                                {{ __('messages.create') }}
                            </a>
                          </div>  
                    </div>
                </div>

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
                                    <div class="row">
                                        <div class="col-6">
                                            <a class="navbar-brand" href="{{route('inventory.edit', $article->id)}}">
                                                <i class="bi bi-pencil">{{__('messages.edit')}}</i>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="dropdown-item" href="{{ route('inventory.delete', ['id' => $article->id]) }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('delete-form').submit();">
                                                {{__('messages.delete')}}
                                            </a>

                                            <form id="delete-form" action="{{ route('inventory.delete', ['id' => $article->id]) }}" method="POST" class="d-none">
                                                @csrf
                                            </form>        
                                        </div>
                                    </div>
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
