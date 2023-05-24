</body>
    <script src="js/form_validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>

      $(document).ready(function(){
        $("#submit").on('click',function(e){
          e.preventDefault();

          // var formData = $(this)/serialize();

          var email = $("#email").val();
          var names = $("#names").val();
          var uploadFile = $("#uploadFile").val();
          var country = $("#country").val();

          if(email == '' || names == '' || country == ''){
            $('#ajax-alert').html("<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'>Fields cannot be empty <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
          }else{
                $.ajax({
                    url:'db_connection/insert_data.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: {
                      "email": email,
                      "names": names,
                      "uploadFile": uploadFile,
                      "country": country
                    },
                    beforeSend: function(){
                      $('#submit').attr("disabled", "disabled");
                    },
                    success: function(response){
                      $('#ajax-alert').html("<div class='alert alert-success'>"+response+"</div>")
                      $("#form")[0].reset();
                    }
                })
          }
          return false;
        });
        
      });

  </script>
    </html>