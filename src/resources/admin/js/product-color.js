import Swal from 'sweetalert2';

$(document).ready(function(){
    toast1 = toast1();
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

    $(document).on('submit','.form-submit', function(event){
      event.preventDefault();

      let url = $(this).attr('url-store');
      $.ajax({
          url: url,
          method: 'POST',
          data: new FormData(this),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          async: true,
      }).done((res) => {
        if (res.status == false) {
          fire1(toast1, 'error', res.message)
        } else if (res.status == true) {
          window.location.href = res.route;
        }
      }).fail(function(data) {
        if (data.status == 422) {
          fire1(toast1, 'error', data.responseJSON.message)
        }
      });
    });
});

function toast1() 
{
  return Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
}

function fire1(toast, type, message) 
{
  let background;
  let icon;
  if (type == 'success') {
    background = 'rgba(40,167,69,.85)';
    icon = 'success';
  } else if (type == 'error') {
    background = 'rgba(220,53,69,.85)';
    icon = 'error';
  }
  toast.fire({
    icon: icon,
    title: message,
    background: background,
    color: '#fff',
  })
}