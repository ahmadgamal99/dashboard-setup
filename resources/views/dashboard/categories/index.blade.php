@extends('partials.dashboard.master')
@push('styles')
    <link href="{{asset('dashboard-assets/css/bootstrap-treeview.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .node-categories-tree{ padding: 10px 0 }
        .flipped {
            transform: scaleX(-1);
            -moz-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            -ms-transform: scaleX(-1);
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Categories") }}</h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Categories List") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <!-- begin :: Datatable card -->
    <div class="card mb-2">
        <div class="card-header flex-wrap">
            <div class="card-title px-5">
                <h3 class="card-label">{{__('Categories List')}}</h3>
            </div>
            <div class="card-toolbar px-5">
                <!--begin::Button-->
                <button onclick="addNewCategory()" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <i class="fa fa-plus-circle"></i>
                                <!--end::Svg Icon-->
                            </span>{{__('Add new category')}}
                </button>
                <!--end::Button-->
            </div>
        </div>

        <!-- begin :: Card Body -->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

            <div class="card-body p-0">

                <div class="row">

                    <div class="d-flex" style="display: {{ $categories->count() > 0 ? 'block' : 'none!important'}};" id="categories-div">

                        <div class="col-3 px-0 card-stretch">

                            <div class="px-4 py-6 h-100" id="categories-tree" style="border-style:solid;border-width:1px 1px 1px 0;border-color:#e9e9e9;min-height:250px"></div>

                        </div>


                        <div class="col-9 px-0 card-stretch">

                            <div class="p-3"
                                 style="border-style:solid;border-width:1px;border-color:#e9e9e9;min-height:250px">

                                <!-- begin :: Card header -->
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="fw-bolder text-dark" id="form-label">{{ __("Add new category") }}</h3>
                                    <button class="btn d-none" type="button" id="delete-category-btn" >
                                        <i class="fa fa-trash fs-3 text-danger"></i>
                                    </button>
                                </div>
                                <!-- end   :: Card header -->

                                <!--begin::Form-->
                                <form action="{{ route('dashboard.categories.store') }}" class="form submitted-form" id="submitted-form" method="post" data-redirection-url="{{ route('dashboard.categories.index') }}">
                                    @csrf

                                    <!-- begin :: Inputs wrapper -->
                                    <div class="inputs-wrapper py-4">


                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    @foreach( getAllLanguages() as $language )
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                               data-bs-toggle="tab"
                                                               href="#translation-{{ $language['code'] }}">{{ __( ucfirst( $language['code'] ) ) }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content pt-6">

                                                    @foreach( getAllLanguages() as $language )
                                                        <!-- begin :: Row -->
                                                        <div id="translation-{{ $language['code'] }}" class="tab-pane mb-8 {{ $loop->first ? 'active' : '' }}">

                                                            <label class="fs-5 fw-bold mb-2">{{ __("name") . ' - ' . __( ucfirst( $language['code'] ) ) }}</label>

                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                       id="translations_{{$language['code']}}_name_inp"
                                                                       name="translations[{{$language['code']}}][name]"
                                                                       placeholder="example"/>
                                                                <label for="translations_{{$language['code']}}_name_inp">{{ __("Enter the name") }}</label>
                                                            </div>

                                                            <p class="invalid-feedback" id="translations_{{$language['code']}}_name"></p>

                                                        </div>
                                                        <!-- end   :: Row -->
                                                    @endforeach

                                                </div>
                                                <!-- Tab panes -->

                                            </div>

                                        </div>


                                        <!-- begin :: Row -->
                                        <div class="row mb-8">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <label class="fs-5 fw-bold mb-2" for="hex_code_inp">{{ __("Parent category") }}</label>
                                                <select class="form-select" data-control="select2" name="parent_id" id="category-sp" data-placeholder="{{ __("Choose the category") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option></option>
                                                    @foreach( $parentCategories as $cat)
                                                        <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                                    @endforeach
                                                </select>
                                                <p class="invalid-feedback" id="parent_id"></p>


                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mt-15">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row d-flex justify-content-around">

                                                <label class="fs-5 fw-bold mb-2" >{{ __("Status") }}</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="status" id="status-checkbox" checked="checked">
                                                </div>
                                                <label class="fs-5 fw-bold mb-2" id="status-text" >{{ __("Available") }}</label>

                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->


                                    </div>
                                    <!-- end   :: Inputs wrapper -->

                                    <!-- begin :: Form footer -->
                                    <div class="form-footer border-0 mt-2">

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
                                <!--end::Form-->

                            </div>

                        </div>

                    </div>

                    <div class="{{ $categories->count() == 0 ? '' : 'd-none'}}" id="no-categories-div">
                        <div class="min-h-250px d-flex justify-content-center align-items-center">
                            <h1 class="text-muted"> {{__("No categories was found")}} </h1>
                        </div>
                    </div>


                </div>


            </div>


        </div>
        <!-- end   :: Card Body -->
    </div>
    <!-- end   :: Datatable card -->

@endsection
@push('scripts')
    <script src="{{asset('dashboard-assets/js/bootstrap-treeview.js')}}"></script>
    <script>

        let appLocale       = "_{{app()->getLocale()}}";
        let treeData        = @json($categories);
        let $categoriesData = $('#categories-tree');
        let $statusText     = $('#status-text');
        let $statusCheckbox = $('#status-checkbox');
        let $categorySp     = $('#category-sp');
        let $formLabel      = $('#form-label');
        let $submittedForm  = $('#submitted-form');
        let $deleteCatBtn   = $('#delete-category-btn');

        $(document).ready(() => {

            $categoriesData.treeview({data: treeData});

            $categoriesData.treeview('collapseAll');

            $categoriesData.on('nodeSelected', getTreeData);

            $statusCheckbox.change( function () {

                if( $(this).prop('checked') )
                    $statusText.text("{{ __('Available') }}")
                else
                    $statusText.text("{{ __('Unavailable') }}")
            });
        });


        let getTreeData    = (event, data) => {

            let categoryID = data['id'];

            loadingAlert();

            $.ajax({
                method: 'GET',
                url: '/categories/' + categoryID,
                success: ( category ) => {


                    setTimeout(() => {

                        $formLabel.html(`{{ __("Edit the category") }} : ${ category['name'] }`)

                        $submittedForm.attr('action',`categories/${ category['id']}`).prepend(`<input type="hidden" name="_method" value="PUT" id="method-input">`);

                        $deleteCatBtn.removeClass('d-none').off().click( () => deleteElement('{{ __('category') }}' , `categories/${ category['id'] }` , () => window.location.reload() ))

                        $categorySp.val( category['parent_id'] ).select2()

                        $statusCheckbox.prop('checked' , category['status'] ).trigger('change')


                        for ( const [key, value] of  Object.entries( category['translations'] ) )
                        {
                            $(`#translations_${ key }_name_inp`).val( value['name'] );
                        }

                        swal.close();

                    }, 500);

                },
                error: ( error ) => {
                    errorAlert( error  )
                }
            });

        }

        let addNewCategory = () => {

            $formLabel.html(`{{ __("Add new category") }}`)

            $('#method-input').remove();

            $('#categories-div').css('display','block');

            $('#no-categories-div').addClass('d-none');

            $submittedForm.attr('action',`categories`).trigger('reset');

            $deleteCatBtn.addClass('d-none').off();

            $categorySp.val( null ).select2()

        }

    </script>
@endpush
