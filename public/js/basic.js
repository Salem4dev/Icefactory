// Start Login Area

$(document).ready(function () {
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
});

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('/');
}
// Customer area
/*---------------------------------------------------------------*/
//    add modal for Customer_info
/*---------------------------------------------------------------*/


$(document).on('submit', '#addcustomer',function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            url: "/customer_info/add",
            dataType: 'json',
            data: $('form').serialize(),
            success: function(data){
                // setTimeout(function(){// wait for 5 secs(2)
                //     location.reload(); // then reload the pbirth_day.(3)
                // },300);
                var td = '<tr id="ex'+data.id+'">'+
                    '<td>'+data.id+'</td>'+
                    '<td>'+data.name +'</td>'+
                    '<td>'+data.price +'</td>'+
                    '<td>'+data.phone +'</td>'+
                    '<td>'+data.address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+data.name+'" data-price="'+data.price+'" data-phone="'+data.phone+'" data-address="'+ data.address +'" data-id="'+data.id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+data.id+'"> </td>'+
            '</tr>';
                $("#tabl").append(td);
                console.log(data);
                $('#addmodal').modal('hide');

            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    update modal Customer_info
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#name").val($(this).data('name'));
    $("#pricee").val($(this).data('price'));
    $("#phone").val($(this).data('phone'));
    $("#address").val($(this).data('address'));
    $('#editmodel').modal('show');
});
    $(document).on('submit','#updatetest', function(e){
        e.preventDefault();
        var id      = $("#id").val(),
            name    = $('#name').val(),
            price   = $('#pricee').val(),
            phone   = $('#phone').val(),
            address = $('#address').val();
        $.ajax({
            type:'POST',
            url: "customer_info/edit/"+id,
            data: $('form').serialize(),
            success: function(data){
                console.log(id);
                var td = '<td>'+id+'</td>'+
                    '<td>'+name +'</td>'+
                    '<td>'+price +'</td>'+
                    '<td>'+phone +'</td>'+
                    '<td>'+address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+name+'" data-price="'+price+'" data-phone="'+phone+'" data-address="'+ address +'" data-id="'+id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"> </td>';
                // alert('success');
                $('#ex'+id).html(td);
                $('#editmodel').modal('hide');

            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    delete modal Customer_info
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});

    $(document).on('submit','#delete', function(e){
        e.preventDefault();
        var id  = $("#id").val();
        $.ajax({
            type: 'POST',
            url: "customer_info/delete/"+id,
            data: $('form').serialize(),
            success: function (data) {
                $('#ex' + id).remove();
                $('#deletemodal').modal('hide');
            },
            error: function (e) {
                // alert("error : " + e);
                console.log(e);
            }
        });
    });

// Employee  area

/*function ShowItems() {

    $.ajax({
        url: "employee_info/index",
        type: "POST",
        success: function (data) {
            $("table tbody").append(data)
        }
    });
    var action = "showitems";
    $.ajax({
        url: "employee_info",
        type: "POST",
        data: {action: action},
        success: function (data) {
            $("table tbody tr").not(" table tr:first ").remove();
            $("table tbody tr").append(data);
            // Table();
        }
    })
}*/
/*---------------------------------------------------------------*/
//    add modal for Employee_info
/*---------------------------------------------------------------*/

    $(document).on('submit','#addEmployeeform', function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            url: "employee_info/add",
            dataType: 'json',
            data: $('form').serialize(),
            success: function(data){
                // setTimeout(function(){// wait for 5 secs(2)
                //     location.reload(); // then reload the pbirth_day.(3)
                // },300);
                var td = '<tr id="ex'+data.id+'">'+
                    '<td>'+data.id+'</td>'+
                    '<td>'+data.name +'</td>'+
                    '<td>'+data.birth_day.date+'</td>'+
                    '<td>'+data.phone +'</td>'+
                    '<td>'+data.address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+data.name+'" data-birth_day="'+data.birth_day+'" data-phone="'+data.phone+'" data-address="'+data.address +'" data-id="'+data.id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+data.id+'"> </td>'+
                    '</tr>';
                $("#table").append(td);
                console.log(data);
                $('#addmodal').modal('hide');
            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    update modal Employee_info
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#name").val($(this).data('name'));
    $("#birth_day").val($(this).data('birth_day'));
    $("#phone").val($(this).data('phone'));
    $("#address").val($(this).data('address'));
    $('#editmodel').modal('show');
});
    $(document).on('submit','#updateEmployeeform', function(e){
        e.preventDefault();
        var id         = $("#id").val(),
            name       = $('#name').val(),
            birth_day  = $('#birth_day').val(),
            phone      = $('#phone').val(),
            address    = $('#address').val();
        $.ajax({
            type:'POST',
            url: "employee_info/update/"+id,
            data: $('form').serialize(),
            success: function(data){
                var td ='<td>'+id+'</td>'+
                    '<td>'+name+'</td>'+
                    '<td>'+birth_day+'</td>'+
                    '<td>'+phone+'</td>'+
                    '<td>'+address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+name+'" data-birth_day="'+birth_day+'" data-phone="'+phone+'" data-address="'+address+'" data-id="'+id+'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"> </td>';
                // alert('success');
                $('#ex' +id).html(td);
                $('#editmodel').modal('hide');
            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    delete modal Employee_info
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
    $(document).on('submit','#deleteForm', function(e){
        e.preventDefault();
        var id  = $("#id").val();
        $.ajax({
            type: 'POST',
            url: "employee_info/delete/"+id,
            data: $('form').serialize(),
            success: function (data) {
                $('#ex' + id).remove();
                $('#deletemodal').modal('hide');
            },
            error: function (e) {
                // alert("error : " + e);
                console.log(e);
            }
        });
    });

// Sales  area

/*---------------------------------------------------------------*/
//    add modal for daily_sales
/*---------------------------------------------------------------*/

    $(document).on('submit','#addSalesform', function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            url: "daily_sales/add",
            dataType: 'json',
            data: $('form').serialize(),
            success: function(data){
                // var updated = new Date(data.updated_at);
                var created = new Date(data.created_at);
                var weekday = new Array(7);
                weekday[0] = "Sunday";
                weekday[1] = "Monday";
                weekday[2] = "Tuesday";
                weekday[3] = "Wednesday";
                weekday[4] = "Thursday";
                weekday[5] = "Friday";
                weekday[6] = "Saturday";
                var day = weekday[created.getDay()];
                // var created_at = created.getFullYear()+'/'+(created.getMonth()+1)+'/'+created.getDate();
                // var updated_at = updated.getFullYear()+'/'+(updated.getMonth()+1)+'/'+updated.getDate();

                var td = '<tr id="ex'+data.id+'">'+
                    '<td>'+data.id+'</td>'+
                    '<td>'+formatDate(data.created_at)+'</td>'+
                    '<td>'+day+'</td>'+
                    '<td>'+data.from_check +'</td>'+
                    '<td>'+data.to_check +'</td>'+
                    '<td>'+data.number +'</td>'+
                    '<td>'+data.halek+'</td>'+
                    '<td>'+data.Snowboard_price+' ج.م </td>'+
                    '<td>'+parseInt(safy = data.number * 30 - data.halek) +'</td>'+
                    '<td>'+parseInt(safy * data.Snowboard_price) +' ج.م</td>'+
                    '<td>'+data.customer_id+'</td>'+
                    '<td>'+formatDate(data.updated_at)+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-from="'+data.from_check+'" data-to="'+data.to_check+'" data-number="'+data.number+'" data-halek="'+data.halek+'" data-price="'+data.Snowboard_price+'" data-customerid="'+data.customer_id+'" data-id="'+data.id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" id="'+data.id+'"> </td>'+
                    '</tr>';
                $("#table").append(td);
                // console.log(data);
                $('#addmodal').modal('hide');
            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    update modal daily_sales
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#from").val($(this).data('from_check'));
    $("#to").val($(this).data('to_check'));
    $("#number").val($(this).data('number'));
    $("#halek").val($(this).data('halek'));
    $('#price').val($(this).data('price'));
    $('#customerid').val($(this).data('customer_id'));
    $('#editmodel').modal('show');
});

    $(document).on('submit','#updateSalesform', function(e){
        e.preventDefault();
        var     id          = $("#id").val();
        var     from        = $('#from').val();
        var     to          = $('#to').val();
        var     number      = $('#number').val();
        var     halek       = $('#halek').val();
        var     price       = $('#price').val();
        var     customerid  = $('#customerid').val();
        $.ajax({
            type:'POST',
            url: "daily_sales/update/"+id,
            data: $('form').serialize(),
        success: function(data){
                // var updated = new Date(data.updated_at);
                var created = new Date(data.created_at);
                var weekday = new Array(7);
                weekday[0] = "Sunday";
                weekday[1] = "Monday";
                weekday[2] = "Tuesday";
                weekday[3] = "Wednesday";
                weekday[4] = "Thursday";
                weekday[5] = "Friday";
                weekday[6] = "Saturday";
                var day = weekday[created.getDay()];
                // var created_at = created.getFullYear()+'/'+(created.getMonth()+1)+'/'+created.getDate();
                // var updated_at = updated.getFullYear()+'/'+(updated.getMonth()+1)+'/'+updated.getDate();
                var td = '<td>'+id+'</td>'+
                    '<td>'+formatDate(data.created_at)+'</td>'+
                    '<td>'+day+'</td>'+
                    '<td>'+from +'</td>'+
                    '<td>'+to +'</td>'+
                    '<td>'+number +'</td>'+
                    '<td>'+halek+'</td>'+
                    '<td>'+price+'</td>'+
                    '<td>'+parseInt(safy = number * 30 - halek) +'</td>'+
                    '<td>'+parseInt(safy * price) +' ج.م</td>'+
                    '<td>'+customerid+'</td>'+
                    '<td>'+formatDate(data.updated_at)+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-from_check="'+from+'" data-to_check="'+to+'" data-number="'+number+'" data-halek="'+halek+'" data-price="'+price+'" data-customer_id="'+customerid+'" data-id="'+id +'" /> <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'" /></td>';
                // alert('success');
                $('#ex'+id).html(td);
                $('#editmodel').modal('hide');
            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    delete modal daily_sales
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
    $(document).on('submit','#deleteForm', function(e){
        e.preventDefault();
        var id  = $("#id").val();
        $.ajax({
            type: 'POST',
            url: "daily_sales/delete/"+id,
            data: $('form').serialize(),
            success: function (data) {
                $('#ex' + id).remove();
                $('#deletemodal').modal('hide');
            },
            error: function (e) {
                // alert("error : " + e);
                console.log(e);
            }
        });
    });


/*---------------------------------------------------------------*/
//    add modal expenses
/*---------------------------------------------------------------*/

$(document).on('submit','#addExpenseform', function(e){
    e.preventDefault();
    $.ajax({
        type:'POST',
        url: "expenses/add",
        dataType: 'json',
        data: $('form').serialize(),
        success: function(data){
            // var updated = new Date(data.updated_at);
            var created = new Date(data.created_at);
            var weekday = new Array(7);
            weekday[0] = "Sunday";
            weekday[1] = "Monday";
            weekday[2] = "Tuesday";
            weekday[3] = "Wednesday";
            weekday[4] = "Thursday";
            weekday[5] = "Friday";
            weekday[6] = "Saturday";
            var day = weekday[created.getDay()];
            // var created_at = created.getFullYear()+'/'+(created.getMonth()+1)+'/'+created.getDate();
            // var updated_at = updated.getFullYear()+'/'+(updated.getMonth()+1)+'/'+updated.getDate();

            var td = '<tr id="ex'+data.id+'">'+
                "<td>" + data.id + "</td>" +
                '<td>'+formatDate(data.created_at)+'</td>'+
                '<td>'+day+'</td>'+
                "<td>" + data.soe + "</td>" +
                "<td>" + data.qty + "</td>" +
                "<td>" + data.unit_price + "</td>" +
                "<td>" + data.empl_id + "</td>" +
                '<td>'+parseInt(data.qty * data.unit_price)+'</td>'+
                "<td>" + data.type_id + "</td>" +
                "<td>" + data.partner_id + "</td>" +
                "<td>" + data.notes+ "</td>" +
                '<td>'+formatDate(data.updated_at)+'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-soe="'+data.soe+'" data-qty="'+data.qty+'" data-price="'+data.unit_price+'" data-notes="'+data.notes+'" data-type="'+data.type_id+'" data-officer="'+data.empl_id+'" data-partner="'+data.partner_id+'" data-id="'+data.id +'"> <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+data.id+'"></td>'+
                '</tr>';
            $("#table").prepend(td);
            console.log(data);
            $("#null").hide();
            $('#addmodal').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });
});
/*---------------------------------------------------------------*/
//    update modal expenses
/*---------------------------------------------------------------*/

$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#soe").val($(this).data('soe'));
    $("#qty").val($(this).data('qty'));
    $("#price").val($(this).data('price'));
    $("#note").val($(this).data('notes'));
    $("#type").val($(this).data('type'));
    $("#officer").val($(this).data('officer'));
    $("#partnerid").val($(this).data('partner'));
    // $("#updateExpensesform").attr('action', "expenses/update/"+$("#id").val());
    $('#editmodel').modal('show');
});

$(document).on('submit','#updateExpensesform', function(e){
    e.preventDefault();
    var  id           = $("#id").val();
    var  soe          = $('#soe').val();
    var  qty          = $('#qty').val();
    var  unit_price   = $('#price').val();
    var  notes        = $('#note').val();
    var  type_id      = $('#type').val();
    var  empl_id      = $('#officer').val();
    var  partner_id   = $('#partnerid').val();
    $.ajax({
        type:'POST',
        url: "expenses/update/"+id,
        data: $('form').serialize(),
        success: function(data){
            // var updated = new Date(data.updated_at);
            var created = new Date(data.created_at);
            // var  creats = data.created_at.split(' ')[0];
            // var   updates = data.updated_at.split(' ')[0];
            // var DateCreated = new Date(Date.parse(data.created_at)).format("yyyy/mm/dd");
            var weekday = new Array(7);
            weekday[0] = "Sunday";
            weekday[1] = "Monday";
            weekday[2] = "Tuesday";
            weekday[3] = "Wednesday";
            weekday[4] = "Thursday";
            weekday[5] = "Friday";
            weekday[6] = "Saturday";
            var day = weekday[created.getDay()];
            /*var created_at = created.getFullYear()+'/'+(created.getMonth()+1)+'/'+created.getDate();
            var updated_at = updated.getFullYear()+'/'+(updated.getMonth()+1)+'/'+updated.getDate();*/

            var td =  "<td>" + id + "</td>" +
                '<td>'+formatDate(data.created_at)+'</td>'+
                '<td>'+day+'</td>'+
                "<td>" + soe + "</td>" +
                "<td>" + qty + "</td>" +
                "<td>" + unit_price + "</td>" +
                "<td>" + empl_id + "</td>" +
                '<td>'+parseInt(qty * unit_price)+'</td>'+
                "<td>" + type_id + "</td>" +
                "<td>" + partner_id + "</td>" +
                "<td>" + notes + "</td>" +
                '<td>'+formatDate(data.updated_at)+'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-soe="'+soe+'" data-qty="'+qty+'" data-price="'+unit_price+'" data-notes="'+notes+'" data-type="'+type_id+'" data-officer="'+empl_id+'" data-partner="'+partner_id+'" data-id="'+id +'"> <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>';
            $('#ex' + id).html(td);
            $('#editmodel').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });
});

/*---------------------------------------------------------------*/
//    delete modal expenses
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
$(document).on('submit','#deleteExpensesForm', function(e){
    e.preventDefault();
    var id  = $("#id").val();
    $.ajax({
        type: 'POST',
        url: "expenses/delete/"+id,
        data: $('form').serialize(),
        success: function (data) {
            $('#ex' + id).remove();
            $('#deletemodal').modal('hide');
            console.log(data);
        },
        error: function (e) {
            // alert("error : " + e);
            console.log(e);
        }
    });
});


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*---------------------------------------------------------------*/
//    add modal for Categories
/*---------------------------------------------------------------*/
$(document).on('submit','#addcategoryform', function(e){
    e.preventDefault();
    $.ajax({
        type:'POST',
        url: "categories",
        dataType: 'json',
        data: $('form').serialize(),
        success: function(data){
            var td = '<tr id="categ'+data.id+'">'+
                '<td>'+data.id+'</td>'+
                '<td>'+data.name +'</td>'+
                '<td>'+data.parent_id +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+data.name+'" data-subcateg="'+data.parent_id+'" data-id="'+id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+data.id+'"></td>'+
                '</tr>';
            $("#table").prepend(td);
            console.log(data);
            $("#null").hide();
            $('#addmodal').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });
});

/*---------------------------------------------------------------*/
//    update modal Categories
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#categ").val($(this).data('name'));
    $("#subcateg").val($(this).data('subcateg'));
    $('#editmodel').modal('show');
});
// $('.modal-footer').on('click', '#updateSales', function () {

$(document).on('submit','#updatecategoryform', function(e){
    e.preventDefault();
    var     id           = $("#id").val();
    var     categ        = $('#categ').val();
    var     subcateg     = $('#subcateg').val();
    var	rows = '';
    $.ajax({
        type:'PATCH',
        url: "categories/"+id,
        data: $('form').serialize(),

        success: function(data){
            rows = rows +  '<td>'+id+'</td>';
            rows = rows +   '<td>'+categ+'</td>';
            rows = rows +   '<td>'+subcateg+'</td>';
            rows = rows +   '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+categ+'" data-subcateg="'+subcateg+'" data-id="'+id +'"></td>';
            rows = rows +  '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>';
            // alert('success');
            $('#categ'+id).html(rows);
            $('#editmodel').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });
});
// });

/*---------------------------------------------------------------*/
//    delete modal Categories
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
$(document).on('submit','#deletecategForm', function(e){
    e.preventDefault();
    var id  = $("#id").val();
    $.ajax({
        type: 'DELETE',
        url: "categories/"+id,
        data: $('form').serialize(),
        success: function (data) {
            $('#categ' + id).remove();
            $('#deletemodal').modal('hide');
        },
        error: function (e) {
            // alert("error : " + e);
            console.log(e);
        }
    });
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*---------------------------------------------------------------*/
//    add modal for Products
/*---------------------------------------------------------------*/
$(document).on('submit','#addproductform', function(e){
    e.preventDefault();
    var formData = new FormData($("#addproductform")[0]);
    $.ajax({
        type:'POST',
        url: "products",
        dataType: 'json',
        // data: $('form').serialize(),
         data: formData,
        async:  true,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            alert(data.image);
            var td = '<tr id="prod'+data.id+'">'+
                '<td>'+data.id+'</td>'+
                '<td>'+data.name +'</td>'+
                '<td><img class="img-responsive" style="height : 50px; width: 100px; src="images/'+data.image+'"></td>'+
                '<td>'+data.category_id +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+data.name+'" data-image="'+data.image+'" data-categid="'+data.category_id+'" data-id="'+data.id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+data.id+'"></td>'+
                '</tr>';
            $("#table").prepend(td);
            console.log(data);
            $("#null").hide();
            $('#addmodal').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });
});

$(document).on('change', '#addimage', function() {
    readURL(this);
    $('.forhide').css("display", "block");

});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#addimages').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

/*---------------------------------------------------------------*/
//    update modal Products
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#name").val($(this).data('name'));
    $("#images").attr("src","images/"+$(this).data('image'));
    // $("#categ_id").val($(this).data('categ_id'));
    $("#updateproductform").attr('action', "products/update/"+$("#id").val());
    $('#editmodel').modal('show');
});

/*$(document).on('submit','#updateproductform', function(e){
    e.preventDefault();
    var     id          = $("#id").val();
    var     name        = $('#name').val();
    var     images        = $('#image').attr('src');
    var     categ_id         = $('#categ_id').val();
    var imgsrc = "images/"+images;
    // alert(imgsrc);
    $.ajax({
        type:'PATCH',
        url: "products/"+id,
        data: {
            "_token": $("input[name=_token]").val(),
            id: id,
            name: name,
            images: images,
            categ_id: categ_id
        },
        success: function(data){
            var td = '<td>'+data.id+'</td>'+
                '<td>'+name +'</td>'+
                '<td><img class="img-responsive" style="height : 50px; width: 100px; src="'+imgsrc+'"></td>'+
                '<td>'+categ_id +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+name+'" data-image="'+images+'" data-categid="'+categ_id+'" data-id="'+id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>'+
                '</tr>';
            // alert('success');
            // $('#ex' + data.id).html(td);
            $('#editmodel').modal('hide');
        },
        error:function (e) {
            alert("error : "+e);
            console.log(e);
        }
    });
});*/

/*---------------------------------------------------------------*/
//    delete modal Products
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodalproduct').modal('show');
});
$(document).on('submit','#deleteproductForm', function(e){
    e.preventDefault();
    var id  = $("#id").val();
    $.ajax({
        type: 'DELETE',
        url: "products/"+id,
        data: $('form').serialize(),
        success: function (data) {
            $('#ex' + id).remove();
            $('#deletemodalproduct').modal('hide');
            console.log(data);
        },
        error: function (e) {
            // alert("error : " + e);
            console.log(e);
        }
    });
});

/*---------------------------------------------------------------*/
//    show table modal expenses
/*---------------------------------------------------------------*/
