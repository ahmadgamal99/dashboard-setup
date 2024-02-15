@extends('partials..master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.certificate-transactions.index') }}" class="text-muted text-hover-primary">{{ __("Employees certificates") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Add certificate to employee") }}
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
            <form action="{{ route('dashboard.certificate-transactions.store') }}" class="form submitted-form" method="post"  data-redirection-url="{{ route('dashboard.certificate-transactions.index') }}">
            @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Add certificate to employee") }}</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">

                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Admin") }}</label>
                            <select class="form-select" data-control="select2" name="admin_id" data-placeholder="{{ __("Choose the admin") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value=""></option>
                                @foreach( $admins as $admin)
                                    <option value="{{ $admin->id }}"> {{ $admin->name }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="admin_id" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Certificate") }}</label>
                            <select class="form-select" data-control="select2" name="certificate_id" data-placeholder="{{ __("Choose the certificate") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value=""></option>
                                @foreach( $certificates as $certificate)
                                    <option value="{{ $certificate->id }}"> {{ $certificate->name }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="certificate_id" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Awarded date") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" id="awarded_date_inp" name="awarded_date" placeholder="example"/>
                                <label for="awarded_date_inp">{{ __("Choose awarded date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="awarded_date" ></p>
                        </div>
                        <!-- end   :: Column -->
                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Expiry date") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" id="expiry_date_inp" name="expiry_date" placeholder="example"/>
                                <label for="expiry_date_inp">{{ __("Choose expiry date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="expiry_date" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Notify on") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control datepicker" id="notify_on_inp" name="notify_on" placeholder="example"/>
                                <label for="notify_on_inp">{{ __("Choose notify date") }}</label>
                            </div>
                            <p class="invalid-feedback" id="notify_on" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Cost") }}</label>
                            <div class="form-floating">
                                <input type="number" min="0" class="form-control" id="cost_inp" name="cost" placeholder="example"/>
                                <label for="cost_inp">{{ __("Enter cost") }}</label>
                            </div>
                            <p class="invalid-feedback" id="cost" ></p>
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
