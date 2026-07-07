@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.list') => false,
  ];

  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
  $currentCityId = request('city_id');
  $cities = App\Models\City::orderBy('city_name')->get(['id', 'city_name']);
@endphp

@push('before_styles')
<style>
  .city-filter-bar {
    margin-bottom: 16px;
  }
</style>
@endpush

@section('content')
  <div class="row" bp-section="crud-operation-list">

    <div class="{{ $crud->getListContentClass() }}">

      <div class="city-filter-bar">
        <form method="GET" action="{{ url($crud->route) }}" class="d-flex gap-2 align-items-center">
          <label for="city_id" class="mb-0 fw-semibold">Місто</label>
          <select name="city_id" id="city_id" class="form-control" style="max-width: 320px;">
            <option value="">Усі міста</option>
            @foreach ($cities as $city)
              <option value="{{ $city->id }}" {{ (string) $currentCityId === (string) $city->id ? 'selected' : '' }}>
                {{ $city->city_name }}
              </option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-primary">Фільтрувати</button>
          <a href="{{ url($crud->route) }}" class="btn btn-outline-secondary">Скинути</a>
        </form>
      </div>

      <x-backpack::datatable :controller="$controller" :crud="$crud" :modifiesUrl="false" />

    </div>

  </div>
@endsection
