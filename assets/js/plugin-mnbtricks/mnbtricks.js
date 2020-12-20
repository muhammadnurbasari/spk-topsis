$(document).ready(function(){
      // sett datatable clientside
      $('#table-data').DataTable();

      
      // show edit popup
      $("body").on('click','#editButton', function() {
        // declaration variable
        let here = $(this);
        let id = here.closest('td').find('#editButton').data('id');
        let table = here.closest('td').find('#editButton').data('table');

        // open modal
        $("#editModal").modal({backdrop: 'static', keyboard: false})
        let body = $("#editModal .modal-body");
             
        $.ajax({
          url : baseURL+"manage/manage_view_edit/"+table+"/"+id,
          beforeSend : function () {
            body.html(" ")
          },
          success: function(response) {
           body.append(response)
          }
        })
      });

      // execute update function 
      $("body").on('click','#btnEdit', function() {
        // declaration variable
        let here = $(this);
        let data = $("#editModal .modal-body #form").serialize();
        let action = $("#editModal .modal-body #form").attr("action");

        $.ajax({
          type: 'POST',
          url: action,
          data: data,
          beforeSend:function() {
            here.html("UPDATING ...");
          },
          success: function(response) {
            if (response == 1) {
              setTimeout(function() {
                here.html("UPDATE");
                $("div.alert-edit").html(`<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Update Data Sukses
                </div>`)
              }, 2000)
              setTimeout(function() {
                $("#editModal").modal('hide')
                 location.reload();
              }, 4000)
            }

            if (response != "1") {
              setTimeout(function() {
                here.html("UPDATE");
                $("div.alert-edit").html(`<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    `+response+`
                </div>`)
              }, 2000)
            }

          }
        })
      })

      // show add popup
      $("body").on('click','#addButton', function() {
        // declaration variable
        let here = $(this);
        let table = here.data('table');

        // open modal
        $("#addModal").modal({backdrop: 'static', keyboard: false})
        let body = $("#addModal .modal-body");
             
        $.ajax({
          url : baseURL+"manage/manage_view_add/"+table,
          beforeSend : function () {
            body.html(" ")
          },
          success: function(response) {
           body.append(response)
          }
        })
      });

      // execute add function 
      $("body").on('click','#btnSave', function() {
        // declaration variable
        let here = $(this);
        let data = $("#addModal .modal-body #form").serialize();
        let action = $("#addModal .modal-body #form").attr("action");

        $.ajax({
          type: 'POST',
          url: action,
          data: data,
          beforeSend:function() {
            here.html("SAVING ...");
          },
          success: function(response) {
            if (response == 1) {
              setTimeout(function() {
                here.html("SAVE");
                $("div.alert-add").html(`<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Simpan Data sukses
                </div>`)
              }, 2000)
              setTimeout(function() {
                $("#addModal").modal('hide')
                 location.reload();
              }, 4000)
            }

            if (response != "1") {
              setTimeout(function() {
                here.html("SAVE");
                $("div.alert-add").html(`<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    `+response+`
                </div>`)
              }, 2000)
            }

          }
        })
      })

      // show delete popup
      $("body").on('click','#deleteButton', function() {
        // declaration variable
        let here = $(this);
        let table = here.data('table');
        let id = here.data('id');
        let name = here.data('name');

        // open modal
        $("#deleteModal").modal({backdrop: 'static', keyboard: false})
        $("#deleteModal .modal-header h5.modal-title").html("Yakin Hapus Data "+name);
        $("#deleteModal .modal-footer form#form").attr("action", baseURL+"manage/"+table+"/delete");
        $("#deleteModal .modal-footer form#form input#id").val(id);
        
      });


      // execute add function 
      $("body").on('click','#btnDelete', function() {
        // declaration variable
        let here = $(this);
        let data = $("#deleteModal .modal-footer #form").serialize();
        let action = $("#deleteModal .modal-footer #form").attr("action");

        $.ajax({
          type: 'POST',
          url: action,
          data: data,
          beforeSend:function() {
            $("button#btnDeleteProses").show("slow");
            $("button#btnDelete").hide();
          },
          success: function(response) {
            if (response == 1) {
              setTimeout(function() {
                $("button#btnDeleteProses").hide();
                $("button#btnDelete").show("slow");
                $("div.alert-danger").show("slow")
              }, 3000)
              setTimeout(function() {
                $("#deleteModal").modal('hide')
                 location.reload();
              }, 5000)
            }

          }
        })
      })

    }); // end document ready