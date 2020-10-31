@extends('layouts.app')

@section('content')

<div class="container">
<div class="alert alert-dark" role="alert">
  <h4 class="alert-heading">Bienvenido seas {{ Auth::user()->name }}!</h4>
  <p>Mediante este proyecto podras desarrollar un conjunto de habilidades para poder desarrollar con facilidad proyectos desde el framework LARAVEL en su version 7.X.</p>
  <hr>
  <!-- <p class="mb-0 text-center">PRORAMACIÓN EN AMBIENTE CLIENTE - SERVIDOR ¬ GUADALUPE GARCÍA TORIBIO.</p> -->
</div></div>



@endsection


<script type="text/javascript">
$(document).ready(function() {
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);
});
</script>