

<div class="mx-auto max-w-screen-xl px-4  sm:px-6 lg:px-8 ">
  <div class=" mx-auto max-w-lg  ">
    <section class="shadow-2xl ">
      <img alt="ad photo"src="camera_plus.png" class="ml-28  md:hidden aspect-square rounded-xl object-cover"/>
        <div class="relative mx-auto max-w-screen-xl px-4 py-8">
    <!-- -----photos MD et LG------ -->
      <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2 grid grid-cols-1">
        <div class="grid grid-cols-2 gap-4  md:grid-cols-1">
              <img
                alt="ad photo"
                src="{{URL::asset('/images/camera.png')}}"
                class="aspect-square w-full rounded-xl object-cover"
              />
      
              <div class="grid grid-cols-2 gap-4 lg:mt-4">
                <img
                  alt="img1"
                  src="{{URL::asset('/images/camera.png')}}"
                  class="aspect-square w-full rounded-xl object-cover"
                />
      
                <img
                  alt="img2"
                  src="{{URL::asset('/images/camera.png')}}"
                  class="aspect-square w-full rounded-xl object-cover"
                />
      
                <img
                  alt="img3"
                  src="{{URL::asset('/images/camera.png')}}"
                  class="aspect-square w-full rounded-xl object-cover"
                />
      
                <img
                  alt="img4"
                  src="{{URL::asset('/images/camera.png')}}"
                  class="aspect-square w-full rounded-xl object-cover"
                />
              </div>
            </div>
      
            <div class="">
              <strong
                class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600"
              >
                Category
              </strong>
      
              <div class="mt-8 flex justify-between">
                <div class="max-w-[35ch]">
                  <h1 class="text-2xl font-bold">
                    Ad title
                  </h1>
      
                  <p class="mt-0.5 text-sm">user name</p>
      
                  <div class="mt-2 -ml-0.5 flex">
                   <p class="font-medium mb-2">Description</p>
                   
                  </div>
                </div>
      
                <p class="text-lg font-bold">Price €</p>
              </div>
              <!-- ---------Description---------------- -->
                  <div class="grid">
                    <div class="prose max-w-none group-open:hidden">
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa
                        veniam dicta beatae eos ex error culpa delectus rem tenetur,
                        architecto quam nesciunt, dolor veritatis nisi minus
                        inventore, rerum at recusandae?
                      </p>
                    </div>
      
                  </div>
                <!-- ---END DESCRIPTION----- -->

                <fieldset class="mt-4 space-x-6">
                  <legend class="mb-1 text-sm font-medium">Condition</legend>
      
                  <div class="flow-root ">
                    <div class="-m-0.5 flex flex-wrap ">
                      <label for="new" class="cursor-pointer p-0.5 ">
                        <input disabled
                          checked 
                          type="radio"
                          name="new"
                          id="new"
                          class="peer sr-only "
                        />
      
                        <span
                          class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                        >
                          New
                        </span>
                      </label>
      
                      <label for="good" class="cursor-pointer p-0.5">
                        <input
                          disabled
                          type="radio"
                          name="good"
                          id="good"
                          class="peer sr-only"
                        />
      
                        <span
                          class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                        >
                          Good
                        </span>
                      </label>
      
                      <label for="used" class="cursor-pointer p-0.5">
                        <input
                          disabled
                          type="radio"
                          name="used"
                          id="usded"
                          class="peer sr-only"
                        />
      
                        <span
                          class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white"
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
