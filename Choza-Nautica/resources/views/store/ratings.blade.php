<link rel="stylesheet" href="{{asset('bootstrap_star_rating/css/star-rating.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('bootstrap_star_rating/js/star-rating.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.js')}}"></script>
<style>
    .theme-krajee-svg{
        display: none;
    }
</style>
<div class="ratings">
    <input id="input_rate_{{$producto->id}}_ASV" value="{{round($producto->averageRating,1)}}" class="rating-loading">
    <span>{{$producto->timesRated()}}</span> <span>({{round($producto->averageRating,1)}}%)</span>
    <script>
        $('#input_rate_{{$producto->id}}_ASV').rating({displayOnly: true,size:'xs', showCaption:false, theme:'krajee-fa', starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fa'});
    </script>
</div>
