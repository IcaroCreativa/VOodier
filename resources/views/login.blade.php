<x-layouts.app title="login" >
</x-layouts.app>


<x-slot name="login" >
    
    <br>      
   <form method="POST" action="{{Route('login_auth')}}">
       @csrf
    <div class='ml-5'>
        <label for="">
           Email <br>
       <input type="email" name=email class="border border-2" require>
       </label>  <br>
   
       <label for="">
           Password  <br>
       <input type="password" name=password class="border border-2">
       </label> <br> <br>
       <button type=submit class='bg-red-600 px-3 py-1 rounded-md text-white focus:bg-white focus:text-red-600 focus:border-red-600 focus:border'>Send</button>
   </div>
   </form>
   
   <x-slot >