<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('meta-description','Default meta description')">
        <link rel="icon" type="image/png" href="{{URL::asset('/images/Voodies_favicon.png')}}" />
        <title>Voodies</title>
        @vite('resources/css/app.css')
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
       

    </head>
    <body class="">
        <x-navigation></x-navigation>
        {{$about ?? ''}} 
        {{$enter_ad ?? ''}}
        {{$contact ?? ''}}
        {{$register ?? ''}}
        {{$login ?? ''}}
        {{$add ?? ''}}
        {{$blur ?? ''}}
        {{$dashboard ?? ''}}
        {{$message ?? ''}}
        {{$index_filter ?? ''}}

    
{{-- ----------------------alert---------------------------------------- --}}
        @if(session('status'))
        <div class="z-10 flex mx-auto shadow:lg mt-32 w-1/2 xl:1/4 lg:1/3">
      <div class="modal fade  w-full h-full outline-none overflow-x-hidden overflow-y-auto"
      id="alert_message" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog relative w-auto pointer-events-none shadow:lg ">
        <div
          class=" bg-gray-100 border shadow:lg border-gray-300 modal-content  shadow-lg relative flex flex-col w-full pointer-events-auto  bg-clip-padding rounded-md  text-current">
          <div
            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <img src="{{URL::asset('/images/Voodies_logo100.png')}}" alt="logo voodies" class="h-8 w-8">
            
           
          </div>
          <div class="modal-body relative p-4">
            {{session('status')}}
          </div>
          <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
            <button type="button" onclick="close_alert()"
              class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
              data-bs-dismiss="modal">Close</button>
    
          </div>
        </div>
      </div>
    </div>
    </div>
          <script>
            //permet de rendre invisible l'alert
              $alert=document.getElementById('alert_message');
              function close_alert(){
                $alert.style.display = 'none';
                document.location.href="/index";
              }
            </script>
          @endif
    
        
      

   {{-- ----------------------------------CONTENU + FILTRE-------------------     --}}
        <section>
            <div class="  mx-auto max-w-screen-xl  px-4  py-6 sm:px-4 lg:px-4 {{request()->routeIs('home') ?'' :'hidden'}}">
              <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:items-start">
                <div class=" ">
                  <details open class="overflow-hidden rounded border border-gray-200">
                    <summary
                      class="flex items-center justify-between text text-white px-5 py-3 bg-gradient-to-r from-blue-900 via-blue-600 to-blue-500 lg:hidden"
                    >
                      <span class="text-sm font-medium"> Toggle Filters </span>
          
                      <svg
                        class="h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"
                        />
                      </svg>
                    </summary>
          
                    <form class="border-t border-gray-200 lg:border-t-0" action="{{Route('filter_post')}}" method="post" >
                      @csrf
                      {{-- --- LISTE DEROULANTE CATEGORIES ----  --}}
                      <fieldset>
                        <legend
                          class="block w-full bg-gray-50 px-5 py-3 font-medium  text-sm text-white font-medium bg-gradient-to-r from-red-800 via-red-600 to-red-500"
                        >
                        </legend>
          
                        <div class="space-y-2 px-5 py-6">
                          <div class="flex items-center">
                            {{-- {{dd($categories)}} --}}
                              <select 
                                name="category" id="category" class="w-36 border border-gray-400 rounded-sm" >
                                @foreach($categories as $category)
                                    <option value="{{$category->category ?? ''}}">{{$category->category ?? ''}}</option>
                                @endforeach
                              </select>                                
                          </div>
                                 
                          <div class="pt-2">
                            <button type="button" class="text-xs text-gray-500 underline">
                              Reset category
                            </button>
                          </div>
                        </div>
                      </fieldset>
               
                      {{-- --- CASES A COCHER CONDITION ----  --}}
                      <div>
                        <fieldset>
                          <legend
                            class="block w-full bg-gray-50 px-5 py-3 font-medium  text-sm text-white font-medium bg-gradient-to-r from-red-800 via-red-600 to-red-500"
                          >
                            Condition
                          </legend>
          
                          <div class="space-y-2 px-5 py-6">
                            <div class="flex items-center">
                              <input
                                id="3+"
                                type="checkbox"
                                name=etat[0]
                                class="h-5 w-5 rounded border-gray-300"
                              />
          
                              <label for="new" class="ml-3 text-sm font-medium">
                                New
                              </label>
                            </div>
          
                            <div class="flex items-center">
                              <input
                                id="good"
                                type="checkbox"
                                name=etat[1]
                                class="h-5 w-5 rounded border-gray-300"
                              />
          
                              <label for="new" class="ml-3 text-sm font-medium">
                                Good
                              </label>
                            </div>
          
                            <div class="flex items-center">
                              <input
                                id="12+"
                                type="checkbox"
                                name=etat[2]
                                class="h-5 w-5 rounded border-gray-300"
                              />
          
                              <label for="12+" class="ml-3 text-sm font-medium">
                                Used
                              </label>
                            </div>
          
                         
                            <div class="pt-2">
                              <button
                                type="button"
                                class="text-xs text-gray-500 underline"
                              >
                                Reset Age
                              </button>
                            </div>
                          </div>
                        </fieldset>
                      </div>
          
                      {{-- --- ZONE DE SAISIE PRICE ----  --}}
                      <div>
                        <fieldset>
                          <legend
                            class="block w-full  px-5 py-3 text-sm text-white font-medium bg-gradient-to-r from-red-800 via-red-600 to-red-500"
                          >
                            Price
                          </legend>
          
                          <div class="space-y-2 px-5 py-6">
                            <div class="flex items-center">
                              <label for="new" class="ml-3 text-sm font-medium ">
                                Max
                              </label>
                              <input
                                id="number"
                                type="number"
                                name="number_max"
                                class="h-6 w-20 ml-4 pl-2 pr-2 rounded border-gray-300 border border-gray-400"
                              />
                            </div>
        
                            <div class="">
                              <div class="flex items-center">
                                <label for="new" class="ml-3 text-sm font-medium ">
                                  Min
                                </label>
                                <input
                                  id="number"
                                  type="number"
                                  name="number_min"
                                  class="h-6 w-20 ml-5 pl-2 pr-2 rounded border-gray-300 border border-gray-400"
                                />
                              </div>
          
                           
                            <div class="pt-2">
                              <button
                                type="button"
                                class="text-xs text-gray-500 underline"
                              >
                                Reset location
                              </button>
                            </div>
                          </div>
                        </fieldset>
                      </div>
        
                      {{-- --- ZONE DE SAISIE LOCATION ----  --}}
                      <div>
                        <fieldset>
                          <legend
                            class="block w-full  px-5 py-3  text-white text-sm font-medium bg-gradient-to-r from-red-800 via-red-600 to-red-500"
                          >
                            Location
                          </legend>
          
                          <div class="space-y-2 px-5 py-6">
                            <div class="flex items-center">
                              <label for="new" class="ml-3 text-sm font-medium ">
                                Ville
                              </label>
                              <input
                                id="location"
                                type="text"
                                name="location"
                                class="h-6 w-24 ml-4 pl-2 pr-2 rounded border-gray-300 border border-gray-400"
                              />
                            </div>
          
                           
                            <div class="pt-2">
                              <button
                                type="button"
                                class="text-xs text-gray-500 underline"
                              >
                                Reset location
                              </button>
                            </div>
                          </div>
                        </fieldset>
                      </div>
          
                      {{-- --- ANNULER / ENVOYER FILTRES ----  --}}
                      <div
                        class="flex justify-between border-t border-gray-200 px-5 py-3"
                        >
                        <button
                          name="reset"
                          type="submit"
                          class="rounded text-xs font-medium text-gray-600 underline"
                        >
                          Reset filters
                        </button>
          
                        <button
                          name="commit"
                          type="submit"
                          class="rounded-md  p-2 hover:text-black hover:font-medium text-white bg-gradient-to-r from-blue-900 via-blue-600 to-blue-500"
                        >
                          Apply Filters
                        </button>
                      </div>

                    </form>

                  </details>
                </div>

                <div class="lg:col-span-3">
        
                   {{-- <div class="{{request()->routeIs('home', 'index_filter') ?'' :'hidden'}}"> --}}
                    {{-- <div class="{{request()->routeIs('index_filter') ?'' :'hidden'}}"> --}}
                    <div>
                    {{$slot ?? ''}}
                    
                   
                    </div>
                  
                </div>
                </div>
              </div>
            </div>   
          </section>

         
          <script>
            window.addEventListener('resize', () => {
              const desktopScreen = window.innerWidth < 768
              document.querySelector('details').open = !desktopScreen
            })
          </script>


            
    </body>
    
</html>