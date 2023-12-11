<?php

namespace App\Services;

use App\Models\Order;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class StoreOrderService
{
    // READ
    public function createOrder($attributes): JsonResponse{
        // order
        $order = $this->createOrderDetails($attributes);

        // success message for "customer order"
        session()->flash('success', 'Your order was successfully created! You can expect delivery in 7 days.');

        return response()->json([
            'success'   => true,
            'reference' => $attributes['reference'],
            'order_tag' => $order->order_tag
        ], 200);
    }

    // store order details
    private function createOrderDetails($attributes): Order{ // create customer order
        $userId  = ['user_id' => auth()->user()->id];

        // address
        $address = $this->customerAddress(array_merge(['address' => $attributes['address']], $userId));
        // contact
        $contact = $this->customerContact(array_merge(['phone' => $attributes['phone_number']], $userId));

        // create order
        $order   = Order::firstOrCreate(
            array_merge(
                [
                    'order_tag'           => $this->generateOrderTag(),
                    'customer_address_id' => $address->id,
                    'customer_contact_id' => $contact->id
                ]
            , $userId)
        );

        // create customer order
        $this->createCustomerOrder($order->id);

        // create delivery details
        $this->deliveryDate($order->id);

        // create payment reference
        $this->paymentReference($order->id, $attributes['reference']);

        return $order;
    }

    private function generateOrderTag(): string{
        return Str::upper(Str::random(11));
    }

    private function createCustomerOrder(int $orderId){ // create customer order details
        (new CreateCustomerOrderService())->createOrder($orderId);
    }

    private function customerAddress($attributes){ // store customer address
        return (new StoreCustomerAddressService())->createAddress($attributes);
    }

    private function customerContact($attributes){ // store customer phone number
        return (new StoreCustomerContactService())->createContact($attributes);
    }

    private function deliveryDate($orderId): void{ // create scheduled delivery date
        (new CreateDeliveryDetailService())->storeOrderDeliveryDate($orderId);
    }

    private function paymentReference(int $orderId, string $paymentReference): void{
        (new StorePaymentReferenceService())->storePaymentReference($orderId, $paymentReference);
    }
}
