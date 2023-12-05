<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .body{
            background-image: url(/images/BG6.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        img{
            border-radius: 15px;
        }

        .grid-container {
        color: white;
        display: grid;
        padding-left: 30px;
        padding-right: 30px;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        }
        .grid-item {
        position: relative;
        padding: 20px;
        background-color: #232324;
        border: 3px solid;
        border-image: linear-gradient(45deg, #ff0000, #ffaa00, #aaff00, #00ffaa, #00aaff, #0000ff, #aa00ff) 1;
        border-image-slice: 1;
        }
        .gradient-text {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: bold;
        font-size: 30x;
        background: linear-gradient(45deg, #03e8fc, #00ff91);
        -webkit-background-clip: text;
        color: transparent;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <title>{{ $countries->name }}</title>
    <link rel="shortcut icon" href="/images/logo2.jpg">

</head>
<body class="body">
    <h1 style="text-align:center; color:white; margin-top:30px; font-family:'Times New Roman';"><b>國 家 數 據 ` 🔥- - COUNTRY DETAILS - -🔥 ` 國 家 數 據</b></h1></br>
    {{-- <h1 style="text-align:center; color:white; margin-top:30px; font-family:'Times New Roman';"><b>- - COUNTRY DETAILS - -</b></h1></br> --}}
    <div class="grid-container">

        <div class="grid-item"><img src="{{ $countries->image }}" width="600px" height="300px"></div>

        <div class="grid-item">
            <h2 class="gradient-text">Country : {{ $countries->name }}</h2>
            <h2 class="gradient-text">Short Abriviation : {{ $countries->short_a }}</h2>
            <h2 class="gradient-text">Long Abriviation : {{ $countries->long_a }}</h2>
            <h2 class="gradient-text">Region : {{ $countries->region }}</h2>
            <h2 class="gradient-text">Area : {{ $countries->area }}</h2>
            <h2 class="gradient-text">Population : {{ $countries->population }}</h2>
            <a style="color:white; float:right;" href="/countries">Back</a>
        </div>

      </div>
</body>
</html>
