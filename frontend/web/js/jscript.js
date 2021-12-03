jQuery(document).ready(function ($) {

    $('body').on('click', '.search-repo', function (e) {
        let query = $('.search-query').val().trim();

        if (query.length) {
            $(this).prop('disabled', true);

            $('.cards-wrap').html('');
            $('.searching').removeClass('d-none');

            $.ajax({
                url: '/ajax/search-repo',
                data: {
                    query: query,
                },
                type: 'POST',
                success: function (res) {
                    $('.search-repo').prop('disabled', false);
                    $('.searching').addClass('d-none');

                    $('.cards-wrap').html(res);
                },
                error: function () {

                },
            });
        }
    });

});
