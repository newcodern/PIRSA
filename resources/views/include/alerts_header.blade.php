    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session("error") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif