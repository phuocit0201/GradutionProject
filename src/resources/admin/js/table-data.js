$(document).ready(function(){
    let table;
    table = $('#table-crud').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["excel", "pdf", "print"],
      "language": {
        search: "Tìm kiếm",
        emptyTable: "Không có dữ liệu",
        paginate: {
            first: "Trang đầu",
            previous: "Trang trước",
            next: "Trang sau",
            last: "Trang cuối",
        },
        "info": "Bản ghi từ _START_ đến _END_ tổng cộng _TOTAL_ bản ghi",
        "infoFiltered": "",
      }
    });

    //Add buttons print pdf excel
    table.buttons().container().appendTo('#table-crud_wrapper .col-md-6:eq(0)');
    //change content of buttons
    $('.buttons-print').html('<i class="fas fa-print"></i>');
    $('.buttons-pdf').html('<i class="fas fa-file-pdf"></i>');
    $('.buttons-excel').html('<i class="fas fa-file-excel"></i>');
    //change background-color buttons
    $('.dt-buttons button').css("background-color", "#28a745");
    //set width input search
    $('#table-crud_filter input').css('width', '250px')
  });