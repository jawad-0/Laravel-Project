<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .body{
            background-image: url(/images/BG6.jpg);
            background-size: auto;
        }
        img{
            border-radius: 15px;
        }
        .grid-container {
        color: white;
        display: grid;
        padding-left: 30px;
        padding-right: 30px;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        }

        .grid-item {
        position: relative;
        padding: 15px;
        background-color: #232324;
        border: 3px solid;
        border-image: linear-gradient(45deg, #ff0000, #ffaa00, #aaff00, #00ffaa, #00aaff, #0000ff, #aa00ff) 1;
        border-image-slice: 1;
        }
        .grid-item img {
        margin-top: 30px;
        }
        .gradient-text {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: bold;
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
    <title>✦✦ SK PROJECT ✦✦</title>
    <!-- Logo -->
    <link rel="shortcut icon" href="/images/logo2.jpg">
</head>
<body class="body">
    <h1 style="text-align:center; color:white; margin-top:30px; font-family:'Times New Roman';"><b>國 家 數 據 ` 🔥- - COUNTRIES DATA - -🔥 ` 國 家 數 據</b></h1></br>
    <div class="grid-container">

        @foreach ($countries as $item)
        <div class="grid-item"><img src="{{ $item->image }}" width="300px" height="170px"></div>

        <div class="grid-item">
            <h5 class="gradient-text">Country : {{ $item->name }}</h5>
            <h5 class="gradient-text">Short Abriviation : {{ $item->short_a }}</h5>
            <h5 class="gradient-text">Long Abriviation : {{ $item->long_a }}</h5>
            <h5 class="gradient-text">Region : {{ $item->region }}</h5>
            <h5 class="gradient-text">Area : {{ $item->area }}</h5>
            <h5 class="gradient-text">Population : {{ $item->population }}</h5>
            <a style="color:white; float:right;" href = "{{ route('details', ['code' => $item->long_a]) }}" >
                View More Details</a>
        </div>

        @endforeach
      </div>
</body>
</html>
