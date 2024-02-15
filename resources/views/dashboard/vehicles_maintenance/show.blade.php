@extends('partials..master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.vehicles-maintenance.index') }}"
                    class="text-muted text-hover-primary">{{ __("Vehicles Maintenance") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Vehicle Maintenance data") }}
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
                <h3 class="fw-bolder text-dark">{{ __("Vehicle Maintenance data") }}</h3>
            </div>
            <!-- end   :: Card header -->

            <!-- begin :: Inputs wrapper -->
            <div class="inputs-wrapper">

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Vehicle") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicleMaintenance?->vehicle?->description }}"/>

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("type") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicleMaintenance['type'] }}"/>

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Vendor") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicleMaintenance['vendor'] }}" />

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Kilometers") }}</label>
                        <input type="number" class="form-control" value="{{ $vehicleMaintenance['kms'] }}"/>

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Next Kilometers") }}</label>
                        <input type="number" class="form-control" value="{{ $vehicleMaintenance['next_kms'] }}"/>

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-4 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Valid until date") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicleMaintenance['valid_until'] }}"/>

                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="fs-5 fw-bold mb-2">{{ __("Notify On Date") }}</label>
                        <input type="text" class="form-control" value="{{ $vehicleMaintenance['notify_on'] }}"/>

                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">

                        <label class="form-label">{{ __("Invoice") }}</label>
                        <input type="file" class="d-none" accept="*" name="invoice" id="invoice-uploader">
                        <a href="{{ getImagePath($vehicleMaintenance['invoice'], 'Invoices') }}" target="_blank" class="btn btn-secondary w-100 file-upload-inp"> {{ $vehicleMaintenance['invoice'] }} </a>
                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->


            </div>
            <!-- end   :: Inputs wrapper -->

            <!-- begin :: Form footer -->
            <div class="form-footer">

                <a href="{{ route('dashboard.vehicles-maintenance.index') }}" class="btn btn-primary">

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
