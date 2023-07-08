@include('partials.header')
@include('partials.navbar')
@include('partials.sidebar')
<div id="app">
    <div class="main-wrapper">
      <!-- Main Content -->
      <div class="main-content">
     @yield('content')
      </div>
      @include('partials.footer')