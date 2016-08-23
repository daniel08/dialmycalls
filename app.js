//app.js
$(window).on('load',function(){

$('form').on('submit', function(e){
    e.preventDefault();
    var form = this,
    method = $(this).attr('method'),
    action = $(this).attr('action'),
    data = {};

    $(':input', form).each(function(){
        data[$(this).attr('name')] = $(this).val();
    });
    
    $.ajax({
        url: action,
        type: method,
        data : data,
    }).then(function(response){
        if( $(form).is('#addContactForm') ){
            $('#addContactForm').trigger('submitted', [response]);
        }
    });
});


$('#addContactForm').on('submitted', function(e, data){
    console.log(data);
    if( data.hasOwnProperty('status') && data.status == 'error' ){
        toastr.error(data.msg);
    }
    else if( data.hasOwnProperty('meta') && data.meta.result == 'success' ){
        toastr.success('Contact created successfully!');
        $(this).find('input[type=text]').val('');
    }
    getContacts();
});

function getContacts(){
    $.ajax({
        url: 'backend.php',
        type: 'GET',
        data: {
            'getContacts' : 1,
        }
    }).then(function(data){
        if( data.hasOwnProperty('results') && data.results ){
            //clear the table
            var tblBody = $('table.all-contacts tbody');
            tblBody.empty();
            for( i in data.results ){
                var r = data.results[i];
                $('<tr><td>'+r.firstname+'</td><td>'+r.lastname+'</td><td>'+r.email+'</td><td>'+r.phone+'</td></tr>').appendTo(tblBody);
            }
        }

    });
}

getContacts();

});
