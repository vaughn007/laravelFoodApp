{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

{{-- put in your own code --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        html { 
  background: url('https://wallbox.ru/wallpapers/main2/201645/derevo-griby-stol-vino-salfetka-kolbasa-pomidory-olivki-picca.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

mark {
    color: #2e5a1c;
    background-color: #4e9525;
}

a {
    color: #edf0c7;
}


</style>
    
</head>
<body>

<div style='color: white;margin: 100px auto;font-family: "Nunito", sans-serif; text-align: center'>
    <h1><span style="font-size: 300%;">403</span><br><br></h1>
    <h2><a href="{{ URL::previous() }}"><i class="fas fa-backward"></i></a> <mark>This is not your content to edit </mark></h2>
    
</div>

</body>
</html>
