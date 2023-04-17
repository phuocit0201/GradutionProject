$(document).ready(function(){
    $(document).on('click' ,'#add-new-color', function(){
        let randomId = Math.floor(Math.random() * 999999999);
        let clone = $('#box-color').clone().appendTo("#container-color");
        clone.removeClass("hidden");
        clone.find('#lable-img').attr('for', randomId);
        clone.find('#file-input').attr('id', randomId);
    });

    $(document).on('click' ,'.close-color', function(){
        $(this).closest('#box-color').remove();
    });

    $(document).on('change', '.img-color', function(){
        const file = this.files[0];
        if (file) {
          $(this).closest('.preview').find('img')
          .attr("src", URL.createObjectURL(this.files[0]));
        }
      });
});