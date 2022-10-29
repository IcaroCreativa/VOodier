 {{-- @extends('layouts.app') 

 @section('title')
 create post
 @endsection

 @section('meta-description','Meta-description page create-post')

 @section('content')     //element yield de nombre content en plantilla app 
  <h1>Page Create post</h1>  
@endsection 
--}}


{{-- <x-layouts.app title="create ad">


  <x-slot name="hidden">
    hidden
    </x-slot>
    
    
    
    <x-slot name="enter_ad">
       <x-create_ad_title>
        <x-slot name="categories">
      </x-slot>
       </x-create_ad_title>   
   </x-slot>

</x-layouts.>   --}}

<h1 class="bg-blue-700 text-white">PAGINA DE CREATE POST</h1>
 {{print($categories)}}
@foreach ($categories as $category)
    <p>{{ $category->id }}: {{ $category->category }} {{ $category->created_at }}</p>
@endforeach
