<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') - KF Komitmen.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Load Style CSS-->
    @include('layouts.components.styles')

    <styles>
        <style>
            .iframe-container {
                text-align: center;
                width: 100%;
            }
        </style>
    </styles>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4FZSJ8JWR0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-4FZSJ8JWR0');
    </script>
</head>
<body>
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.components.header')
    <!-- ========== App Menu ========== -->
    @include('layouts.components.app-menu')
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            @yield('content')
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.components.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<div class="customizer-setting d-none d-md-block" hidden>
    <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
         data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas" hidden>
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div>
<!-- Theme Settings -->
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvass" hidden>
    <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
        <h5 class="m-0 me-2 text-white">Theme Customizer</h5>
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0" hidden>
        <div data-simplebar class="h-100">
            <div class="p-4">
                <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                <p class="text-muted">Choose your layout</p>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                             <span class="d-flex gap-1 h-100">
                                 <span class="flex-shrink-0">
                                     <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                         <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                         <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                         <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                         <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                     </span>
                                 </span>
                                 <span class="flex-grow-1">
                                     <span class="d-flex h-100 flex-column">
                                         <span class="bg-light d-block p-1"></span>
                                         <span class="bg-light d-block p-1 mt-auto"></span>
                                     </span>
                                 </span>
                             </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Vertical</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                         <span class="d-flex h-100 flex-column gap-1">
                             <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                 <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                 <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                 <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                             </span>
                             <span class="bg-light d-block p-1"></span>
                             <span class="bg-light d-block p-1 mt-auto"></span>
                         </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                     <span class="d-flex gap-1 h-100">
                         <span class="flex-shrink-0">
                             <span class="bg-light d-flex h-100 flex-column gap-1">
                                 <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                 <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                 <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                 <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                             </span>
                         </span>
                         <span class="flex-shrink-0">
                             <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                 <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                 <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                 <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                 <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                             </span>
                         </span>
                         <span class="flex-grow-1">
                             <span class="d-flex h-100 flex-column">
                                 <span class="bg-light d-block p-1"></span>
                                 <span class="bg-light d-block p-1 mt-auto"></span>
                             </span>
                         </span>
                     </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Two Column</h5>
                    </div>
                    <!-- end col -->
                </div>
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                <p class="text-muted">Choose Light or Dark Scheme.</p>
                <div class="colorscheme-cardradio">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-mode"
                                       id="layout-mode-light"
                                       value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                      <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                  <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                  <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                  <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                  <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              </span>
                          </span>
                          <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                                  <span class="bg-light d-block p-1"></span>
                                  <span class="bg-light d-block p-1 mt-auto"></span>
                              </span>
                          </span>
                      </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio dark">
                                <input class="form-check-input" type="radio" name="data-layout-mode"
                                       id="layout-mode-dark"
                                       value="dark">
                                <label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
                  <span class="d-flex gap-1 h-100">
                      <span class="flex-shrink-0">
                          <span class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                          </span>
                      </span>
                      <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                              <span class="bg-soft-light d-block p-1"></span>
                              <span class="bg-soft-light d-block p-1 mt-auto"></span>
                          </span>
                      </span>
                  </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Dark</h5>
                        </div>
                    </div>
                </div>
                <div id="layout-width">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                    <p class="text-muted">Choose Fluid or Boxed layout.</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-width"
                                       id="layout-width-fluid" value="fluid">
                                <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                  <span class="d-flex gap-1 h-100">
                      <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                      </span>
                      <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                      </span>
                  </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Fluid</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-width"
                                       id="layout-width-boxed" value="boxed">
                                <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
              <span class="d-flex gap-1 h-100 border-start border-end">
                  <span class="flex-shrink-0">
                      <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                          <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                          <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                      </span>
                  </span>
                  <span class="flex-grow-1">
                      <span class="d-flex h-100 flex-column">
                          <span class="bg-light d-block p-1"></span>
                          <span class="bg-light d-block p-1 mt-auto"></span>
                      </span>
                  </span>
              </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Boxed</h5>
                        </div>
                    </div>
                </div>
                <div id="layout-position">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                    <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>
                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                               value="fixed">
                        <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
                        <input type="radio" class="btn-check" name="data-layout-position"
                               id="layout-position-scrollable"
                               value="scrollable">
                        <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                <p class="text-muted">Choose Light or Dark Topbar Color.</p>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light"
                                   value="light">
                            <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
             <span class="d-flex gap-1 h-100">
                 <span class="flex-shrink-0">
                     <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                         <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                         <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                         <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                         <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                     </span>
                 </span>
                 <span class="flex-grow-1">
                     <span class="d-flex h-100 flex-column">
                         <span class="bg-light d-block p-1"></span>
                         <span class="bg-light d-block p-1 mt-auto"></span>
                     </span>
                 </span>
             </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Light</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark"
                                   value="dark">
                            <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
         <span class="d-flex gap-1 h-100">
             <span class="flex-shrink-0">
                 <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                     <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                     <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                     <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                     <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                 </span>
             </span>
             <span class="flex-grow-1">
                 <span class="d-flex h-100 flex-column">
                     <span class="bg-primary d-block p-1"></span>
                     <span class="bg-light d-block p-1 mt-auto"></span>
                 </span>
             </span>
         </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Dark</h5>
                    </div>
                </div>
                <div id="sidebar-size">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                    <p class="text-muted">Choose a size of Sidebar.</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-default" value="lg">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                  <span class="d-flex gap-1 h-100">
                      <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                      </span>
                      <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                      </span>
                  </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Default</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-compact" value="md">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
              <span class="d-flex gap-1 h-100">
                  <span class="flex-shrink-0">
                      <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                          <span class="d-block p-1 bg-soft-primary rounded mb-2"></span>
                          <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                          <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                          <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                      </span>
                  </span>
                  <span class="flex-grow-1">
                      <span class="d-flex h-100 flex-column">
                          <span class="bg-light d-block p-1"></span>
                          <span class="bg-light d-block p-1 mt-auto"></span>
                      </span>
                  </span>
              </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Compact</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-small" value="sm">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
          <span class="d-flex gap-1 h-100">
              <span class="flex-shrink-0">
                  <span class="bg-light d-flex h-100 flex-column gap-1">
                      <span class="d-block p-1 bg-soft-primary mb-2"></span>
                      <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                      <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                      <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                  </span>
              </span>
              <span class="flex-grow-1">
                  <span class="d-flex h-100 flex-column">
                      <span class="bg-light d-block p-1"></span>
                      <span class="bg-light d-block p-1 mt-auto"></span>
                  </span>
              </span>
          </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-small-hover" value="sm-hover">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
          <span class="d-flex gap-1 h-100">
              <span class="flex-shrink-0">
                  <span class="bg-light d-flex h-100 flex-column gap-1">
                      <span class="d-block p-1 bg-soft-primary mb-2"></span>
                      <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                      <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                      <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                  </span>
              </span>
              <span class="flex-grow-1">
                  <span class="d-flex h-100 flex-column">
                      <span class="bg-light d-block p-1"></span>
                      <span class="bg-light d-block p-1 mt-auto"></span>
                  </span>
              </span>
          </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                        </div>
                    </div>
                </div>
                <div id="sidebar-view">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                    <p class="text-muted">Choose Default or Detached Sidebar view.</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-style"
                                       id="sidebar-view-default" value="default">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                  <span class="d-flex gap-1 h-100">
                      <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                      </span>
                      <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                      </span>
                  </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Default</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-style"
                                       id="sidebar-view-detached" value="detached">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
              <span class="d-flex h-100 flex-column">
                  <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                      <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                      <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                      <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                  </span>
                  <span class="d-flex gap-1 h-100 p-1 px-2">
                      <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                      </span>
                  </span>
                  <span class="bg-light d-block p-1 mt-auto px-2"></span>
              </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Detached</h5>
                        </div>
                    </div>
                </div>
                <div id="sidebar-color">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                    <p class="text-muted">Choose Ligth or Dark Sidebar Color.</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                  <span class="d-flex gap-1 h-100">
                      <span class="flex-shrink-0">
                          <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                      </span>
                      <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                      </span>
                  </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark"
                                       value="dark">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
              <span class="d-flex gap-1 h-100">
                  <span class="flex-shrink-0">
                      <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                          <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                          <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                          <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                          <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                      </span>
                  </span>
                  <span class="flex-grow-1">
                      <span class="d-flex h-100 flex-column">
                          <span class="bg-light d-block p-1"></span>
                          <span class="bg-light d-block p-1 mt-auto"></span>
                      </span>
                  </span>
              </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Dark</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 text-center" hidden>
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary w-100">Buy Now</button>
            </div>
        </div>
    </div>
</div>

<!--Load Scripts JS-->
@include('layouts.components.scripts')

</body>
</html>
