<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="p-8">
        <div class="d-flex justify-content-start mb-4">
            <x-dashboard.orders.order-filters />
        </div>
        <hr>

        <div class="row mt-4">
            @foreach ($orders as $order)
                <x-dashboard.orders.items :order="$order" />
            @endforeach
        </div>
    </div>
</x-app-layout>