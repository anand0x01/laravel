<?php
HTML::macro('sidemenu', function($_args){
    foreach ($_args as $key) {
        if($key[0] != '#') {
            $active = URL::current() == URL::route($key[0]) ? ' active':'';
            $_u = URL::route($key[0]);
        } else {
            $active = '';
            $_u = '#';
        }
        echo '<li class="list-group-item '.$active.'"><a href="'.$_u.'">'.$key[1].'</a></li>';
    }
});

$menu = array( array('dbd', 'Dashboard'), array('cad', 'Create Ad'), array('#', 'Lists'), array('#', 'Change Password'), array('#', 'Finances'), array('#', 'Students'));
?>
<div class="profile">
  <img  src="{{ URL::asset(Auth::user()->displayPic()) }}" alt="..." class="img-responsive">
  <div class="profile_stats">
    <p>{{ Auth::user()->name }}</p>
    <p><a href="#">{{ Auth::user()->email }}</a></p>
  </div>
</div>
<ul class="list-group dashboard_lg">
  {{ HTML::sidemenu($menu) }}
</ul>
