@extends('partials..master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.material-groups.index') }}"
                    class="text-muted text-hover-primary">{{ __("Materials groups") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Group data") }}
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
                <h3 class="fw-bolder text-dark">{{ __("Group data") . " : " . $materialGroup->name  }}</h3>
            </div>
            <!-- end   :: Card header -->

            <!-- begin :: Inputs wrapper -->
            <div class="inputs-wrapper">

                <!-- begin :: Row -->
                <div class="row mb-8">

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-bold mb-2">{{ __("Name") }}</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name_inp" name="name" disabled value="{{ $materialGroup->name }}" placeholder="example"/>
                            <label for="name_inp">{{ __("Enter the name") }}</label>
                        </div>
                        <p class="invalid-feedback" id="name" ></p>
                    </div>
                    <!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-bold mb-2">{{ __("Code") }}</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="code_inp" name="code" disabled value="{{ $materialGroup->code }}" placeholder="example"/>
                            <label for="code_inp">{{ __("Enter the code") }}</label>
                        </div>
                        <p class="invalid-feedback" id="code" ></p>
                    </div>
                    <!-- end   :: Column -->

                </div>
                <!-- end   :: Row -->

            </div>
            <!-- end   :: Inputs wrapper -->

            <!-- begin :: Form footer -->
            <div class="form-footer">

                <a href="{{ route('dashboard.material-groups.index') }}" class="btn btn-primary">

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