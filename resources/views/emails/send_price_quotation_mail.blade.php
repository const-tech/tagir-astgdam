<!DOCTYPE html>
<html>

<head>
    <title>عرض سعر</title>
</head>

<body>
    <h1>مرحبا, {{ $user->client?->name }}!</h1>
    @if (setting('price_quotation_message'))
        <p>{{ setting('price_quotation_message') }}</p>
    @endif
</body>

</html>
