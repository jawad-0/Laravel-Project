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
        background-color: #00989d;
        border: 2px solid white;
        border-radius: 20px;
        padding: 20px;
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
    <h1 style="text-align:center; color:white; margin-top:30px; font-family:'Times New Roman';"><b>- - COUNTRY DETAILS - -</b></h1></br>
    <div class="grid-container">
        
        <div class="grid-item"><img src="{{ $countries->image }}" width="600px" height="300px"></div>
        
        <div class="grid-item">
            <h2>Country : {{ $countries->name }}</h2>
            <h2>Short Abriviation : {{ $countries->short_a }}</h2>
            <h2>Long Abriviation : {{ $countries->long_a }}</h2>
            <h2>Region : {{ $countries->region }}</h2>
            <h2>Area : {{ $countries->area }}</h2>
            <h2>Population : {{ $countries->population }}</h2>
            <a style="color:white; float:right;" href="/countries">Back</a>
        </div>

      </div>  
</body>
</html>