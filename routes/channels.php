<?php

use Illuminate\Support\Facades\Broadcast;




Broadcast::channel('price_message.{id}', function () {
    return true;
});
