@extends('partials..master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.locations.index') }}" class="text-muted text-hover-primary">{{ __("Locations") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Add new location") }}
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
            <form action="{{ route('dashboard.locations.store') }}" class="form submitted-form" method="post"  data-redirection-url="{{ route('dashboard.locations.index') }}">
            @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Add new location") }}</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Type") }}</label>
                            <select class="form-select py-1" data-control="select2" name="type_id" id="location-type-sp" data-placeholder="{{ __("Choose the type") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" >
                                <option></option>
                                @foreach( $locationTypes as $locationType)
                                    <option value="{{ $locationType->id }}"> {{ $locationType->description }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="type_id" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Code") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="code_inp" name="code" placeholder="example"/>
                                <label for="code_inp">{{ __("Enter the code") }}</label>
                            </div>
                            <p class="invalid-feedback" id="code" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_inp" name="name" placeholder="example"/>
                                <label for="name_inp">{{ __("Enter the name") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Description") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="description_inp" name="description" placeholder="example"/>
                                <label for="description_inp">{{ __("Enter the description") }}</label>
                            </div>
                            <p class="invalid-feedback" id="description" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="phone" placeholder="example"/>
                                <label for="phone_inp">{{ __("Enter the phone") }}</label>
                            </div>
                            <p class="invalid-feedback" id="phone" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Address") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address_inp" name="address" placeholder="example"/>
                                <label for="address_inp">{{ __("Enter the address") }}</label>
                            </div>
                            <p class="invalid-feedback" id="address" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-12 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Maps Url") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="maps_url_inp" name="maps_url" placeholder="example"/>
                                <label for="maps_url_inp">{{ __("Enter the maps url") }}</label>
                            </div>
                            <p class="invalid-feedback" id="maps_url" ></p>


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
