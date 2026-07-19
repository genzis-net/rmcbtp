@extends('layouts.dash')

@section('page-head')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home', ['language' => app()->getLocale()]) }}">Home</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

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
            <h5 class="card-title" style="text-align: center; font-size: 2rem;">PUBLICATIONS - EVENEMENT</h5>
            <p></p>
            <hr/>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">Nouvel evenement</button>
            <hr/>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Cover</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Lieu</th>
                  <th scope="col">prevu pour le</th>
                  <th scope="col">Status</th>
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
          <h5 class="modal-title">Nouvel event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="saveform_errList"></div>
              <form class="row g-3" enctype="multipart/form-data"id="eventhandler">
                {{ csrf_field() }}
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName_fr" placeholder="Your Name" name="title_fr">
                    <label for="floatingName_fr">Titre (fr)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName_en" placeholder="Your Name"name="title_en" >
                    <label for="floatingName_en">Titre (en)</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                      <label for="floatingName">Image de Couverture</label>
                      <input type="file" class="form-control" id="floatingName" accept="image/png, image/gif, image/jpeg, image/jpg" name="cover"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                      <label for="location">Lieu</label>
                      <input type="text" class="form-control" id="location" name="location"/>
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingEmail" placeholder="Author" value="{{ Auth::User()->name }}" readonly>
                      <label for="floatingEmail">Author (field is autocompleted)</label>
                    </div>
                </div>
                 <div class="col-md-4">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="date" placeholder="Author" name="date">
                        <label for="date">Prevu pour le:</label>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                      <input type="time" class="form-control" id="time" placeholder="Author" name="time">
                      <label for="time">Heure de debut:</label>
                    </div>
                </div>

                <div class="col-12">
                  <div>
                    <label style="color: red;">Contenu (fr)</label>
                    <textarea class="form-control" placeholder="Address" id="summary-ckeditor" name="content_fr"></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div>
                    <label style="color: red;">Contenu (en)</label>
                    <textarea class="form-control" placeholder="Address" id="summary-ckeditor2" name="content_en"></textarea>
                  </div>
                </div>

                <div style="text-align: right" class="modal-footer">
                  <button type="submit" class="btn btn-primary valid">Publier</button>
                  <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
<!-- end create modal -->

<!-- edit event modal -->
<div class="modal fade" id="myEditModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDITER EVENEMENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: 2rem;" id="title">EDIT EVENEMENT</h5>
              <hr/>

              <!-- Register new event -->
              <div id="updateform_errList"></div>
              <div id="update_message"></div>

              <form class="row g-3" enctype="multipart/form-data" id="eventUpdater">
                {{ csrf_field() }}

                <input type="text" id="edit_event_id" hidden>
                <input type="hidden" name="_method" value="PUT" id="method"/>

                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="edit_title_fr" placeholder="Your Name" name="edit_title_fr">
                      <label for="edit_title_fr">Titre (fr)</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="edit_title_en" placeholder="Your Name"name="edit_title_en" >
                      <label for="edit_title_en">Titre (en)</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="">
                      <label for="edit_cover">Image de Couverture</label>
                      <input type="file" class="form-control" id="edit_cover" accept="image/png, image/gif, image/jpeg, image/jpg" name="edit_cover"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="">
                      <label for="edit_location">Lieu</label>
                      <input type="text" class="form-control" id="edit_location" name="edit_location"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingEmail" placeholder="Author" value="{{ Auth::User()->name }}" readonly>
                      <label for="floatingEmail">Author (field is autocompleted)</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="edit_date" placeholder="Author" name="edit_date">
                        <label for="edit_date">Prevu pour le:</label>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="time" class="form-control" id="edit_time" placeholder="Author" name="edit_time">
                      <label for="edit_time">Heure de debut:</label>
                    </div>
                </div>

                  <div class="col-12">
                    <div>
                      <label style="color: red;">Contenu (fr)</label>
                      <textarea class="form-control" placeholder="Address" id="edit_summary-ckeditor" name="edit_content_fr"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div>
                      <label style="color: red;">Contenu (en)</label>
                      <textarea class="form-control" placeholder="Address" id="edit_summary-ckeditor2" name="edit_content_en"></textarea>
                    </div>
                  </div>

                <div style="text-align: right" class="modal-footer">
                  <button type="submit" class="btn btn-primary update">Update</button>
                  <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" id="close_edit">Cancel</button>
                </div>
              </form>


            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- end edit event modal -->


