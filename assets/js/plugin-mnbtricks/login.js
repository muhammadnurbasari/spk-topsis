$(document).ready(function(){

    $(".alert-login").hide()

      // execute add function 
      $("body").on('click','#btn-login', function() {
        var here = $(this)
        var username = $("input#username").val()
        var password = $("input#password").val()
        $(".alert-login").hide("slow")

        console.log(username, password)

        here.html("Loading ... ")
        setTimeout(function() {
          here.html("MASUK")
          login(username, password)
        }, 3000)

        
      })

      function login(username, password) {
        if (username == "" || username == null) {
          $(".alert-login").show("slow")
          $("#alert-message").html("Username Wajib Isi")
        } else if (password == "" || username == null) {
          $(".alert-login").show("slow")
          $("#alert-message").html("Password Wajib Isi")
        } else {
          var form = $("form.login")
          $.ajax({
            url : baseURL+"welcome/login/",
            type : "POST",
            data : form.serialize(),
            success: function(response) {
              var result = JSON.parse(response)

              if (Number(result.meta.response) != Number(200)) {
                $(".alert-login").show("slow")
                $("#alert-message").html(result.meta.msg)
              } else {
                $(".alert-login").hide("slow")
                window.location.href = baseURL+"dashboard"; 
              }
            }
          })
        }
      }

    }); // end document ready