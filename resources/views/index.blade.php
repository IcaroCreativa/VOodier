{{-- @extends('layouts.app')

@section('title')
inicio
@endsection
@section('meta-description','Meta-description page inicio')

@section('content')
  <h1>Page Inicio</h1>  
@endsection --}}

<x-layouts.app title=inicio>

  <h1>Paginita inicio</h1>

  <x-slot name="contenido">
      <p class="bg-red-400">Contenido de la pagina de inicio</p>
      <a href="{{route('ad')}}" class="underline text-blue-600 font-medium">Voir une annonce</a>
  </x-slot>
    
  
</x-layouts.app>