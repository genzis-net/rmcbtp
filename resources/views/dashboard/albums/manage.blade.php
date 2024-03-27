@extends('layouts.dash')

@section('content')



<div class="alert alert-success alert-dismissible fade show the-message" role="alert" id="success_message">
  <i class="bi bi-check-circle me-1"></i>
    <span id="the_message"></span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center; font-size: 2rem;">PUBLICATIONS - ALBUMS</h5>
            <p></p>
            <hr/>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">Nouvel Album</button>
            <hr/>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom de l'album</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody id="tbody">

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
</section>

<!-- create Modal -->
  <div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nouvel Album</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="saveform_errList"></div>
              <form class="row g-3" enctype="multipart/form-data" id="albumhandler">
                {{ csrf_field() }}
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                    <label for="name">Nom de l'album</label>
                  </div>
                </div>

                <div class="col-12">
                  <div>
                    <label style="color: red;">Ajout des Images</label>
                    <input type="file" class="form-control" name="image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg, image/jpg">
                  </div>
                </div>

                <div style="text-align: right" class="modal-footer">
                  <button type="submit" class="btn btn-primary valid">Enregistrer</button>
                  <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
<!-- end create modal -->




<!-- delete modal -->
<div class="modal fade" id="verticalycentered" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"style="color: red;"><i class="bi bi-exclamation-diamond"></i> Supprimer l'album?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Toutes les donnees relatives a cet Album seront perdues. Continuer?
      </div>

      <input type="text" id="del_album_id" hidden>

      <div class="modal-footer">
        <button type="button" id="cancel_del" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger proceed">Supprimer</a>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->


@endsection

@section('scripts')
<script>
  $(document).ready(function(){

      fetchalbums();
      //fetch all achievements in database and displays in table body
      function fetchalbums(){
        $.ajax({
          type : "GET",
          url : "{{ route('fetch-albums', app()->getLocale()) }}",
          dataType : "JSON",
          "dataSrc": "tableData",
          contentType: false,
          cache: false,
          processData: false,
          success:function(response){
            //console.log(response);
            $('#tbody').html("");
            let i = 1;
            $.each(response.albums, function(key, item){
              $('#tbody').append(
                '<tr>\
                  <th scope="row">'+i+'</th>\
                  <td>'+item.name+'</td>\
                  <td style="color: aliceblue">\
                    <a href="/show-album?album='+item.id+'"  class="btn btn-info"><i class="bi bi-eye"></i></a>\
                    <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" value="'+item.id+'" class="btn btn-danger del_ref"><i class="bi bi-trash"></i></button>\
                  </td>\
                </tr>'
              );
              i++;
            });
          }
        });
      }


      //saves new ref
      $('#albumhandler').on('click', '.valid', function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = new FormData(document.getElementById("albumhandler"));
        $.ajax({
          type:"POST",
          url:"{{ route('save-album', app()->getLocale()) }}",
          data: data,
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(response){
            //console.log(response);
            if(response.status == 400){
              $('#saveform_errList').html("");
              $('#saveform_errList').addClass("alert alert-danger");
              $.each(response.errors, function(key, err_values){
                $('#saveform_errList').append('<li>'+err_values+'</li>');
              });
            }else{
              $('#the_message').html('');
              $('#saveform_errList').html('');
              $('#success_message').show();
              setTimeout(function(){
                  $('#success_message').fadeOut('slow');
              },5000);
              $('#the_message').append(response.success);
              $('#ExtralargeModal').modal('hide');
              $('#albumhandler').find('input').val('');
              fetchalbums();
            }
          }
        });
      });

      //delete ref
      $(document).on('click', '.del_ref', function(e){
        //e.pralbumDefault();
        var album_id = $(this).val();
        $('#del_album_id').val(album_id);

        $('#verticalycentered').on('click', '.proceed', function(e){
          e.preventDefault();

          var album_id = $('#del_album_id').val();
          console.log(album_id);

          $.ajax({
            type : "GET",
            url : "{{ route('destroy-album', app()->getLocale()) }}?album="+album_id,
            dataType : "JSON",
            success:function(response){
              //console.log(response);
              if(response.status == 404){
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-danger');
                $('#success_message').text(response.message);
              }else{
                $('#del_album_id').val(album_id);
                $('#verticalycentered').modal('hide');

                $('#the_message').html('');
                $('#success_message').show();
                setTimeout(function(){
                    $('#success_message').fadeOut('slow');
                },5000);
                $('#the_message').append(response.message);
                fetchalbums();
              }
            }
          });

        });
      });
  });
</script>
@endsection
