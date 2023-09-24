$(document).ready(function () {

    $('#image-file').change(function () {
        if ($("#image-preview").hasClass('d-none')) {
            $("#image-preview").removeClass('d-none');
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.ajax-btn').click(function (e) {

        let product_id = $(this).data('id');

        let qty = $('#quantity-' + product_id + '  option:selected').val();

        let url = $(this).data('url');

        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token in the request headers
            },
            data: {
                qty: qty,
                product_id: product_id
            },
            dataType: 'json',
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (response) {
                alert('An error occurred while adding product to cart!');
            }
        });
    });

    $('#category').change(function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        let id = $(this).val();
        $.ajax({
            type: "GET",
            url: url,
            data: { id: id },
            success: function (res) {
                const result = res.data;
                if (result.length > 0) {
                    let html;
                    result.forEach(value => {
                        html += '<option value="' + value.id + '"> ' + value.subcategory_name + '</option>';
                    });
                    $('#subcategory').html(html);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No record found!',
                    });
                    $('#subcategory').html('<option value="">No subcategories found</option>');
                }
            }
        });
    });

    $('.check-all').click(function (e) {
        let $this = $(this);
        var checkboxes = $("#check_group-"+$this.val()).find(":checkbox");
        checkboxes.prop("checked", $this.prop("checked"));      
    });
});
