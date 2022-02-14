<!doctype html>
<html lang="en">
    
  <x-header></x-header>

  <main>

    @yield('page-header-h1')

    <div class="album py-5 bg-light">
      <div class="container">

      @yield('content')

      </div>
    </div>

    <div class="container content-footer">
      @yield('content-footer')
    </div>

  </main>


  <x-footer></x-footer>
      
  </body>
</html>
