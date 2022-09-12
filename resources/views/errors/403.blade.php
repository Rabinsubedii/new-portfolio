<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="{{ URL::asset('img/forbidden.jpg') }}" alt="" >
    <div class="card-footer ml-auto mr-auto">
    <button type="submit" class="btn btn-primary"><a href={{ route('home') }}>{{ __('Return to Home') }}</a> </button>
</div>
</body>
</html>