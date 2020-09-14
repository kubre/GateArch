<x-layout>
<x-slot name="header">
    <style>
        html, body {
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        h3 {
            font-weight: bold;
            color: #388087;
        }

        h3::after {
            content: "-";
            font-size: 0px;
            display: block;
            width: 40px;
            height: 2px;
            background: #ee9900;
        }

        table, td, tr {
            border: 1px solid #333;
            border-collapse: collapse;
            padding: 5px 20px;
        }
        
        @media screen and (min-width: 991px) {
            .simple-wrapper {
                min-height: calc(56vh - 5px);
            }
        }
    </style>
</x-slot>

<div class="row align-items-stretch">
    <div style="color: #dfdfdf;" class="col-md-3 bg-dark">
        <div class="simple-wrapper d-flex flex-column align-items-center justify-content-between px-4 py-2 py-md-5">
        <img src="/images/index/logo-negative-v.png" class="d-none d-md-inline-block" style="max-width: 100px;">
        <div class="text-center">
            <h2>{{ $title }}</h2>
            <hr style="width: 80px; background: #ff9900">
        </div>
        <div></div>
        </div>
    </div>

    <div class="col-md-6 bg-white p-5 simple-wrapper" style="font-size: 1.05em; box-shadow: 10px 1px 32px 2px rgba(0,0,0,0.16); overflow-y: auto">
       {{ $slot }}
    </div>
    <div class="col-md-3">
    </div>
</div>
<x-slot name="scripts">
    {{ $scripts ?? '' }}
</x-slot>
</x-layout>