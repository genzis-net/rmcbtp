@extends('layouts.dash')

@section('content')

<div class="alert alert-success alert-dismissible fade show the-message" role="alert" id="success_message">
  <i class="bi bi-check-circle me-1"></i>
    <span id="the_message"></span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="row">
    <div class="card col-md-12" style="margin-right: 4rem;">
        <div class="card-body">
            <h2 class="title" style="margin-top: 1.5rem; margin-bottom: 1.5rem; color: blue; ">{{ $ref->title_en }} / {{ $ref->title_fr }} - {{ $ref->year }} - {{ $ref->location }} - {{ $ref->client }} - {{ $ref->project_type }}</h2>

            <!-- Pills Tabs -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">EN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">FR</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Stats & More</button>
                </li>
            </ul>
            <hr />

            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                    <div style="background-image: url('/images/achievements/{{ $ref->title_en }}/{{ $ref->images[0]->src }}'); background-color: grey; height: 200px; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                    <hr />
                    <div style="margin-right: 2rem;">{!! $ref->content_en !!}</div>
                    <hr />
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div style="background-image: url('/images/achievements/{{ $ref->title_en }}/{{ $ref->images[0]->src }}'); background-color: grey; height: 200px; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                    <hr>
                    <div style="margin-right: 2rem;">{!! $ref->content_fr !!}</div>
                    <hr />
                    <div style="margin-right: 2rem;">{!! $ref->references !!}</div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div style="border-bottom:1px solid grey; padding: 1rem;">
                        <h3>Actions</h3>
                        <button type="button" value="{{ $ref->id }}" data-bs-toggle="modal" data-bs-target="#myEditModal" class="btn btn-warning edit_ref"><i class="bi bi-pencil-square"></i></button>
                    </div>

                    <div class="row">
                        <div class="card col-md-12" style="margin-right: 4rem;">
                            <div class="card-body">
                                <h5 class="card-title title">{{ $ref->title_en }} ({{ $ref->images->count() }} images)</h5>
                                <hr />

                                <div class="tab-content pt-2" id="myTabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                                        <div style="margin-right: 2rem;" class="row">
                                            @foreach ($ref->images as $image)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div style="background-image: url('/images/achievements/{{ $ref->title_en }}/{{ $image->src }}'); background-color: grey; height: 200px; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="card-body" style="text-align: right">
                                                        <hr>
                                                        <button type="button" class="btn btn-danger del_img" data-bs-toggle="modal" data-bs-target="#verticalycentered2" value="{{ $image->id }}"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                                <!-- End Vertical Pills Tabs -->
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="verticalycentered2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: red;"><i class="bi bi-exclamation-diamond"></i> Supprimer l'image?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Continuer?
                                </div>
                                <input type="text" id="del_img_id" hidden>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-danger proceed">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Vertical Pills Tabs -->
        </div>
    </div>
</div>



<!-- edit ref modal -->
<div class="modal fade" id="myEditModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDITER REALISATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: 2rem;" id="title">EDIT ref</h5>
              <hr/>
  
              <div id="updateform_errList"></div>
              <div id="update_message"></div>
  
              <form class="row g-3" enctype="multipart/form-data" id="refUpdater">
                {{ csrf_field() }}

                <input type="text" id="edit_img_id" hidden>
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
                  
                  
                <div class="col-md-4">
                  <div class="">
                    <label for="floatingName">Add Images (must be less than 300kb each)</label>
                    <input type="file" class="form-control" id="floatingName" accept="image/png, image/gif, image/jpeg, image/jpg" multiple="multiple" name="edit_image[]"/>                 
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
                      <input type="text" class="form-control" id="edit_client" placeholder="Author" name="edit_client">
                      <label for="edit_client">Client</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-control" name="edit_project_type" id="edit_selectproject_type">
                        <option id="Construction">Construction</option>
                        <option id="Consulting">Consulting</option>
                        <option id="Interior">Interior</option>
                        <option id="Renovations">Renovations</option>
                        <option id="Architecture">Architecture</option>
                      </select>
                      <label for="project_type">Type de projet</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="edit_location" placeholder="Author" name="edit_location">
                      <label for="edit_location">Lieu</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                    <select class="form-control" name="edit_year" id="edit_selectyear">
                    <?php 
                      $i=2015; 
                      $year = date("Y"); 
                    ?>
                    @while($i<=$year)
                          <option id="{{ $i }}">{{ $i }}</option>
                          <?php 
                            $i++; 
                          ?>
                    @endwhile
                    </select>
                      <label for="edit_date">Realiser le annee:</label>
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
<!-- end edit ref modal -->


@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        //edit ref
      //loads the modal with all series's info to edit
      $(document).on('click', '.edit_ref', function(e){
        e.preventDefault();
        $('.update').text('update');
        var img_id = $(this).val();
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
          url : "{{ route('edit-ref') }}?ref="+img_id, 
          dataType : "JSON", 
          success:function(response){
            //console.log(reponse);
            if(response.status == 404){
              $('#success_message').html("");
              $('#success_message').addClass('alert alert-danger');
              $('#success_message').text(response.message);
            }else{
              $('.update').text('update');
              $('#edit_img_id').val(img_id);
              $('#edit_title_fr').val(response.ref.title_fr);
              $('#edit_title_en').val(response.ref.title_en);
              $('#edit_location').val(response.ref.location);
              yearid = '#'+response.ref.year;
              //console.log(yearid);
              $(yearid).attr("selected","selected");
              project='#'+response.ref.project_type;
              $(project).attr("selected","selected");
              $('#edit_client').val(response.ref.client);
              CKEDITOR.instances['edit_summary-ckeditor'].setData(response.ref.content_fr);
              CKEDITOR.instances['edit_summary-ckeditor2'].setData(response.ref.content_en);
            }
          }
        });
      });


      //update ref
      $('#refUpdater').on('click', '.update', function(e){
        e.preventDefault();
        var img_id = $('#edit_img_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var data = new FormData(document.getElementById("refUpdater"));
        var textarea1 = CKEDITOR.instances['edit_summary-ckeditor'].getData();
        var textarea2 = CKEDITOR.instances['edit_summary-ckeditor2'].getData();
        data.append('edit_content_fr', textarea1);
        data.append('edit_content_en', textarea2);
        var method = $('#method').val();
        data.append('_method', method);   
    
        $.ajax({
          type : "POST", 
          url : "{{ route('update-ref') }}?ref="+img_id,
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

              fetchrefs();
            }

          }
        });
      });

      //delete image
      $(document).on('click', '.del_img', function(e){
        //e.preventDefault();
        var img_id = $(this).val();
        $('#del_img_id').val(img_id);
        
        $('#verticalycentered2').on('click', '.proceed', function(e){
          e.preventDefault();

          var img_id = $('#del_img_id').val();
          console.log(img_id);

          $.ajax({
            type : "GET", 
            url : "{{ route('destroy-image')}}?image="+img_id, 
            dataType : "JSON", 
            success:function(response){
              //console.log(response);
              if(response.status == 404){
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-danger');
                $('#success_message').text(response.message);
              }else{
                $('#del_img_id').val(img_id);
                $('#verticalycentered2').modal('hide');

                $('#the_message').html('');
                $('#success_message').show();
                setTimeout(function(){
                    $('#success_message').fadeOut('slow');
                },5000);
                $('#the_message').append(response.message);
                
              }
            }
          });

        });
      });

      $(document).ajaxStop(function(){
        window.location.reload();
      });
    });

</script>
@endsection
