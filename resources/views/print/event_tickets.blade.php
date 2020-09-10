<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ 'EVENT: '.$event->name }}</title>
    {{--<link rel="stylesheet" href="style.css">--}}
    {{--<script src="script.js"></script>--}}
</head>
<body>
@php

@endphp
<!-- Le reste du contenu -->
<div>
    <h3 style="text-align: center">{{ 'EVENT: '.$event->name }}</h3>
    <div class="container">
        @foreach($tickets as $ticket)
            <div class="qr_image">
                <img class="svg_content" src="{{ 'data:image/svg+xml;base64,'.$ticket->encoding}}"/>
                <img class="logo_2" src="{{ URL::to('')."/images/logo_qr_minimal.png" }}"/>
                {{--<p>www.vito.ht</p>--}}
            </div>
        @endforeach
    </div>
</div>

</body>
<style>
    .container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        /*justify-content: space-between;*/
        margin: 10px;
        margin: auto;
        width: 90%;
        page-break-after: always;
        page-break-inside: auto;
        page-break-before: always;
    }

    .qr_image {
        display: block;
        width: 105px;
        height: 105px;
        padding: 3px;
        /*border: 2px solid red;*/
        /*margin: 30px;*/
        margin-bottom: 30px;
        page-break-after: always;
    }

    .svg_content{
        /*margin-left: 25%;*/
        width: 50px;
    }

    .my_info{
        /*border: 2px solid red;*/
        height: 10px;
    }

    .logo{
        width: 20px;
        height: 20px;
        margin-top: -30px;
    }

    .logo_2{
        display: inline;
        position: relative;
        /*left: -50px;*/
        /*top: -30px;*/
        left: -35px;
        top: -20px;

    }

    .qr_image p{
        /*border: 2px solid blue;*/
        text-align: center;
        margin-top: -25px;
    }
</style>
</html>