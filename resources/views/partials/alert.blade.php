@if (session('success'))
    <script>swal("Berhasil!", " {{ session('success') }} ", "success");</script>
@endif
@if (session('warning'))
    <script>swal("Gagal!", " {{ session('warning') }} ", "warning");</script>
@endif