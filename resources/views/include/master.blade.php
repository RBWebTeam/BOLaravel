<!DOCTYPE html>
<html>
<link rel="manifest" href="/manifest.json">
         @include('include.head')
<body>
 
 
             @include('include.header')

             <div class="wrapper">
             @include('include.sidebars')
             <div id="content">
              @yield('content')
             </div>
             </div>
 
  

   <div id="loading" style="position: absolute;z-index: 1000;left: 44%;top: 40%; ">
   <img src="loading.gif" width="100" />

  </div>  
</body>
 @include('include.footer')
 @include('include.script')
  @include('include.bankjs')
   @include('include.leadjs')
   @include('include.menujs')
 
</html>
 