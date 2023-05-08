@props(['filter', 'filterValue'])

@php
  $display = empty(trim($filterValue)) ? "d-none" : "";
@endphp

<div class="col-1 col-sm-1 d-flex text-left bg-primary text-white {{ $display }}" style="padding: 2px 3px !important; border-radius: 4px; width: inherit; margin-right: 5px; margin-bottom: 3px; font-size: 18px;">
  <p style="width: 100%; margin: 0;">
    {{ $filterValue }}
  </p>

  <i class="bi bi-x fw-bold text-right text-black remove-filter" style="cursor: pointer; padding: 0 !important; height: 20px; align-self: center;"  filter-id="{{ $filter }}"></i>
</div>