@extends('partials..master')
@push('styles')
    <style>
        .select2-selection{
            height: 43.2px !important;
        }
    </style>
@endpush
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.vehicles.index') }}"
                    class="text-muted text-hover-primary">{{ __("Vehicles") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Vehicle data") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <div class="card">
        <!-- begin :: Card body -->
        <div class="card-body p-0">
            <!-- begin :: Card header -->
            <div class="card-header d-flex align-items-center">
                <h3 class="fw-bolder text-dark">{{ __("Vehicle data") }}</h3>
            </div>
            <!-- end   :: Card header -->

            <!-- begin :: Inputs wrapper -->
            <div class="inputs-wrapper">

                <label class="fs-2 fw-bolder mb-10 text-decoration-underline">{{ __('Vehicle Details') }}</label>

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Description") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['description'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Color") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['color'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Vehicle type") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['type'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Brand") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['brand'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Model") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['model'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Year") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['year'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("License expiry date") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['license_expiry_date'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("License plat number") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['license_plat_number'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Teams") }}</label>
                        <select class="form-select py-1" data-control="select2" multiple id="teams-type-sp" disabled data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                            <option></option>
                            @foreach( $vehicle->teams as $team)
                                <option value="{{ $team->id }}" selected> {{ $team->name }} </option>
                            @endforeach
                        </select>

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <label class="fs-2 fw-bolder my-8 text-decoration-underline">{{ __('Contract Info') }}</label>

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Contract Status") }}</label>
                        <select class="form-select py-1" data-control="select2" name="contract_status" disabled id="contract-status-sp" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                            <option></option>
                            <option value="1" {{ $vehicle['contract_status'] == 1 ? 'selected' : '' }}>{{ __('active') }}</option>
                            <option value="0" {{ $vehicle['contract_status'] == 0 ? 'selected' : '' }}>{{ __('expired') }}</option>
                        </select>
                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Contract start date") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['contract_start_date'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Contract expiry date") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['contract_expiry_date'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Notify On Date") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['notify_on'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <label class="fs-2 fw-bolder my-8 text-decoration-underline">{{ __('GPS Info') }}</label>

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("GPS Url") }}</label>
                        <input type="text" class="form-control" id="gps_url_inp" name="gps_url" value="{{ $vehicle['gps_url'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("GPS Status") }}</label>
                        <select class="form-select py-1" data-control="select2" name="gps_status" disabled id="gps-status-sp" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                            <option></option>
                            <option value="1" {{ $vehicle['gps_status'] == 1 ? 'selected' : '' }} >{{ __('active') }}</option>
                            <option value="0" {{ $vehicle['gps_status'] == 0 ? 'selected' : '' }} >{{ __('expired') }}</option>
                        </select>
                        <p class="invalid-feedback" id="gps_status" ></p>


                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("GPS Username") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicle['gps_username'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("GPS Password") }}</label>
                        <input type="text" class="form-control"  value="{{ $vehicle['gps_password'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <label class="fs-2 fw-bolder my-8 text-decoration-underline">{{ __('Pricing') }}</label>

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Price") }}</label>
                        <input type="number" class="form-control" value="{{ $vehicle['price'] }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Price Unit") }}</label>
                        <input type="text" class="form-control" value="{{ __( ucfirst($vehicle['price_unit']) ) }}" readonly />

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

            </div>
            <!-- end   :: Inputs wrapper -->

            <!-- begin :: Form footer -->
            <div class="form-footer">

                <a href="{{ route('dashboard.vehicles.index') }}" class="btn btn-primary">

                    <span class="indicator-label">{{ __("Back") }}</span>

                    <!-- begin :: Indicator -->
                    <span class="indicator-progress">{{ __("Please wait ...") }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!-- end   :: Indicator -->

                </a>

            </div>
            <!-- end   :: Form footer -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
