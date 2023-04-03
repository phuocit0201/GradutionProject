$(document).ready(function(){
    let dataSize = JSON.parse(jQuery('#data-size').attr('data-sizes'))
    showSize(dataSize)

    $(document).on('change', '#data-color', function(){
       showSize(dataSize)
    })

    $(document).on('change', '#data-size', function(){
       let productSizeId = $('#data-size').val();
       let dataColor = $('#data-color').val()
       dataSize.forEach(element => {
          if (element.product_color_id == dataColor && element.product_size_id == productSizeId) {
             $('#quantity_remain').text(element.quantity)
          }
       });
    })
 })

 function showSize(dataSize)
 {
   let dataColor = $('#data-color').val()
   let option = '';
   dataSize.forEach(element => {
    if (element.product_color_id == dataColor) {
       option += `
          <option value='${element.product_size_id}'>${element.size_name}</option>
       `
    }
   });
   $('#quantity_remain').text(dataSize[0].quantity)
   $('#data-size').html(option)
}