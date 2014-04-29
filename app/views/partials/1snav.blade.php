<div class="profile">
  <img  src="{{ URL::asset(Auth::user()->displayPic()) }}" alt="..." class="img-responsive">
  <div class="profile_stats">
    <p>{{ Auth::user()->name }}</p>
    <p><a href="#">{{ Auth::user()->email }}</a></p>
  </div>
</div>
