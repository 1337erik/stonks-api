
<script src="{{ asset( 'js/jquery.min.js' ) }}"></script>
<script src="{{ asset( 'js/jquery-migrate-3.0.1.min.js' ) }}"></script>
<script src="{{ asset( 'js/popper.min.js' ) }}"></script>
<script src="{{ asset( 'js/bootstrap.min.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.easing.1.3.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.waypoints.min.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.stellar.min.js' ) }}"></script>
<script src="{{ asset( 'js/owl.carousel.min.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.magnific-popup.min.js' ) }}"></script>
<script src="{{ asset( 'js/aos.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.animateNumber.min.js' ) }}"></script>
<script src="{{ asset( 'js/bootstrap-datepicker.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.mb.YTPlayer.min.js' ) }}"></script>
<script src="{{ asset( 'js/mediaelement-and-player.min.js' ) }}"></script>
<script src="{{ asset( 'js/jquery.timepicker.min.js' ) }}"></script>
<script src="{{ asset( 'js/scrollax.min.js' ) }}"></script>
{{-- <script src="{{ asset( 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false' ) }}"></script> --}}
{{-- <script src="{{ asset( 'js/google-map.js' ) }}"></script> --}}

<script src="{{ asset( 'js/typed.js' ) }}"></script>
<script>

    var quotes = JSON.parse({!! json_encode($quotes) !!});
    var typed = new Typed( '.typed-words', {

        strings    : quotes,
        typeSpeed  : 50,
        backSpeed  : 50,
        backDelay  : 2250,
        startDelay : 800,
        loop       : true,
        showCursor : true
    });
</script>


<script src="{{ asset( 'js/main.js' ) }}"></script>