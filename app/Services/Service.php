<?php

namespace App\Services;

class Service
{
    public function flashMessage() : void{
        session()->flash('success', 'Your order has been cancelled, successfully.');
    }
}