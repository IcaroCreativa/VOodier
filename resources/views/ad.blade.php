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
          <?php if(!empty($ad->image)){
            $image1=$ad->image1;
          }
          else{ $image1=URL::asset('/images/camera.png');
          }
          ?>


          <img alt="ad photo"src="{{$image1}}" class="ml-28  md:hidden aspect-square rounded-xl object-cover"/>
            <div class="relative mx-auto max-w-screen-xl px-4 py-8">
        <!-- -----photos MD et LG------ -->
          <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2 grid grid-cols-1">
            <div class="grid grid-cols-2 gap-4  md:grid-cols-1">
                    
                    <?php if(!empty($ad->image)){
                      $image1=$ad->image1;
                    }
                    else{ $image1=URL::asset('/images/camera.png');
                    }
                    ?>
    
                    <img
                    alt="image1 ad"
                    src='{{Storage::url($ad->image1)}}'
                    class="aspect-square w-full rounded-xl object-cover"
                  />
          
                  <div class="grid grid-cols-2 gap-4 lg:mt-4">
                    
                    {{-- ------------img1------------------------- --}}
                    <?php if(!empty($ad->image)){
                      $image2=$ad->image2;
                    }
                    else{ $image2=URL::asset('/images/camera.png');
                    }
                    ?>
                    
                    
                    <img
                      alt='image2 ad'
                      src='{{Storage::url($ad->image1)}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />

                  {{-- ------------img2------------------------- --}}

                    <?php if(!empty($ad->image)){
                      $image3=$ad->image3;
                    }
                    else{ $image3=URL::asset('/images/camera.png');
                    }
                    ?>
                  
                    <img
                      alt='image3 ad'
                      src='{{$image3}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />

                 {{-- ------------img3------------------------- --}}
                    <?php if(!empty($ad->image)){
                      $image4=$ad->image4;
                    }
                    else{ $image4=URL::asset('/images/camera.png');
                    }
                    ?>
                    <img
                      alt='image4 ad'
                      src='{{$image4}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />
                   
                   {{-- ------------img4------------------------- --}}
                    <?php if(!empty($ad->image)){
                      $image5=$ad->image5;
                    }
                    else{ $image5=URL::asset('/images/camera.png');
                    }
                    
                    ?>
                    
                    <img
                      alt="imgage5 ad"
                      src='{{$image5}}'
                      class="aspect-square w-full rounded-xl object-cover"
                    />
                 {{-- ------------ end img4------------------------- --}}
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
          
                      <p class="mt-0.5 text-sm">{{$ad->user_id}}</p>
          
                      <div class="mt-2 -ml-0.5 flex">
                       <p class="font-medium mb-2">Description</p>
                       
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
                      <legend class="mb-1 text-sm font-medium">Condition</legend>
                        
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
                              class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-lime-500 peer-checked:text-white"
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
                              class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-amber-500 peer-checked:text-white"
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
                              class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-red-700 peer-checked:text-white"
                            >
                              Used
                            </span>
                          </label>
    
                          <!-- ----Bouton contact ----- -->
                          <div class="ml-16 md:mt-8 md:mx-10">
                            <button type="submit" class="md:w-28 p-2 rounded-md text-red-600 font-medium border-2 border-red-600 hover:border-white hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white ">Contact</button>
                        </div>
                        </div> 
                      </div>
                    </fieldset>
                   
                  </div>
             <div class=" grid col-span-2 p-2">
                <iframe class="h-72 w-full rounded-md " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41999.46370536094!2d2.31201580391723!3d48.85884954753422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1666965172762!5m2!1sfr!2sfr"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>          
        </section>
         
      </div>
    </div>
      
  </x-slot>
  
 
 
  
</x-layouts.app>