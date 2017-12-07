<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>

        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Transpdroid</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/email.css">
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

	<h1>Aquest enviament està previst que s'enviï el . {{ Carbon\Carbon::parse($date)->format('d-m-Y') }}</h1>

	<p>L'estat actual de l'enviament es: {{ $state }}
	<p>Codi de l'enviament: {{ $code }}</p>
	<p>Nombre de peces: {{ $number  }}</p>
	<p>Pes: {{ $weight }}</p>
	<p>Barcode del codi d'enviament</p>
	{!! QrCode::size(100)->generate($code); !!}

    </body>
</html>
