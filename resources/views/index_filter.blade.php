Je suis dans la page des filtres

{{-- @include('layouts/app') --}}

{{-- {{dd($query)}} --}}

@foreach($query as $items)
<table>

<ol>
  <li>{{$items->title}}
    <ul>
      <li>Catégorie : {{$items->category_id}}</li>
      <li>description : {{$items->description}}</li>
      <li>prix : {{$items->price}}</li>
      <li>contact : {{$items->user_id}}</li>
      <li>localisation : {{$items->location}}</li>
      <li>condition : {{$items->condition_id}}</li>
      <li>photo : {{$items->image1}}</li>
    </ul>
  </li>
</ol>

@endforeach



{{dd()}}

{{-- <x-layouts.app title="" > --}}

  
  <x-app-layout >
  
    <x-slot name="index_filter">

    <div class="grid grid-cols-1 md:grid md:grid-cols-3 md:grid-rows-2 gap-6 ">
      
      
      {{-- @if($ads->count()==0)
      <div class="mx-auto mt-20 p-10 w-3/4 grid col-span-3  grid rows-span-2 rounded-lg shadow-lg bg-slate-100 justify-items-center"> 
        <img src="{{Storage::url('\images\advertising.png')}}" alt="favicon ad">
        <h1 class="text-slate-700 md:text-3xl text-center text-justify ">Wow, it seems there are no ads. Connect and send us your first ad!!</h1> 
      </div>
      @endif --}}
      {{-- {{dd($query)}} --}}

      @foreach($query as $ad)
      <a href="{{$ad->id}}">
      <div class="">
        <div class="mt-8">
          <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg">
              <img
                alt="Office"
                src="{{Storage::url($ad->image1)}}"
                class="h-32 w-full object-cover"
              />
              
            
              <div class="bg-white p-4 sm:p-6">
                <time datetime="2022-10-10" class="block  text-xs text-gray-500">
               {{$ad->created_at->toDateString()}}  {{--  affiche seulement la date malgré un timesatmp --}}
               
               
                </time>
               
              <div class="w-full flex justify-end">
                <p class="mb-2 mt-2 text-center text-white w-24 rounded-sm  pl-1 bg-gradient-to-r from-blue-900 via-blue-600 to-blue-500"> {{$ad->category_id}}</p>
              </div>
 
          
             <div class="grid grid-cols-2 grid-rows-1">
              <div class="grid">
                  <h3  class="mt-0.5 text-lg font-medium  text-gray-900">
                     {{-- {{$ad->creates_at}} --}}
                     {{$ad->title}}
                  </h3>
              </div>
              <div class="grid justify-end">
                  <h3 class="mt-0.5 text-lg text-gray-900">
                    {{-- {{$ad['price']}} --}}
                    {{$ad->price}} €
                  </h3>
              </div>
              </div>
                <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3 text-justify">
                  {{-- {{$ad['description']}} --}}
                  {{$ad->description}}
                </p>
                
                <div clas="grid">
                <p class="mt-2 inline-block font-medium">Location</p>
                <p class="mt-2 bg-gray-50 p-2 text-right w-full">{{$ad->location}} </p> {{-- {{$ad['zip']}}  {{$ad['location']}} --}}
                </div>
              
              </div>
            </article>
          </div>
      </div></a>
      @endforeach
    </div>

   

 
  </x-slot>
  

  </x-app-layout>
    
{{--   
</x-layouts.app> --}}