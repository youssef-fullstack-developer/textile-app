<!DOCTYPE html>
<html lang="en">
@include('head')

<!--begin::Body-->

<body id="kt_body"
    class="page-loading-enabled header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">

    <div class="page-loader page-loader-base">
        <div class="blockui">
            <span>Please wait...</span>
            <span>
                <div class="spinner spinner-primary"></div>
            </span>
        </div>
    </div>

    <!--begin::Main-->
    @include('mobile-header')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('header')

                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-6 subheader-solid " id="kt_subheader">
                        <div
                            class=" container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <div class="d-flex align-items-center flex-wrap mr-1">

                                <!--begin::Page Heading-->
                                <div class="d-flex align-items-baseline flex-wrap mr-5">
                                    <!--begin::Page Title-->
                                    <h5 class="text-dark font-weight-bold my-1 mr-5">Admin Panel</h5>
                                    <!--end::Page Title-->
                                    <select id="select_company">
                                        <option value="sez" @if(session('company') == 'sez') selected @endif>SEZ</option>
                                        <option value="domestic" @if(session('company') == 'domestic') selected @endif>Domestic</option>
                                    </select>
                                </div>
                                <!--end::Page Heading-->
                            </div>
                        </div>
                    </div>
                    <!--end::Subheader-->

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">

                            @if (session()->has('message'))
                                <div class="alert alert-custom alert-notice alert-light-success  fade show"
                                    role="alert">
                                    <div class="alert-icon"><i class="la la-check"></i></div>
                                    <div class="alert-text">{{ session()->get('message') }}</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('exception'))
                                <div class="alert alert-custom alert-notice alert-light-danger fade show"
                                    role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">{{ session()->get('exception') }}</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="alert-text">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @yield('content')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">{{ date('Y') }}&copy;</span>
                            <a href="https://www.legacy-ventures.net" target="_blank"
                                class="text-dark-75 text-hover-primary">YMA</a>
                        </div>
                        <!--end::Copyright-->

                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            <a href="https://headwayy.com/" target="_blank" class="nav-link pl-0 pr-5">About</a>
                            <a href="https://headwayy.com/" target="_blank" class="nav-link pl-0 pr-5">Team</a>
                            <a href="https://headwayy.com/" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    @include('panels')
    @include('scripts')

</body>
<!--end::Body-->

</html>
