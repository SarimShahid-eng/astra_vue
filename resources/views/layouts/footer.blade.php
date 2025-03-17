<script src="{{ asset('asset') }}/js/compressed.js"></script>
<script src="{{ asset('layout_assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('layout_assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('layout_assets') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('layout_assets') }}/libs/feather-icons/feather.min.js"></script>
{{-- <script src="{{ asset('layout_assets') }}/js/pages/plugins/lord-icon-2.1.0.js"></script> --}}
<script src="{{ asset('layout_assets') }}/js/plugins.js?" {{ date('d-m-Y') }}></script>

<!-- apexcharts -->
{{-- <script src="{{ asset('layout_assets') }}/libs/apexcharts/apexcharts.min.js"></script> --}}

<!-- projects js -->
<script src="{{ asset('layout_assets') }}/js/pages/dashboard-projects.init.js"></script>

<!-- App js -->

<script src="{{ asset('layout_assets') }}/js/app.js"></script>
<script src="{{ asset('asset') }}/js/jquery.form.js"></script>
<script src="{{ asset('asset') }}/js/select2.min.js"></script>
<script src="{{ asset('asset') }}/js/parsley.min.js"></script>
<script src="{{ asset('asset') }}/js/sweetalert2.min.js"></script>
<script src="{{ asset('asset') }}/js/custom.js"></script>
<script src="{{ asset('layout_assets') }}/libs/list.js/list.min.js"></script>
<script src="{{ asset('layout_assets') }}/libs/list.pagination.js/list.pagination.min.js"></script>
<script src="{{ asset('layout_assets') }}/libs/ckeditor5/ckeditor.js"></script>
<script src="{{ asset('layout_assets') }}/libs/quill/quill.min.js"></script>
<script src="{{ asset('layout_assets') }}/js/pages/form-editor.init.js"></script>
<script src="{{ asset('layout_assets') }}/js/pages/select2.init.js"></script>
<!-- listjs init -->
<script src="{{ asset('layout_assets') }}/js/pages/listjs.init.js"></script>
<script src="{{ asset('layout_assets') }}/js/pages/form-validation.init.js"></script>
@stack('page-script')
