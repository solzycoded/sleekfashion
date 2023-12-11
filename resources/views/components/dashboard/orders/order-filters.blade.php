@php
    $filterNames  = ['pending', 'cancelled', 'delivered'];
    $filterColors = ['warning', 'danger', 'success'];
@endphp

<x-dashboard.orders.order-filter-item :name="'all'" :color="'dark'" class="{{ (!request()->has('filter') ? 'disabled' : '') }}" />

@for ($i = 0; $i < count($filterNames); $i++)
    <x-dashboard.orders.order-filter-item :name="$filterNames[$i]" :color="$filterColors[$i]" />
@endfor