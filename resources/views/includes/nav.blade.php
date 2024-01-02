<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    {{--active هنا باسم لينك --}}
    <ul class="nav navbar-nav">
      <li class="{{ request()->is('cars') ? 'active' : '' }}"><a href="{{ route('cars') }}">Home</a></li>
      <li class="{{ request()->is('createCar') ? 'active' : '' }}"><a href="{{ route('createCar') }}">Insert Car</a></li>
      <li class="{{ request()->is('trashedCar') ? 'active' : '' }}"><a href="{{ route('trashed') }}">Trashed</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
  