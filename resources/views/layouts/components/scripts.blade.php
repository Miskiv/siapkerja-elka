<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/bootstrap/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/bootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/bootstrap/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/bootstrap/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/bootstrap/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/demo/chart-pie-demo.js') }}"></script>


<script src="https://cdn.lordicon.com/lordicon.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- datatable-->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
@include('sweetalert::alert')

@stack('js')