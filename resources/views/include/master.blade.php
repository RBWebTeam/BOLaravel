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
 
  

   
</body>
 @include('include.footer')
 @include('include.script')
  @include('include.bankjs')
   @include('include.leadjs')
   @include('include.menujs')
 
</html>
 