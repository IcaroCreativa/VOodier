
{{-- @extends('layouts.app')

@section('title')
welcome
@endsection

 @section('title','VOodies welcome') 
@section('meta-description','Meta-description page welcome')

@section('content')
  <h1>Page Welcome</h1>  
@endsection --}}




{{-- @component('components.layout')


@endcomponent --}}

<x-layouts.app 
post='Utilisando el atributo de layout llamado post en la plantilla layout'
meta-description="esto se hace 1235" {{-- esto no se imprime porque lo imprimimos desde el slot con el mismo nombre--}}
:sum="2+5" {{--utilizar los dos puntos para interpretar php en este caso hacer la suma atencion hay que pegar las comillas al igual sino no funciona--}}
>


<h1>Paginita Welcome</h1>
    <x-slot name="title">
        welcome
    </x-slot>
    
    <x-slot name="contenido">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat animi laudantium maxime deserunt praesentium at, pariatur minima eaque molestiae omnis sed? Magnam laudantium error quasi voluptatem non laborum iusto itaque?</p>
    </x-slot>
    
    <x-slot name="metaDescription">
    <br>
        Este es el contendio de mi metaDescription
        Se imprime en la plantilla desde mi vista welcome
    <br>La suma es:
    </x-slot>
   
    
    

</x-layouts.app>
    

