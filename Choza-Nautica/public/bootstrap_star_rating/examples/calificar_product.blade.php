
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="../themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="../themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="../themes/krajee-uni/theme.css" media="all" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/star-rating.js" type="text/javascript"></script>
    <script src="../themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="../themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="../themes/krajee-gly/theme.js" type="text/javascript"></script>
    <script src="../themes/krajee-uni/theme.js" type="text/javascript"></script>
    <script>
            $('#input-1').rating({
                language:'es',
                step:1,
                starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},
                starCaptionsClasses:{1:'text-danger',2:'text-warning',3:'text-info',4:'text-primary',5:'text-success'}
            });
    </script>    
    <title>Document</title>
</head>
<body>

<label for="input-1" class="control-label">Rate This</label>
<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-theme="krajee-gly" data-max="5" data-step="1">

</body>
</html>