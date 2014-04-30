<?php
HTML::macro('pill_stat', function($_args){
    foreach ($_args as $key) {
        $active = URL::current() == $key[0] ? 'active':'';
        echo '<li class="'.$active.'"><a href="'.$key[0].'">'.$key[1].'</a></li>';
    }
});
?>
<ul class="nav nav-pills">
{{ HTML::pill_stat(array(
    array(URL::route('dbd.mng', array($id)), 'Details'), 
    array(URL::route('dbd.mdr', array($id)), 'Responses'), array(URL::route('dbd.mdbt', array($id)), 'Doubts'), array(URL::route('dbd.med', array($id)), 'Edit')
    ))
}}
</ul>
