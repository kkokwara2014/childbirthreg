<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$birthreg->certnumber}}</title>
    </head>

    <body>
        <tbody class="table">
            <div>
            {{-- <img src="{{asset('image/logo.png')}}" alt="" class="logo"> --}}
            <address>303 Afikpo Road</address>
            <br> <br>
            </div>
            <caption>Birth Registration Certificate</caption>
        <tbody>
            <hr>
            <tr>
                <td>
                    Cert # {{$birthreg->certnumber}}
                    {{-- <div>Full Name : {{$birthreg->lastname.', '.$birthreg->firstname.' '.$birthreg->othername}}</div>
                    <div>Date of Birth : {{$birthreg->dob}}</div> --}}
                    {{-- <div>Cert # {{$birthreg->certnumber}}</div>
                    <div>Cert # {{$birthreg->certnumber}}</div>
                    <div>Cert # {{$birthreg->certnumber}}</div>
                    <div>Cert # {{$birthreg->certnumber}}</div>
                    <div>Cert # {{$birthreg->certnumber}}</div> --}}
                </td>
            </tr>

        </tbody>
        </tbody>

    </body>

</html>