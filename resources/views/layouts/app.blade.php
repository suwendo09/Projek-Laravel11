<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    {{-- Sweet Alert Tambah --}}
    <script>
        let isSubmitting = false;
        function sweetAlertTambah(form) {
            if (isSubmitting) return;
            Swal.fire({
                title: "Apakah anda yakin ingin menambah 1 data?",
                text: "Jika iya, maka data anda akan bertambah!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, tambahkan!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Anda berhasil menambah 1 data.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        isSubmitting = true;
                        form.submit();
                    });
                }
            });
        }
        $(document).on('submit', '.form-tambah', function(e) {
            if (!isSubmitting) {
                e.preventDefault();
                sweetAlertTambah($(this));
            }
        });
        $(document).on('click', '.btn-tambah', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            sweetAlertTambah(form);
        });
    </script>

    {{-- Sweet Alert Edit --}}
    <script>
        let isEditing = false;
        function sweetAlertEdit(form) {
            if (isEditing) return;
            Swal.fire({
                title: "Apakah anda yakin ingin mengedit data ini?",
                text: "Anda dapat mengedit kapan saja :)",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f1c40f",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Edit!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Anda berhasil mengedit 1 data.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        isEditing = true;
                        form.submit();
                    });
                }
            });
        }
        $(document).on('submit', '.form-edit', function(e) {
            if (!isEditing) {
                e.preventDefault();
                sweetAlertEdit($(this));
            }
        });
        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            sweetAlertEdit(form);
        });
    </script>

    {{--  Sweet Alert Delete --}}
    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            const form = $(e.target).closest('form');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-success me-2"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Apakah anda yakin ingin menghapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Berhasil!",
                        text: "Anda berhasil menghapus 1 data.",
                        icon: "success"
                    }).then(() => {
                        form.submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Batal",
                        text: "Anda tidak jadi menghapus data ini :)",
                        icon: "error"
                    });
                }
            });
        });
    </script>

    <style>
        th.text-center,
        td.text-center {
            text-align: center !important;
            vertical-align: middle !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">iSamVi Store</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i>
        </button>
    </nav>
    <div id="layoutSidenav">
        @include('layouts.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @stack('scripts')
                @yield('konten')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
