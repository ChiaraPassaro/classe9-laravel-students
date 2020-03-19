@include('partials._head')
  {{-- wrapper --}}
  <div class="wrapper">
    {{-- header  --}}
    @include('partials._header')
    {{-- nav --}}
    {{-- jumbo --}}
    <div class="jumbo container-fluid">
      @yield('jumbo')
    </div>
    
    {{-- main --}}
    <main class="container">
      @yield('main')
    </main>
    {{-- footer --}}
    @include('partials._footer-menu')
  </div>
  @yield('scripts')
@include('partials._footer')


