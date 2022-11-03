<x-app-layout>
    <x-slot name="dashboard">


 
 
{{--    
 {{$post->category_id ?? ''}}
    {{$post->title}}
    {{$post->price}}
    {{$post->description}}
    {{$post->location}}
    {{$post->condition_id}}
    {{$post->created_at}}
    {{$post->updated_at}} 
    {{$post->image1}}
    {{$post->image2}}
    {{$post->image3}}
    {{$post->image4}}
    {{$post->image5}}  

    {{die()}} --}}


    <div class="grid grid-cols-1 mt-4">
        <div class="boucle">

            <div class="mx-auto max-w-screen-xl px-10 pr-10 sm:px-6 lg:px-8 ">
                <div class=" mx-auto max-w-lg  ">
                    <section class="shadow-2xl">
<form action="{{route('ad_updated',['id'=>$post->id])}}" method='POST'>
    @csrf
    @method('put')                    
                            <div class="relative mx-auto max-w-screen-xl px-10 py-8">
                            <!-- -----photos MD et LG------ -->
                            <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2  ">
                                <div class="colonne1 hidden  md:grid md:grid-cols-2 md:gap-4  md:grid-cols-1">



                                    <img alt="image1 ad" src='camera.png'
                                        class="   aspect-squarew-full rounded-xl object-cover" />

                                    <div class="grid grid-cols-2 gap-4 lg:mt-4">



                                        <img alt='image2 ad' src='camera.png'
                                            class="aspect-square w-full rounded-xl object-cover" />



                                        <img alt='image3 ad' src='camera.png'
                                            class="aspect-square w-full rounded-xl object-cover" />

                                        <img alt='image4 ad' src='camera.png'
                                            class="aspect-square w-full rounded-xl object-cover" />



                                        <img alt="imgage5 ad" src='camera.png'
                                            class="aspect-square w-full rounded-xl object-cover" />

                                    </div>
                                </div>

                                <div class=" colonne2">
                                    <strong
                                        class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600">
                                        <label for="category"></label>
                                        <select name="category" id="category">
                                            <option class="text-red-600">{{$post->category_id}}</option>
                                             @foreach($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->category_id}}</option>
                                            @endforeach 
  
                                        </select>
                                       
                                    </strong>

                                    <div class="mt-8 flex justify-between">
                                        <div class="max-w-[35ch] ">
                                            <div class="mt-4 grid align-start -ml-2">
                                            <label for="tile" class="text-base w-20  font-medium text-slate-600" >
                                                    Title
                                            </label>
                                            <input required type="text" id="title" name="title" value={{$post->title}} class="border rounded-sm border-slate-400">
                                            </div>

                                            <fieldset class="mt-4 space-x-6">
                                                <?php  
                                                $offer="";
                                                $request="";
                                                
                      
                                                switch ($post->type_ad) {
                                                    case 'offer':
                                                        $offer="checked";
                                                        break;
                                                    case 2:
                                                        $request="checked";
                                                        break;
                                                    default:
                                                        $offer="";
                                                        $request="checked";
                                                        
                                                }
                                         ?>


                                                <div class="flow-root ">
                                                    <div class="-m-0.5 flex flex-wrap ">
                                                        <label for="new" class="cursor-pointer p-0.5 ">
                                                            <input  {{$request}} type="radio" name="new"
                                                                id="new" class="peer sr-only " />

                                                            <span
                                                                class="group inline-flex h-6 w-16  items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-lime-500 peer-checked:text-white">
                                                                Request
                                                            </span>
                                                        </label>

                                                        <label for="good" class="cursor-pointer p-0.5 ">
                                                            <input {{$offer}}  type="radio" name="good"
                                                                id="good" class="peer sr-only " />

                                                            <span
                                                                class="group inline-flex h-6 w-16 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-amber-500 peer-checked:text-white">
                                                                Offer
                                                            </span>
                                                        </label>
                                            </fieldset>
                                          
                                    <!-- --------------Price---------------------- -->
                                        <div class="mt-4 grid align-start -ml-2 ">
                                            <label for="price" class="text-base w-20  font-medium text-slate-600  ">Price</label>
                                            <input required type="number" name="price" id="price" value="{{$post->price}}" class=" w-24 pl-2 border border-slate-400 rounded-sm" min="0">
                                        </div>
                                            
                                        </div>

                    
                                    </div>
                                    <!-- ---------DESCRIPTION---------------- -->
                                    <div class="grid mt-2">
                                        <div class="mt-2 grid align-start -ml-2 ">
                                            <label for="description" class="text-base w-20  font-medium text-slate-600 ">Description</label>
                                            <textarea required name="description" id="description" cols="32" rows="6" class=" w-60 md:w-52 rounded-sm pl-2 text-sm border border-slate-400" >{{$post->description}} </textarea>
                                                
                                          
                                        </div>

                                    </div>
                                    <!-- ---END DESCRIPTION----- -->

                                    <!-- -------LOCATION-------- -->
                                    <div  class="mt-2 grid align-start -ml-2 "> 
                                        <label for="location" class="text-base w-20  font-medium text-slate-600 ">Location</label>
                                        <input required type="number" id="location" name="location"  value="{{$post->location}}" class="border rounded-sm border-slate-400"> 
                                        
                                    </div>
                                    <!-- ---------END LOCATION ------- -->
                                    
                                    <fieldset class="mt-4 space-x-6">

                                    <legend class="mb-1  text font-medium text-slate-600 -ml-2">Condition</legend>




                                        <div class="flow-root ">
                                            <div class=" flex flex-wrap ">

                                                <?php  
                                                $newcondition="";
                                                $goodcondition="";
                                                $usedcondition="";
                      
                                                switch ($post->condition_id) {
                                                    case 1:
                                                        $newcondition="checked";
                                                        break;
                                                    case 2:
                                                        $goodcondition="checked";
                                                        break;
                                                    case 3:
                                                        $usedcondition="checked";
                                                        break;
                                                    default:
                                                        $newcondition="";
                                                        $goodcondition="";
                                                        $usedcondition="";
                                                }
                                         ?>
                                                <label for="new" class="cursor-pointer p-0.5 ">
                                                    <input  {{$newcondition}} type="radio" name="new" id="new"
                                                        class="peer sr-only " />

                                                    <span
                                                        class="group inline-flex h-6 w-12 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-lime-500 peer-checked:text-white">
                                                        New
                                                    </span>
                                                </label>

                                                <label for="good" class="cursor-pointer p-0.5">
                                                    <input {{$goodcondition}}  type="radio" name="good"
                                                        id="good" class="peer sr-only" />

                                                    <span
                                                        class="group inline-flex h-6 w-12 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-amber-500 peer-checked:text-white">
                                                        Good
                                                    </span>
                                                </label>

                                                <label for="used" class="cursor-pointer p-0.5">
                                                    <input {{$usedcondition}}  type="radio" name="used"
                                                        id="usded" class="peer sr-only" />

                                                    <span
                                                        class="group inline-flex h-6 w-12 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-red-700 peer-checked:text-white">
                                                        Used
                                                    </span>
                                                </label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </fieldset>

                                      <!-- ----Boutons Modify and Delete ----- -->

                                      <div class="grid col-span-2  mx-auto ">
                                        <div class="grid grid-cols-2 gap-10 ">
                                          
                                          <button  href="" type="submit" class="sm:w-40 w-24 rounded-md  hover:text-white hover:bg-gradient-to-r from-blue-900 via-blue-600 to-blue-500 border border-blue-900 font-medium  text-blue-900">Modify</button>

                                          {{-- <button href="" class="sm:w-40 w-24 rounded-md text-red-600 font-medium border-2 border-red-600 hover:border-white hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">Delete</button> --}}

                                        </div>
                                      </div>
                                    


                                    <!-- {{-- ----------------------image MOBILE------------------------ --}} -->
                                    <div class="grid col-span-2 w-1/2 mx-auto md:hidden">
                                        <img alt='camera.png' src='phone.png'
                                                class="aspect-square w-full rounded-xl object-cover" />
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-4  md:hidden">
                                        <div class="grid grid-cols-1 ml-4  gap-4 ">

                                            <!-- {{-- ------------img1------------------------- --}} -->
                                            <img alt='camera.png' src='phone.png'
                                                class="aspect-square w-full rounded-xl object-cover" />
                                            <!-- {{-- ------------img2------------------------- --}} -->
                                            <img alt='image3 ad' src='phone.png'
                                                class="aspect-square w-full rounded-xl object-cover" />
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 ml-4 ">
                                            <!-- {{-- ------------img3------------------------- --}} -->
                                            <img alt='image4 ad' src='phone.png'
                                                class="aspect-square w-full rounded-xl object-cover" />

                                            <!-- {{-- ------------img4------------------------- --}} -->

                                            <img alt="imgage5 ad" src='phone.png'
                                                class="aspect-square w-full rounded-xl object-cover" />

                                        </div>
                                    </div>
                                    <!-- {{-- -------------------------fin images mobile--------------------}} -->
                    </form>           
                 </section>
                </div>
            </div>
        </div>
    </div>

    


</x-slot>

</x-app-layout>