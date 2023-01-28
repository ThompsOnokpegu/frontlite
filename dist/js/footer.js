
$(document).ready(function(){
    $("#order_table").DataTable({
          ajax:{
            url:'includes/dt.php',
            dataSrc:''
          },
          columns:[
            {data:'order_id'},
            {data:'client'},
            {data:'design'},
            {data:'order_date'},
            {data:98},
          ],
          responsive: true,
          paging: true,
          scrollY: 400,
          autoWidth: true,
    });
});
 
   
$(document).ready(function(){
    $("#customer_table").DataTable({
        ajax:{
          url:'scripts/datatable.php',
          dataSrc:''
        },
        columns:[
          {data:'customer_id'},
          {data:'firstname'},
          {data:'lastname'},
          {data:'phone'},
          {data:5},
        ],
        responsive:true,
        paging: true,
        scrollY: 400,
        autoWidth: true,
    }); 
});
  
$(document).ready(function(){
 $("#invoice_table").DataTable({
       ajax:{
         url:'includes/invoice_dt.php',
         dataSrc:''
       },
       columns:[
         {data:'invoice_id'},
         {data:'client'},
         {data:'amount'},
         {data:'deposit'},
         {data:61},
         {data:62},
         
       ],
       responsive:true,
       paging: true,
       scrollY: 400,
       autoWidth: true,

     }); 
});
var x = "<?php echo $customer['customer_id']; ?>"
$(document).ready(function(x){ 
  $("#my_job_pages").DataTable({
        ajax:{
          url:'scripts/my.job.pages.php?customer='+ x,
          dataSrc:''
        },
        columns:[
          {data:54},
          {data:'order_id'},
          {data:'order_date'},
          {data:53},
          {data:55}, 
        ],
        responsive: true,
        paging: true,
        scrollY: 400,
        autoWidth: true,
    }); 
});
     

$(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
    if($(this).prop("checked") == true){
      $('#old_bal').val($('#bal').val());
    }else if($(this).prop("checked") == false){
      $('#old_bal').val(0); 
    }
  });
});

$(document).ready(function(){
    $(function () {   
        //color picker with addon
        $('.my-colorpicker1').colorpicker()
  
        $('.my-colorpicker1').on('colorpickerChange', function(event) {
          $('.my-colorpicker1 .fa-square').css('color', event.color.toString());
        });
  
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
  
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    });
});


    