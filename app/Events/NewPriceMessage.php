<?php

namespace App\Events;

use App\Models\Message;
use App\Models\PriceQuotation;
use App\Models\PriceQuotationMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewPriceMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ?int $price_quotation_id;
    public function __construct(public PriceQuotationMessage $message)
    {
        $this->price_quotation_id = $message->price_quotation_id;
    }

    public function broadcastOn(): array
    {
        return ["price_message.{$this->price_quotation_id}"];
    }
}
