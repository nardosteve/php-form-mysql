</body>
    <script src="js/form_validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>

      $(document).ready(function(){
        $("#submit").on('click',function(){
          //Take submit and prevent submi

          var email = $("#email").val();
          var names = $("#names").val();
          var uploadFile = $("#uploadFile").val();
          var country = $("#country").val();

          if(email == '' || names == '' || country == ''){
            $('#ajax-alert').html("<div class='alert alert-danger'>Fields cannont be empty</div>")
          }else{
                $.ajax({
                    url:'db_connection/insert_data.php',
                    type: 'POST',
                    data: {
                        'email':email,
                        'names': names,
                        'country': country         
                    },
                    success: function(response){
                        $('#ajax-alert').html("")
                        if(response.status == 1){
                          $("#form")[0].reset();
                          $('#ajax-alert').html("<div class='alert alert-success'>"+response.message+"</div>")
                        }else{
                          $('#ajax-alert').html("<div class='alert alert-danger'>"+response.message+"</div>")

                        }
                    }
                })
          }
          return false;
        });
        
      });

  </script>
    </html>