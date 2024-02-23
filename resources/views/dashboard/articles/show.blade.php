@extends('layouts.dash')

@section('content')
<div class="row">
    <div class="card col-md-7" style="margin-right: 4rem;">
        <div class="card-body">
            <h5 class="card-title title">{{ $article->title_en }} / {{ $article->title_fr }}</h5>

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
                  <hr/>

                  <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                        <div style="background-image: url('/images/articles/cover/{{ $article->cover }}'); background-color: grey; height: 200px; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                        <hr>
                            <div style="display:flex;">
                                <div style="padding-right: 3rem; text-align: center;"><a href=""><i class="bi bi-eye"></i></a><br>323</div>
                                <div style="padding-right: 3rem; text-align: center;"><a href=""><i class="bi bi-hand-thumbs-up-fill"></i></a><br>10</div>
                                <div style="padding-right: 3rem; text-align: center;"><a href=""><i class="bi bi-chat-right-text"></i></a><br>08</div>
                                <div style="padding-left: 5rem; text-align: center;"><a href=""><i class="bi bi-calendar-date"></i></a><br>{{ $article->created_at }}</div>
                            </div>
                        <hr/>
                        <div style="margin-right: 2rem;">{!! $article->content_en !!}</div><hr/>
                        <div style="margin-right: 2rem;">{!! $article->references !!}</div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div style="background-image: url('/images/articles/cover/{{ $article->cover }}'); background-color: grey; height: 200px; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                        <hr><div style="margin-right: 2rem;">{!! $article->content_fr !!}</div><hr/>
                        <div style="margin-right: 2rem;">{!! $article->references !!}</div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab">
                      <div style="border-bottom:1px solid grey; padding: 1rem;">
                          <h3>Actions</h3>
                          <button type="button" value="{{ $article->id }}" data-bs-toggle="modal" data-bs-target="#myEditModal" class="btn btn-warning edit_ref"><i class="bi bi-pencil-square"></i></button>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" value="{{ $article->id }}" class="btn btn-danger del_ref"><i class="bi bi-trash"></i></button>
                      </div>
                      <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title"style="color: red;"><i class="bi bi-exclamation-diamond"></i> Supprimer l'article?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Toutes les donnees relatives a l'article seront perdues. Continuer?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                              <a href="{{ route('delete-article', [app()->getLocale(), compact('article')]) }}" class="btn btn-danger">Supprimer</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                <!--div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div style="background-image: url('/images/articles/cover/{{ $article->cover }}'); background-color: grey; height: 200px; width: 95%; background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                        <hr><div style="margin-right: 2rem;">{!! $article->content_en !!}</div><hr/>
                        <div style="margin-right: 2rem;">{!! $article->references !!}</div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                </div--->
            </div>
            <!-- End Vertical Pills Tabs -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">STATS</div>
            <div class="card-body">
                <h5 class="card-title">Card with header and footer</h5>

                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
                <label>Number of reads </label>

                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> - 50%</div>
                </div>
                <label>Number of Likes </label>

                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                </div>
                <label>Number of Shares </label>

                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                </div>
                <label>Number of comments </label>
            </div>

            <div class="card-footer" style="border-top: 5px solid rgba(0,0,0,.100);">
                Tags
            </div><hr>

            <div class="card-body">
                <span class="badge bg-primary">Primary</span>
                <span class="badge bg-secondary">Secondary</span>
                <span class="badge bg-success">Success</span>
                <span class="badge bg-danger">Danger</span>
                <span class="badge bg-warning text-dark">Warning</span>
                <span class="badge bg-info text-dark">Info</span>
                <span class="badge bg-light text-dark">Light</span>
                <span class="badge bg-dark">Dark</span>
            </div>

            <div class="card-footer" style="border-top: 5px solid rgba(0,0,0,.100);">
                Files
            </div><hr>
            <div class="card-body">
                <table>
                    <tr>
                        <td>
                            <i class="bi bi-file-earmark-pdf-fill" style="color:red; font-size: 3rem;"></i>
                        </td>
                        <td>
                            Name de PDF file
                        </td>
                    </tr>
                </table>
            </div>

        </div><!-- End Card with header and footer -->
    </div>
</div>



<!-- edit article modal -->
<div class="modal fade" id="myEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">EDIT ARTICLE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="text-align: center; font-size: 2rem;" id="title">EDIT ARTICLE</h5>
                <hr/>

                <!-- Register new article -->
                <div id="updateform_errList"></div>
                <div id="update_message"></div>

                <form class="row g-3" enctype="multipart/form-data" id="articleUpdater">
                  {{ csrf_field() }}

                  <input type="text" id="edit_article_id" hidden>
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
                    <div class="col-md-12">
                      <div class="">
                        <label for="edit_cover">Image de Couverture</label>
                        <input type="file" class="form-control" id="edit_cover" accept="image/png, image/gif, image/jpeg, image/jpg" name="edit_cover"/>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingEmail" placeholder="Author" value="{{ Auth::User()->name }}" readonly>
                        <label for="floatingEmail">Author (field is autocompleted)</label>
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
  <!-- end edit article modal -->


@endsection

@section('scripts')
<script>
  $(document).ready(function(){

      //edit ref
      //loads the modal with all series's info to edit
      $(document).on('click', '.edit_ref', function(e){
        e.preventDefault();
        $('.update').text('update');
        var article_id = $(this).val();
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
          url : "{{ route('edit-article', app()->getLocale()) }}?article="+article_id,
          dataType : "JSON",
          success:function(response){
            //console.log(reponse);
            if(response.status == 404){
              $('#success_message').html("");
              $('#success_message').addClass('alert alert-danger');
              $('#success_message').text(response.message);
            }else{
              $('.update').text('update');
              $('#edit_article_id').val(article_id);
              $('#edit_title_fr').val(response.article.title_fr);
              $('#edit_title_en').val(response.article.title_en);
              CKEDITOR.instances['edit_summary-ckeditor'].setData(response.article.content_fr);
              CKEDITOR.instances['edit_summary-ckeditor2'].setData(response.article.content_en);
            }
          }
        });
      });


      //update ref
      $('#articleUpdater').on('click', '.update', function(e){
        e.preventDefault();
        var article_id = $('#edit_article_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = new FormData(document.getElementById("articleUpdater"));
        var textarea1 = CKEDITOR.instances['edit_summary-ckeditor'].getData();
        var textarea2 = CKEDITOR.instances['edit_summary-ckeditor2'].getData();
        data.append('edit_content_fr', textarea1);
        data.append('edit_content_en', textarea2);
        var method = $('#method').val();
        data.append('_method', method);

        $.ajax({
          type : "POST",
          url : "{{ route('update-article', app()->getLocale()) }}?article="+article_id,
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
            }

          }
        });
      });
  });
</script>
@endsection
