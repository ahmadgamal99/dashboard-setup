@extends('partials..master')
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
                        {{ __("Edit vehicle data") }}
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
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.vehicles.update',$vehicle->id) }}" class="form submitted-form" method="post"  data-redirection-url="{{ route('dashboard.vehicles.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Edit vehicle data") . " : " . $vehicle->description  }}</h3>
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
                            <div class="form-floating">
                                <input type="text" class="form-control" id="description_inp" name="description" value="{{ $vehicle['description'] }}" placeholder="example"/>
                                <label for="description_inp">{{ __("Enter the description") }}</label>
                            </div>
                            <p class="invalid-feedback" id="description" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Color") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="color_inp" name="color" value="{{ $vehicle['color'] }}" placeholder="example"/>
                                <label for="color_inp">{{ __("Enter the color") }}</label>
                            </div>
                            <p class="invalid-feedback" id="color" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Vehicle type") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="type_inp" name="type" value="{{ $vehicle['type'] }}" placeholder="example"/>
                                <label for="type_inp">{{ __("Enter the type") }}</label>
                            </div>
                            <p class="invalid-feedback" id="type" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Brand") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="brand_inp" name="brand" value="{{ $vehicle['brand'] }}" placeholder="example"/>
                                <label for="brand_inp">{{ __("Enter the brand") }}</label>
                            </div>
                            <p class="invalid-feedback" id="brand" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Model") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="model_inp" name="model" value="{{ $vehicle['model'] }}" placeholder="example"/>
                                <label for="model_inp">{{ __("Enter the model") }}</label>
                            </div>
                            <p class="invalid-feedback" id="model" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Year") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="year_inp" name="year" value="{{ $vehicle['year'] }}" placeholder="example"/>
                                <label for="year_inp">{{ __("Enter the year") }}</label>
                            </div>
                            <p class="invalid-feedback" id="year" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("License expiry date") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" readonly id="license_expiry_date_inp" name="license_expiry_date" value="{{ $vehicle['license_expiry_date'] }}" placeholder="example"/>
                                <label for="license_expiry_date_inp">{{ __("Enter the license expiry date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="license_expiry_date" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("License plat number") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="license_plat_number_inp" name="license_plat_number" value="{{ $vehicle['license_plat_number'] }}" placeholder="example"/>
                                <label for="license_plat_number_inp">{{ __("Enter the license plat number") }}</label>
                            </div>
                            <p class="invalid-feedback" id="license_plat_number" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Teams") }}</label>
                            <select class="form-select py-1" data-control="select2" multiple name="teams[]" id="teams-type-sp" data-placeholder="{{ __("Choose the teams") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                                <option></option>
                                @foreach( $teams as $team)
                                    <option value="{{ $team->id }}" {{ $vehicle->teams->pluck('id')->contains($team->id) ? 'selected' : '' }}> {{ $team->name }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="teams" ></p>


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
                            <select class="form-select py-1" data-control="select2" name="contract_status" id="contract-status-sp" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                                <option></option>
                                <option value="1" {{ $vehicle['contract_status'] == 1 ? 'selected' : '' }}>{{ __('active') }}</option>
                                <option value="0" {{ $vehicle['contract_status'] == 0 ? 'selected' : '' }}>{{ __('expired') }}</option>
                            </select>
                            <p class="invalid-feedback" id="contract_status" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Contract start date") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" readonly id="contract_start_date_inp" name="contract_start_date" value="{{ $vehicle['contract_start_date'] }}" placeholder="example"/>
                                <label for="contract_start_date_inp">{{ __("Enter the contract start date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="contract_start_date" ></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Contract expiry date") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" readonly id="contract_expiry_date_inp" name="contract_expiry_date" value="{{ $vehicle['contract_expiry_date'] }}" placeholder="example"/>
                                <label for="contract_expiry_date_inp">{{ __("Enter the contract expiry date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="contract_expiry_date" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Notify On Date") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" readonly id="notify_on_inp" name="notify_on" value="{{ $vehicle['notify_on'] }}" placeholder="example"/>
                                <label for="notify_on_inp">{{ __("Enter the notify on date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="notify_on" ></p>


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
                            <div class="form-floating">
                                <input type="text" class="form-control" id="gps_url_inp" name="gps_url" value="{{ $vehicle['gps_url'] }}" placeholder="example"/>
                                <label for="gps_url_inp">{{ __("Enter the url") }}</label>
                            </div>
                            <p class="invalid-feedback" id="gps_url" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("GPS Status") }}</label>
                            <select class="form-select py-1" data-control="select2" name="gps_status" id="gps-status-sp" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
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
                            <div class="form-floating">
                                <input type="text" class="form-control" id="gps_username_inp" name="gps_username" value="{{ $vehicle['gps_username'] }}" placeholder="example"/>
                                <label for="gps_username_inp">{{ __("Enter the username") }}</label>
                            </div>
                            <p class="invalid-feedback" id="gps_username" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("GPS Password") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="gps_password_inp" name="gps_password" value="{{ $vehicle['gps_password'] }}" placeholder="example"/>
                                <label for="gps_password_inp">{{ __("Enter the password") }}</label>
                            </div>
                            <p class="invalid-feedback" id="gps_password" ></p>


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
                            <div class="form-floating">
                                <input type="number" class="form-control" id="price_inp" name="price" value="{{ $vehicle['price'] }}" placeholder="example"/>
                                <label for="price_inp">{{ __("Enter the price") }}</label>
                            </div>
                            <p class="invalid-feedback" id="price" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Price Unit") }}</label>
                            <select class="form-select py-1" data-control="select2" name="price_unit" id="price-unit-sp" data-placeholder="{{ __("Choose the price unit") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                                <option></option>
                                <option value="kilometer" {{ $vehicle['price_unit'] == 'kilometer' ? 'selected' : '' }} >{{ __( ucfirst("kilometer")) }}</option>
                                <option value="hour" {{ $vehicle['price_unit'] == 'hour' ? 'selected' : '' }} >{{ __( ucfirst("hour")) }}</option>
                                <option value="day" {{ $vehicle['price_unit'] == 'day' ? 'selected' : '' }} >{{ __( ucfirst("day")) }}</option>
                            </select>
                            <p class="invalid-feedback" id="price_unit" ></p>

                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                </div>
                <!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn">

                        <span class="indicator-label">{{ __("Save") }}</span>

                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!-- end   :: Indicator -->

                    </button>
                    <!-- end   :: Submit btn -->

                </div>
                <!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
