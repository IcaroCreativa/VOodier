{{-- @extends('layouts.app')

@section('title')
post
@endsection
@section('meta-description','Meta-description page post')
@section('content')
  <h1>Page Post</h1>  
@endsection --}}

{{-- "ICI ON FIT LE DISPLAY D'UN SEUL ANNONCE" --}}



<x-layouts.app >
  <x-slot name="title">{{$ad->title}}</x-slot>
  <x-slot name="meta-Description">We are Epitech's student</x-slot>
  

  <x-slot name="about">
 
    <div class="mx-auto max-w-screen-xl px-4  sm:px-6 lg:px-8 ">
      <div class=" mx-auto max-w-lg  ">
        <section class="shadow-2xl ">
          
        <div class="relative mx-auto max-w-screen-xl px-4 py-8">
        <!-- -----photos MD et LG------ -->
          <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2  ">
            <div class=" hidden  md:grid md:grid-cols-2 md:gap-4  md:grid-cols-1">
               
                {{-- ------------img1------------------------- --}}
                    <?php 
                    $image1='/images/camera.png';
                    if(isset($ad->image1)){
                      $image1=$ad->image1;
                      $image1=Storage::url($ad->image1);
                      
                    }
                    
                    ?>
    
                    <img
                    alt="image1 ad"
                    src='{{$image1}}'
                    class="   aspect-squarew-full rounded-xl object-cover"
                  />
          
                  <div class="grid grid-cols-2 gap-4 lg:mt-4">
                    
                    {{-- ------------img2------------------------- --}}
                    <?php 

                    $image2=URL::asset('/images/camera.png');
                    if(isset($ad->image2)){
                      $image2=$ad->image2;
                      $image2=Storage::url($ad->image2);
                    }
                     
                    ?>
                    
                    
                    <img
                      alt='image2 ad'
                      src='{{$image2}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />

                  {{-- ------------img3------------------------- --}}

                    <?php 
                    $image3=URL::asset('/images/camera.png');
                    if(isset($ad->image3)){
                      $image3=$ad->image3;
                      $image3=Storage::url($ad->image3);
                    }
                     
                    ?>
                  
                    <img
                      alt='image3 ad'
                      src='{{$image3}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />

                 {{-- ------------img4------------------------- --}}
                    <?php 
                    $image4=URL::asset('/images/camera.png');
                    if(isset($ad->image4)){
                      $image4=$ad->image4;
                      $image4=Storage::url($ad->image4);
                    }
                    
                    ?>
                    <img
                      alt='image4 ad'
                      src='{{$image4}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />
                   
                   {{-- ------------img5------------------------- --}}
                    <?php 
                    $image5=URL::asset('/images/camera.png');
                    if(isset($ad->image5)){
                      $image5=$ad->image5;
                      $image5=Storage::url($ad->image5);
                    }
                    ?>
                    
                    <img
                      alt="imgage5 ad"
                      src='{{$image5}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />
                 {{-- ------------ end images------------------------- --}}
                  </div>
                </div>

                <div class="">
                  <strong
                    class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600"
                  >
                 
                  {{$ad->category_id}}
                  
                  </strong>
          
                  <div class="mt-8 flex justify-between">
                    <div class="max-w-[35ch] ">
                      <h1 class="text-2xl font-bold">
                        {{$ad->title}}
                      </h1>

                      <fieldset class="mt-4 space-x-6">
                        <?php  
                            $offer="";
                            $request="";
                            
  
                            switch ($ad->type_ad) {
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
                              <input disabled
                                {{$request}} 
                                type="radio"
                                name="new"
                                id="new"
                                class="peer sr-only "
                              />
            
                              <span
                                class="group inline-flex h-6 w-16  items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-lime-500 peer-checked:text-white"
                              >
                                Request
                              </span>
                            </label>
            
                            <label for="good" class="cursor-pointer p-0.5 ">
                              <input
                              {{$offer}}
                                disabled
                                type="radio"
                                name="good"
                                id="good"
                                class="peer sr-only "
                              />
            
                              <span
                                class="group inline-flex h-6 w-16 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-amber-500 peer-checked:text-white"
                              >
                                Offer
                              </span>
                            </label>
                          </fieldset>



                      <p class="mt-0.5 text-sm">{{$ad->user_id}}</p>
          
                      <div class="mt-2 -ml-0.5 flex">
                       <p class="font-medium mb-2 text-slate-600">Description</p>
                       
                      </div>
                    </div>
          
                    <p class="text-lg w-20 text-right font-bold  ">{{$ad->price}} €</p>
                  </div>
                  <!-- ---------Description---------------- -->
                      <div class="grid">
                        <div class="prose max-w-none group-open:hidden">
                          <p>
                            {{$ad->description}}
                          </p>
                        </div>
          
                      </div>
                    <!-- ---END DESCRIPTION----- -->
    
                    <fieldset class="mt-4 space-x-6">
                      <legend class="mb-1 py-4 text font-medium text-slate-600">Condition</legend>
                        
                      <?php  
                          $newcondition="";
                          $goodcondition="";
                          $usedcondition="";

                          switch ($ad->condition_id) {
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
                                  $goodcondition="checked";
                                  $usedcondition="";
                          }
                   ?>


                      <div class="flow-root ">
                        <div class="-m-0.5 flex flex-wrap ">
                          <label for="new" class="cursor-pointer p-0.5 ">
                            <input disabled
                              {{$newcondition}} 
                              type="radio"
                              name="new"
                              id="new"
                              class="peer sr-only "
                            />
          
                            <span
                              class="group inline-flex h-6 w-12 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-lime-500 peer-checked:text-white"
                            >
                              New
                            </span>
                          </label>
          
                          <label for="good" class="cursor-pointer p-0.5">
                            <input
                            {{$goodcondition}}
                              disabled
                              type="radio"
                              name="good"
                              id="good"
                              class="peer sr-only"
                            />
          
                            <span
                              class="group inline-flex h-6 w-12 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-amber-500 peer-checked:text-white"
                            >
                              Good
                            </span>
                          </label>
          
                          <label for="used" class="cursor-pointer p-0.5">
                            <input
                            {{$usedcondition}}
                              disabled
                              type="radio"
                              name="used"
                              id="usded"
                              class="peer sr-only"
                            />
          
                            <span
                              class="group inline-flex h-6 w-12 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-red-700 peer-checked:text-white"
                            >
                              Used
                            </span>
                          </label>
    
                          <!-- ----Bouton contact ----- -->
                          <div class="ml-16 mt-8  md:mt-8 md:mx-10">
                            <button type="submit" class="md:w-28 p-2 h-12 w-32 rounded-md text-red-600 font-medium border-2 border-red-600 hover:border-white hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white ">Contact</button>
                        </div>
                        </div> 
                      </div>
                    </fieldset>
{{-- ----------------------image MOBILE------------------------ --}}
<div class="grid grid-cols-2 mt-4 gap-4 md:hidden">
<div class="grid grid-cols-1 gap-4 mt-4">
                    
  {{-- ------------img1------------------------- --}}
  <img
    alt='image2 ad'
    src='{{$image1}}'
    class="aspect-square w-full rounded-xl object-cover"
  />
{{-- ------------img2------------------------- --}}
  <img
    alt='image3 ad'
    src='{{$image2}}'
    class="aspect-square w-full rounded-xl object-cover"
  />
</div>
<div class="grid grid-cols-1 gap-4 mt-4" >
{{-- ------------img3------------------------- --}}
  <img
    alt='image4 ad'
    src='{{$image3}}'
    class="aspect-square w-full rounded-xl object-cover"
  />
 
 {{-- ------------img4------------------------- --}}

  <img
    alt="imgage5 ad"
    src='{{$image4}}'
    class="aspect-square w-full rounded-xl object-cover"
  />

</div>
</div>
 {{-- -------------------------fin images mobile--------------------}}
                
  </div>
  {{-- ------------MAP ----------------- --}}
             <div class=" grid col-span-2 p-2">
                <iframe class="h-72 w-full rounded-md " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41999.46370536094!2d2.31201580391723!3d48.85884954753422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1666965172762!5m2!1sfr!2sfr"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>          
        </section>
         
      </div>
    </div>
      
  </x-slot>
  
 
 
  
</x-layouts.app>