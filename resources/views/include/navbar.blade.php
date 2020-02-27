
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">KickOff</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
      <li  class="{{Request::is('about') ? 'active' : ''}}"><a href="/about">About</a></li>
      <li  class="{{Request::is('contact-us') ? 'active' : ''}}"><a href="/contact-us">Contact Us</a></li>
      <li  class="{{Request::is('tasklist') ? 'active' : ''}}"><a href="/tasklist">Task List</a></li>
      @if (Auth::check())
      <li  class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="/dashboard">Dashboard</a></li>
     
      <li  class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="/dashboard">{{ Auth::user()->fullname }}</a></li>
      <li  class="{{Request::is('account') ? 'active' : ''}}"><a href="/account">Account</a></li>
      <li><a href="{{ url('logout') }}">Logout</a></li>

      @else
      <li  class="{{Request::is('Sign Up') ? 'active' : ''}}"><a href="/signup">Sign up</a></li>
      <li  class="{{Request::is('login') ? 'active' : ''}}"><a href="/login">login</a></li>
      @endif
    </ul>
  </div>
</nav>


