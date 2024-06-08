<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFC Card PDF</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/font-awesome/css/all.min.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .classic_header_image{
            position: relative;
        }
        .classic_header_image img {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .classic_svg svg {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .fs-4 {
            font-size: 1.5rem;
        }

        .fw-bold {
            font-weight: bold;
        }

        .container {
            width: 30%;
            padding: 0;
            margin: 0px auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .list-group-item {
            list-style: none;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 5px 0;
            display: flex;
            align-items: center;
        }

        .list-group-item img {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($nfc_card->card_design?->design_card_id == 1)
            @include('user.nfc-template.classic-template')
        @elseif($nfc_card->card_design?->design_card_id == 2)
            @include('user.nfc-template.flat-template')
        @elseif($nfc_card->card_design?->design_card_id == 3)
            @include('user.nfc-template.modern-template')
        @elseif($nfc_card->card_design?->design_card_id == 4)
            @include('user.nfc-template.sleek-template')
        @endif
    </div>
</body>

</html>
