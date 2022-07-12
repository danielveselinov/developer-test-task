$(function() {
    $('#productType').on('change', function() {
        let val = $('#productType').val()

        if (val === '1') {
            $('#dvd').fadeIn()

            $('#furniture').fadeOut()
            $('#book').fadeOut()
        } else if (val === '2') {
            $('#furniture').fadeIn()

            $('#dvd').fadeOut()
            $('#book').fadeOut()
        } else if (val === '3') {
            $('#book').fadeIn()
            
            $('#furniture').fadeOut()
            $('#dvd').fadeOut()
        }
    })

    $('#product_save').on('click', function(e) {
        e.preventDefault()

        let sku = $('#sku').val()
        let name = $('#name').val()
        let price = $('#price').val()

        let size = $('#size').val()
        let height = $('#height').val()
        let width = $('#width').val()
        let length = $('#length').val()
        let weight = $('#weight').val()

        let productType = $('#productType').val()

        if (productType === null) {
            alert('Please, provide the data of indicated type')
            return
        } 

        $.post('./process/_addproduct.php', {
            sku, name, price, productType,
            size,
            height,
            width,
            length,
            weight
        }).then((response) => {
            let data = JSON.parse(response)

            if (data.auth) {
                alert('Successfully passed')
            } else if (!data.auth && data.message) {
                alert(data.message)
            }
        }).catch((err) => {
            alert(err)
        })
    })
})