<!-- delete modal -->
<div class="modal fade" id="verticalycentered" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"style="color: red;"><i class="bi bi-exclamation-diamond"></i> Supprimer l'evenement?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Toutes les donnees relatives a l'evenement seront perdues. Continuer?
      </div>

      <input type="text" id="del_event_id" hidden>

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

      fetchevents();
      //fetch all achievements in database and displays in table body
      function fetchevents(){
        $.ajax({
          type : "GET",
          url : "{{ route('fetch-events',app()->getLocale()) }}",
          dataType : "JSON",
          "dataSrc": "tableData",
          contentType: false,
          cache: false,
          processData: false,
          success:function(response){
            console.log(response);
            $('#tbody').html("");
            let i = 1;
            $.each(response.events, function(key, item){
              $('#tbody').append(
                '<tr>\
                  <th scope="row">'+i+'</th>\
                  <td><img src="/images/events/cover/'+item.cover+'" style="width: 100px;"></td>\
                  <td>'+item.title_fr+'</td>\
                  <td>'+item.location+'</td>\
                  <td>'+item.date+'</td>\
                  <td><span class="badge bg-primary">'+item.status+'</span></td>\
                  <td style="color: aliceblue">\
                    <a href="/show-event?event='+item.id+'" value="'+item.id+'" class="btn btn-info show_ref"><i class="bi bi-eye"></i></a>\
                    <button type="button" value="'+item.id+'" data-bs-toggle="modal" data-bs-target="#myEditModal" class="btn btn-warning edit_ref"><i class="bi bi-pencil-square"></i></button>\
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
      $('#eventhandler').on('click', '.valid', function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = new FormData(document.getElementById("eventhandler"));
        var textarea1 = CKEDITOR.instances['summary-ckeditor'].getData();
        var textarea2 = CKEDITOR.instances['summary-ckeditor2'].getData();
        data.append('content_fr', textarea1);
        data.append('content_en', textarea2);
        $.ajax({
          type:"POST",
          url:"{{ route('save-event',app()->getLocale()) }}",
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
              $('#eventhandler').find('input').val('');
              CKEDITOR.instances['summary-ckeditor'].setData('');
              CKEDITOR.instances['summary-ckeditor2'].setData('');
              fetchevents();
            }
          }
        });
      });


      //edit ref
      //loads the modal with all series's info to edit
      $(document).on('click', '.edit_ref', function(e){
        e.preventDefault();
        $('.update').text('update');
        var event_id = $(this).val();
        $('#myEditModal').show('');
        $(document).on('click', '#close_edit', function(e){
          e.preventDefault();
          $('.update').text('update');
          $('#myEditModal').find('input').val('');
          $('#myEditModal').find('textarea').val('');
          $('#myEditModal').hide('');
        });

        $.ajax({
          type : "GET",
          url : "{{ route('edit-event',app()->getLocale()) }}?event="+event_id,
          dataType : "JSON",
          success:function(response){
            //console.log(reponse);
            if(response.status == 404){
              $('#success_message').html("");
              $('#success_message').addClass('alert alert-danger');
              $('#success_message').text(response.message);
            }else{
              $('.update').text('update');
              $('#edit_event_id').val(event_id);
              $('#edit_title_fr').val(response.event.title_fr);
              $('#edit_title_en').val(response.event.title_en);
              $('#edit_date').val(response.event.date);
              $('#edit_time').val(response.event.time);
              $('#edit_location').val(response.event.location);
              CKEDITOR.instances['edit_summary-ckeditor'].setData(response.event.content_fr);
              CKEDITOR.instances['edit_summary-ckeditor2'].setData(response.event.content_en);
            }
          }
        });
      });


      //update ref
      $('#eventUpdater').on('click', '.update', function(e){
        e.preventDefault();
        var event_id = $('#edit_event_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = new FormData(document.getElementById("eventUpdater"));
        var textarea1 = CKEDITOR.instances['edit_summary-ckeditor'].getData();
        var textarea2 = CKEDITOR.instances['edit_summary-ckeditor2'].getData();
        data.append('edit_content_fr', textarea1);
        data.append('edit_content_en', textarea2);
        var method = $('#method').val();
        data.append('_method', method);

        $.ajax({
          type : "POST",
          url : "{{ route('update-event',app()->getLocale()) }}?event="+event_id,
          data: data,
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success:function(response){
              if(response.status == 400){
              $('#updateform_errList').html("");
              $('#updateform_errList').addClass("alert alert-danger");
              $.each(response.errors, function(key, err_values){
                $('#updateform_errList').append('<li>'+err_values+'</li>');
              });
            }else if(response.status == 404){
              $('#updateform_errList').html('');
              $('.update').text('update');
            }else{
              $('.update').text('updating');
              $('#updateform_errList').html('');
              $('#myEditModal').modal('hide');
              $('#edit_title_en').val('');
              $('#edit_title_fr').val('');
              $('#edit_cover').val('');
              CKEDITOR.instances['edit_summary-ckeditor'].setData('');
              CKEDITOR.instances['edit_summary-ckeditor2'].setData('');

              //display success messages
              $('#the_message').html('');
              $('#success_message').hide();
              $('#success_message').show();
              setTimeout(function(){
                  $('#success_message').fadeOut('slow');
              },5000);
              $('#the_message').append(response.success);

              fetchevents();
            }

          }
        });
      });

      //delete ref
      $(document).on('click', '.del_ref', function(e){
        //e.preventDefault();
        var event_id = $(this).val();
        $('#del_event_id').val(event_id);

        $('#verticalycentered').on('click', '.proceed', function(e){
          e.preventDefault();

          var event_id = $('#del_event_id').val();
          console.log(event_id);

          $.ajax({
            type : "GET",
            url : "{{ route('destroy-event',app()->getLocale()) }}?event="+event_id,
            dataType : "JSON",
            success:function(response){
              //console.log(response);
              if(response.status == 404){
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-danger');
                $('#success_message').text(response.message);
              }else{
                $('#del_event_id').val(event_id);
                $('#verticalycentered').modal('hide');

                $('#the_message').html('');
                $('#success_message').show();
                setTimeout(function(){
                    $('#success_message').fadeOut('slow');
                },5000);
                $('#the_message').append(response.message);
                fetchevents();
              }
            }
          });

        });
      });
  });
</script>
@endsection
