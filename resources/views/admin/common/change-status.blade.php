@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".status-change").on('click', function () {
                var token = "{{ csrf_token() }}";

                var value = $(this).val().split('/');
                var status_for = value[0];

                var url = "{{ route('status.update') }}";
                if ($(this).is(':checked')) {
                    var status = 1;
                } else {
                    var status = 0;
                }

                var formData = {
                    id: value[1],
                    status: status,
                    status_for: status_for
                }

                $.ajax({
                    type: 'PUT',
                    dataType: 'json',
                    data: {
                        data: formData,
                        _token: token
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    success: function (response) {
                        console.log(response);
                        Swal.fire(response.title, response.message, response.status);
                    },
                    error: function (response) {

                        Swal.fire(response.title, response.message, response.status);
                    }

                });

            });

        });

    </script>
@endpush
