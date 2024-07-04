 @include('template.head')
@stack('css')
 <body class="g-sidenav-show   bg-gray-100">
     <div class="min-height-300 bg-primary position-absolute w-100"></div>
     @include('template.sidebar')
     <main class="main-content position-relative border-radius-lg ">
         @include('template.navbar')
         <div class="container-fluid py-4">
             @yield('content')
             @include('template.footer')
         </div>
     </main>
     @include('template.scripts')
 </body>

 @stack('js')

 </html>
