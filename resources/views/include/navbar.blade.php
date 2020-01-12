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
    </ul>
  </div>
</nav>