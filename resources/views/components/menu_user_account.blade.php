

<section id="account_menu" class="  fixed inset-y-0 right-0 z-50 flex mt-1 mr-40 md:mr-6 md:mt-16 lg:mr-32 xl:mr-64 2xl:mr-96">
    <div class="max-w-sm">
      <div class="flex  flex-col divide-y divide-gray-200 bg-slate-50 border rounded-md">
        <div class="">
          <header class="flex h-7 mr-5 items-center pl-6">
            <span class="text-sm   font-medium uppercase tracking-widest">
              {{Auth::user()->login}}
            </span>
  
            <button
             onclick="close_menu()"
              aria-label="Close menu"
              class="h-4 w-4 pl-2  border-gray-400"
              type="button"
              name="close_bar"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="mx-auto h-5 w-5 stroke-blue-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </header>
          <nav
            class="flex h-8 flex-col divide-y divide-gray-200 border-t border-b border-gray-200 text-sm font-medium text-gray-500"
          >
          <form action="{{route('logout')}}" method='POST'>
            @csrf
            <button href="" class="flex items-center px-6 py-1">
              <svg class="w-6 h-6 stroke-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
               <p class="ml-2"> Logout</p>
            </button>
          </form>
          </nav>
        </div>
      </div>
    </div>
  </section>
  


<script>
//permet de rendre invisible le menu account
  $account=document.getElementById('account_menu');
  function close_menu(){
    $account.style.display = 'none';
  }
</script>