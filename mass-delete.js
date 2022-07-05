$(function () {
    $("#delete-product-btn").on("click", function (e) {
        e.preventDefault()
        let filter_options = []

        $('.delete-checkbox:checked').each(function (index) {
            let id = $(this).data('id')
            filter_options.push(id)
        })

        if (filter_options.length <= 0) {
            alert('Please select products you want to delete')
            return;
        }

        $.post('./process/_massDelete.php', {
            process: 'massDelete', filter_options
        }).then((response) => {
            let data = JSON.parse(response)

            if(data.auth) {
                alert('Successfully passed')
                filter_options.forEach((id) => {
                    $(`.delete-checkbox[data-id="${id}"]`).parent().parent().remove();
                })
            } else if (!data.auth && data.message) {
                alert(data.message)
            }
        }).catch((err) => {
            alert(err)
        })
    })
})
