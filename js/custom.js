/**
 * Created by alexfront on 20/12/2017.
 */

function checkUser() {
    var email = $("#email").val();
    var password = $("#password").val();
    var dataString = 'email='+ email + '&password='+ password + '&method=checkUser';
            $.ajax({
                type: 'post',
                url: 'php/index.php',
                data:  dataString,
                success: function (data) {
                    if(data['response']['status'] == 'success'){
                        window.location.href = 'listado.php'
                    }else if(data['response']['status'] == 'error'){
                        errorLogin();
                    }
                }
            });
}

function errorLogin(){
    alert('Datos incorrectos')
}

function deleteRow(param) {
    var dataString = 'id_customer='+ param + '&method=deleteCustomer';
    $.ajax({
        type: 'post',
        url: 'php/listadoPage.php',
        data:  dataString,
        success: function (data) {
            if(data['response']['status'] == 'success'){
                window.location.reload();
            }else if(data['response']['status'] == 'error'){
                alert('error');
            }
        }
    });
}

function updateCustomer(params) {
    var dataString = 'id_customer='+ param + '&method=deleteCustomer';
    $.ajax({
        type: 'post',
        url: 'php/listadoPage.php',
        data:  dataString,
        success: function (data) {
            if(data['response']['status'] == 'success'){
                window.location.reload();
            }else if(data['response']['status'] == 'error'){
                alert('error');
            }
        }
    });
}

function createCustomer(params) {
    var nameCustomer = $("#nameCustomer").val();
    var surnameCustomer = $("#surnameCustomer").val();
    var emailCustomer = $("#emailCustomer").val();
    var addressCustomer = $("#addressCustomer").val();
    var partnerCustomer = $("#partnerCustomer").val();
    var meetingCustomer = $("#meetingCustomer").val();
    var originCustomer = $("#originCustomer").val();
    var dataString = 'nameCustomer='+ nameCustomer + '&surnameCustomer=' + surnameCustomer + '&emailCustomer=' + emailCustomer + '&addressCustomer=' + addressCustomer + '&partnerCustomer=' + partnerCustomer +
        '&meetingCustomer=' + meetingCustomer + '&originCustomer=' + originCustomer + '&method=createCustomer';
    $.ajax({
        type: 'post',
        url: 'php/listadoPage.php',
        data:  dataString,
        success: function (data) {
            if(data['response']['status'] == 'success'){
                window.location.reload();
            }else if(data['response']['status'] == 'error'){
                alert('error');
            }
        }
    });
}

$(window).on('load', function () {
    $('.delete').on('click', function(){
        deleteRow($(this).attr('id_customer'));
    })
    $('.listActions.update').on('click', function(){
        updateCustomer();
    })
    $('.listActions.email').on('click', function(){
        alert('Magicamente mando un email a:' )
    })

    $('.createUser').on('click', function(){
        createUser();
    })

    $('.deleteUser').on('click', function(){
        deleteUser();
    });

   $('#meetingCustomer').multiselect({
       buttonText: function(options, select) {
           return 'Congresos';
       },
   });


})

