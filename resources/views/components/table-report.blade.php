@props([''])

@php

@endphp

@if (isset($grandTotal))
    {{ $grandTotal }}
@endif

@if (isset($tableHeader))
    <div class="overflow-x-auto my-4 pb-4">

        <table class="w-full text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    {{ $tableHeader }}
                </tr>
            </thead>
            <tbody>
                {{ $tableData }}
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
@endif

@if (isset($pagination))
    <!-- Pagination -->
    {{ $pagination }}
@endif

{{ $slot }}

<script type="module">

    $(document).ready(function() {
        //After load completed remove loading animation
        $("#searchBtn svg").addClass("hidden");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //pagination 
        $('#pagination a').click(function(e) {
            startPageLoading();
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]

            $.ajax({
                url: "/userReportResult?page=" + page,
                success: function(res) {
                    $('#userReportResult').html(res);
                    stopPageLoading();
                }
            })
        });

    });

</script>
