<?php
// filepath: /var/www/html/laraveles/wallapopApp/app/Notifications/ProductPurchased.php
namespace App\Notifications;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductPurchased extends Notification
{
    use Queueable;

    public $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your product has been sold')
            ->line('The product "' . $this->sale->product . '" has been marked as sold.')
            ->action('View product', route('sales.show', $this->sale->id));
    }

    public function toDatabase($notifiable)
    {
        return [
            'sale_id' => $this->sale->id,
            'product' => $this->sale->product,
            'message' => 'The product "' . $this->sale->product . '" has been sold.',
            'url' => route('sales.show', $this->sale->id),
        ];
    }
}