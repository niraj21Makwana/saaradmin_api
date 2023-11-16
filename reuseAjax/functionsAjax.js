
function deleteDataAjax(url,dataKey,dataIDKey,deleteTypeName,succesCallBackD) {
     var btnElement = this;
     var typeIs = "deleteType";
  $.ajax({
    type: "POST",
    url: `ajax/delete-data/${url}`,
    data: {[`${dataIDKey}`]: dataKey,[`${typeIs}`]:deleteTypeName},
    success: function (response) {
      if (response == 1) {
        $(btnElement).closest("tr").fadeOut();
        $(".alert-success").html("Data Deleted Successfully!").slideDown();
        $(".alert-danger").html("Data can't be Deleted! First").slideUp();
          succesCallBackD();
        setTimeout(() => {
          $(".alert-success").slideUp();
        }, 2000);
      
      } else {
        $(".alert-success").html("Data Deleted Successfully!").slideUp();
        $(".alert-danger").html("Data can't be Deleted! Secand").slideDown();
        succesCallBackD();
        setTimeout(() => {
          $(".alert-danger").slideUp();
        }, 2000);

      }
    }
  });
return 1;
}

//=====multiDelete function===// 

function multiDeleteData(urls,dataKeyName,dataKeyID,deleteTypeN,successCallBackMuD){
    var typeIs = "deleteType";
     if(dataKeyID.length === 0){
                $(".alert-success").slideUp(); 
                $(".alert-danger").html("Please select at least one to delete.!").slideDown();
                setTimeout(() => {
                    $(".alert-danger").slideUp();
                }, 4000);
            }else{
                $.ajax({
                    type: "Post",
                    url: `ajax/delete-data/${urls}`,
                    data: {[`${dataKeyName}`]:dataKeyID,[`${typeIs}`]:deleteTypeN},
                    success: function (response) {
                        if(response==1){
                            $(".alert-success").html("Deleted Successfully!").slideDown();
                            $(".alert-danger").html("can't Deleted!").slideUp();
                            successCallBackMuD();
                            setTimeout(() => {
                                $(".alert-success").slideUp();
                            }, 4000);
                        }else{
                            $(".alert-success").html("Deleted Successfully!").slideUp();
                            $(".alert-danger").html("can't Deleted!").slideDown();
                            successCallBackMuD();
                            setTimeout(() => {
                                $(".alert-danger").slideUp();
                            }, 4000);
                        }
                    }
                });
            }
            return 1;
}

// ==========submit form ajax===========//
function submitDataForm(form,url,successCallBackInsert){
  setTimeout(() => {
    $('#error_msg').fadeOut();
  }, 2000);

  $.ajax({
    type: "POST",
    url: `ajax/${url}`,
    data: new FormData(form),
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function() {
      $('#process_msg_add').text("Processing...").css('color','green').fadeIn();
      $('#error_msg_added').text("Please fill Empty Values.").css('display','none');
    },
    success: function (data) {
      $('#process_msg_add').text("Please fill Empty Values.").css('display','none');
      $('#process_msg_add').text("Processing...").css('display','none');
      if (data==1) {
          successCallBackInsert();
        $('#process_msg_added').text("Your added successfully").css('color','blue').fadeIn();
        setTimeout(() => {
          $('#process_msg_added').fadeOut();
        }, 3000);
      } else if (data == 0) {
        $('#process_msg_added').text("Something went wrong").css('color','red');
      } 
    }
  });
return 1;
}


// ==============submit form with ckeditior response================

function submitDataFormCK(formData, url,successCallBackInsertCK) {
    setTimeout(() => {
        $('#error_msg').fadeOut();
    }, 2000);

    $.ajax({
        type: "POST",
        url: `ajax/${url}`,
        data: formData, // Use the modified formData here
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#process_msg_add').text("Processing...").css('color', 'green').fadeIn();
            $('#error_msg_added').text("Please fill Empty Values.").css('display', 'none');
        },
        success: function (data) {
            $('#process_msg_add').text("Please fill Empty Values.").css('display', 'none');
            $('#process_msg_add').text("Processing...").css('display', 'none');
            if (data == 1) {
                 successCallBackInsertCK();
                $('#process_msg_added').text("Your added successfully").css('color', 'blue').fadeIn();
                setTimeout(() => {
                    $('#process_msg_added').fadeOut();
                }, 3000);
            } else if (data == 0) {
                $('#process_msg_added').text("Something went wrong").css('color', 'red');
            }
        }
    });
    return 1;
}

// =================clean field function==============
function clearFormFields(fieldIds) {
    for (var i = 0; i < fieldIds.length; i++) {
        $('#' + fieldIds[i]).val("");
    }
}
// ============================
function validateForm(fields) {
    for (var i = 0; i < fields.length; i++) {
        if ($('#' + fields[i]).val() == "") {
            $('#error_msg_added').text("Please Fill Empty Fields.").css('color', 'red');
            return false; // Return false to indicate validation failure
        }
    }
    return true; // Return true if all fields are filled
}
// ========================//

// update function =======================
function updateFormData(formData,urls, successCallback) {
    $.ajax({
        type: "POST",
        url: `ajax/update-data/${urls}`,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            // setting a timeout
            $('#process_msg').text("Processing...").css('color', 'green').fadeIn();
            $('#error_msg').text("Please select name.").css('display', 'none');
        },
        success: function (data) {
             setTimeout(() => {
                    $('#process_msg').fadeOut();
                }, 1000);
            if (data == 1) {
                $('#editModal').modal('hide');
                swal("Update Message", "Your status has been updated.", "success");
               
                // Call the success callback function
                successCallback();
            } else if (data == 0) {
                swal("error", "Your status could not be updated.", "error");

                successCallback();
                $('#process_msg1').text("Something went wrong").css('color', 'red').fadeIn();
            }
        }
    });
}
// ==========================

