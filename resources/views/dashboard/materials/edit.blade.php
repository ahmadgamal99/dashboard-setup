@extends('partials..master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.materials.index') }}"
                    class="text-muted text-hover-primary">{{ __("Materials") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Edit material data") }}
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
            <form action="{{ route('dashboard.materials.update',$material->id) }}" class="form submitted-form" method="post"  data-redirection-url="{{ route('dashboard.materials.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Edit material data") . " : " . $material->name  }}</h3>
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
                                <input type="text" class="form-control" id="name_inp" name="name" value="{{ $material->name }}" placeholder="example"/>
                                <label for="name_inp">{{ __("Enter the name") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Code") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="code_inp" name="code" value="{{ $material->code }}" placeholder="example"/>
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
                            <label class="fs-5 fw-bold mb-2">{{ __("Unit") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="unit_inp" name="unit" value="{{ $material->unit }}" placeholder="example"/>
                                <label for="unit_inp">{{ __("Enter the unit") }}</label>
                            </div>
                            <p class="invalid-feedback" id="unit" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Group") }}</label>
                            <select class="form-select" data-control="select2" name="groups[]" multiple id="groups-sp" data-placeholder="{{ __("Choose the groups") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                @foreach( $materialGroups as $group)
                                    <option value="{{ $group->id }}" {{ $material->groups->pluck('id')->contains( $group->id ) ? 'selected' : '' }}> {{ $group->name }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="groups" ></p>
                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->
                    @if ($material->prices->count())
                        <div class="separator separator-dashed my-5 border-bottom-2"></div>
                        <h2>{{ __('Prices') }}</h2>
                    @endif

                    <!-- begin :: Row -->
                    <div class="row mb-8 justify-content-center" id="prices-container">
                        @foreach ($material->prices->reverse() as $materialPrice)
                            <div class="row w-75 {{ ! $loop->last ? 'mb-3' : '' }}" id="price-{{ ! $loop->last ? $loop->index : '' }}">
                                <input type="hidden" name="prices[{{ $loop->index }}][material_price_id]" value="{{ $materialPrice->id }}">
                                <div class="col-12 col-lg-5">
                                    <div class="form-floating">
                                        <input type="number" min="1" class="form-control" id="prices_{{ $loop->index }}_price_inp" name="prices[{{ $loop->index }}][price]" value="{{ $materialPrice->price }}" placeholder="example"/>
                                        <label for="prices_{{ $loop->index }}_price_inp">{{ __("Enter the price") }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="prices_{{ $loop->index }}_price"></p>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="form-floating">
                                        <input type="text" class="form-control datepicker" id="prices_{{ $loop->index }}_effective_date_inp" name="prices[{{ $loop->index }}][effective_date]" value="{{ $materialPrice->effective_date }}" placeholder="example"/>
                                        <label for="prices_{{ $loop->index }}_effective_date_inp">{{ __("Choose effective date") }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="prices_{{ $loop->index }}_effective_date"></p>
                                </div>
                                <div class="col-12 col-lg-2">
                                    @if ($loop->last)
                                        <button class="btn bg-primary" type="button" data-form-type="finance" id="add-new-price">
                                            <i class="fas fa-plus text-white" aria-hidden="true"></i>
                                        </button>
                                    @else
                                        <button class="btn bg-danger" type="button" onclick="deletePrice({{ $loop->index }})">
                                            <i class="fas fa-trash text-white"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
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
        let materialPrices = @json($material->prices).reverse();
        $(document).ready(function () {
            $("#add-new-price").click(function () {
                let index = $("#prices-container").children().length;

                $("#prices-container").prepend(`
                    <div class="row w-75 mb-3" id="price-${ index }">
                            <div class="col-12 col-lg-5">
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control" id="prices_${index}_price_inp" name="prices[${index}][price]" placeholder="example"/>
                                    <label for="prices_${index}_price_inp">{{ __("Enter the price") }}</label>
                                </div>
                                <p class="invalid-feedback" id="prices_${index}_price"></p>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control datepicker" id="prices_${index}_effective_date_inp" name="prices[${index}][effective_date]" placeholder="example"/>
                                    <label for="prices_${index}_effective_date_inp">{{ __("Choose effective date") }}</label>
                                </div>
                                <p class="invalid-feedback" id="prices_${index}_effective_date"></p>
                            </div>
                            <div class="col-12 col-lg-2">
                                <button class="btn bg-danger" type="button" onclick="deletePrice(${ index })">
                                    <i class="fas fa-trash text-white"></i>
                                </button>
                            </div>
                        </div>
                    `).hide().fadeIn(300);

                $('.datepicker').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 2000,
                    locale: {
                        format: 'YYYY-MM-DD',
                        cancelLabel: translate('Clear'),
                        applyLabel: translate('Apply'),
                    },
                    maxYear: parseInt(moment().format("YYYY"),10)
                });
            });

            $.each($(".datepicker"), function (indexInArray, element) {
                $(element).val(materialPrices[indexInArray].effective_date);
            });

        });
    let deletePrice = (priceId) => {
        $("#price-" + priceId).fadeOut(300, function () {
            $(this).remove();
        })
    }
    </script>
@endpush
