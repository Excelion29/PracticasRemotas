

@isset(auth()->user()->id_rol)
<div class=" " id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width: 25%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                  {!! Form::open(['route'=>['rating_product',$productos],'method'=>'POST']) !!}
                        <div class="form-group">
                            <input id="input-1" name="rate"  class="rating rating-loading" data-min="0" data-max="5" data-theme="krajee-gly" required>
                        </div>
                        <br>
                        <div class="form-group purple-border">
                            <textarea style="resize: none;" name="comentario" required class="form-control" id="comentario" rows="3"></textarea>
                        </div>
                        <br>
                        <br>
                        <button class="sqr-btn" type="submit">Calificar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .theme-krajee-svg{
        display: none;
    }
</style>
<script>
    $('#input-1').rating({
        language:'es',
        step:1,
        starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},
        starCaptionsClasses:{1:'text-danger',2:'text-warning',3:'text-info',4:'text-primary',5:'text-success'}
        });
</script>
@endisset