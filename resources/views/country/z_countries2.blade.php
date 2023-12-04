<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .grid-container {
        color: white;
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* Three columns with equal width */
        gap: 10px; /* Gap between grid items */
        }

        .grid-item {
        background-color: #00989d;
        border: 2px solid black;
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
    <title>COUNTIRES</title>
</head>
<body class="body">
    <h1 style="text-align:center; margin-top:30px; font-family:'Times New Roman';"><b>- - COUNTRIES DATA - -</b></h1></br>
    <div class="grid-container">

        @foreach ($data as $item)
        <div class="grid-item"><img src="{{ $item['flags']['png'] }}" width="600px" height="300px"></div>
        
        <div class="grid-item">
            {{-- <h2>Country : {{ $item['name']['official'] }}</h2> --}}
            <h2>Country : {{ $item['name']['official'] }}</h2>
            <h2>Short Abriviation : {{ $item['cca2'] }}</h2>
            <h2>Long Abriviation : {{ $item['cca3'] }}</h2>
            <h2>Region :k {{ $item['region'] }}</h2>
            <h2>Area : {{ $item['area'] }}</h2>
            <h2>Population : {{ $item['population'] }}</h2>
            <a style="color:white; float:right;" href = "{{ route('details', ['code' => $item['cca2']]) }}" >
                View More Details</a>
        </div>

        @endforeach
      </div>          
</body>
</html> 