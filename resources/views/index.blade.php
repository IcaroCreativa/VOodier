

<x-layouts.app title="" >

  

  

    <div class="grid grid-cols-1 md:grid md:grid-cols-3 md:grid-rows-2 gap-6 ">
      @foreach($ads as $ad)
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
               {{$ad->created_at->toDateString()}}  {{--  affiche suelement la date malgré un timesatmp --}}
               
               
                </time>
               
                <p class="mb-2 mt-2 text-right text-gray-500"> {{$ad->category_id}}</p>
              
          
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

   

 
   
   


  



    
  
</x-layouts.app>