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
                        {{ __("Edit vehicle maintenance data") }}
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
            <form action="{{ route('dashboard.vehicles-maintenance.update',$vehicleMaintenance->id) }}" class="form submitted-form" method="post"  data-redirection-url="{{ route('dashboard.vehicles-maintenance.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Edit vehicle maintenance data") }}</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                    <div class="inputs-wrapper">

                        <!-- begin :: Row -->
                        <div class="row mb-8">

                            <!-- begin :: Column -->
                            <div class="col-md-4 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Vehicle") }}</label>
                                <select class="form-select py-1" data-control="select2"  name="vehicle_id" id="vehicle-type-sp" data-placeholder="{{ __("Choose the vehicle") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                                    <option></option>
                                    @foreach( $vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}" {{ $vehicleMaintenance['vehicle_id'] == $vehicle->id ? 'selected' : '' }}> {{ $vehicle->description }} </option>
                                    @endforeach
                                </select>
                                <p class="invalid-feedback" id="vehicle_id" ></p>


                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-4 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("type") }}</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="type_inp" name="type" value="{{ $vehicleMaintenance['type'] }}" placeholder="example"/>
                                    <label for="type_inp">{{ __("Enter the type") }}</label>
                                </div>
                                <p class="invalid-feedback" id="type" ></p>


                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-4 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Vendor") }}</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="vendor_inp" name="vendor" value="{{ $vehicleMaintenance['vendor'] }}" placeholder="example"/>
                                    <label for="vendor_inp">{{ __("Enter the vendor") }}</label>
                                </div>
                                <p class="invalid-feedback" id="vendor" ></p>


                            </div>
                            <!-- end   :: Column -->

                        </div>
                        <!-- end   :: Row -->

                        <!-- begin :: Row -->
                        <div class="row mb-8">

                            <!-- begin :: Column -->
                            <div class="col-md-4 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Kilometers") }}</label>
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="kms_inp" name="kms" value="{{ $vehicleMaintenance['kms'] }}" placeholder="example"/>
                                    <label for="kms_inp">{{ __("Enter the kilometers") }}</label>
                                </div>
                                <p class="invalid-feedback" id="kms" ></p>


                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-4 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Next Kilometers") }}</label>
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="next_kms_inp" name="next_kms" value="{{ $vehicleMaintenance['next_kms'] }}" placeholder="example"/>
                                    <label for="next_kms_inp">{{ __("Enter the next kilometers") }}</label>
                                </div>
                                <p class="invalid-feedback" id="next_kms" ></p>


                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-4 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Valid until date") }}</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control datepicker" readonly id="valid_until_inp" name="valid_until" value="{{ $vehicleMaintenance['valid_until'] }}" placeholder="example"/>
                                    <label for="valid_until_inp">{{ __("Enter the valid until date") }}</label>
                                </div>
                                <p class="invalid-feedback" id="valid_until" ></p>

                            </div>
                            <!-- end   :: Column -->

                        </div>
                        <!-- end   :: Row -->

                        <!-- begin :: Row -->
                        <div class="row mb-8">

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Notify On Date") }}</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control datepicker" readonly id="notify_on_inp" name="notify_on" value="{{ $vehicleMaintenance['notify_on'] }}" placeholder="example"/>
                                    <label for="notify_on_inp">{{ __("Enter the notify on date") }}</label>
                                </div>
                                <p class="invalid-feedback" id="notify_on" ></p>

                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="form-label">{{ __("Invoice") }}</label>
                                <br>
                                <input type="file" class="d-none" accept="*" name="invoice" id="invoice-uploader">
                                <button class="btn btn-secondary w-100 file-upload-inp" type="button" style="height: 50.75px"> <i class="bi bi-upload fs-8" ></i> {{ $vehicleMaintenance['invoice'] ?? __("no file is selected")   }} </button>
                                <p class="invalid-feedback" id="invoice" ></p>
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
@push('scripts')
    <script>

        $(document).ready( () => {

            $('.file-upload-inp').click( function () {
                $(this).prev().trigger('click');

            });

            $('[id*=-uploader]').change(function () {

                let fileName = $(this)[0].files[0].name;

                $(this).next().html(`<i class="bi bi-upload fs-8" ></i> ${ fileName } `);

            });

        });

    </script>
@endpush
