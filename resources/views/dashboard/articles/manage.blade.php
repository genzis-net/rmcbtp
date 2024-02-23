@extends('layouts.dash')

@section('page-head')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
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
                        <h5 class="card-title" style="text-align: center; font-size: 2rem;">PUBLICATIONS - BLOG</h5>
                        <p></p>
                        <hr/>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ExtralargeModal">Nouvel Article
                        </button>
                        <hr/>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">publie le</th>
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
                    <h5 class="modal-title">Nouvel Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="saveform_errList"></div>
                    <form class="row g-3" enctype="multipart/form-data" id="articlehandler">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName_fr" placeholder="Your Name"
                                       name="title_fr">
                                <label for="floatingName_fr">Titre (fr)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName_en" placeholder="Your Name"
                                       name="title_en">
                                <label for="floatingName_en">Titre (en)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="floatingName">Image de Couverture</label>
                                <input type="file" class="form-control" id="floatingName"
                                       accept="image/png, image/gif, image/jpeg, image/jpg" name="cover"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="floatingName">Document</label>
                                <input type="file" class="form-control" id="floatingName" accept="*" name="document"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingEmail" placeholder="Author"
                                       value="{{ Auth::User()->name }}" readonly>
                                <label for="floatingEmail">Author (field is autocompleted)</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label style="color: red;">Contenu (fr)</label>
                                <textarea class="form-control" placeholder="Address" id="summary-ckeditor"
                                          name="content_fr"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <label style="color: red;">Contenu (en)</label>
                                <textarea class="form-control" placeholder="Address" id="summary-ckeditor2"
                                          name="content_en"></textarea>
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
                                <h5 class="card-title" style="text-align: center; font-size: 2rem;" id="title">EDIT
                                    ARTICLE</h5>
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
                                            <input type="text" class="form-control" id="edit_title_fr"
                                                   placeholder="Your Name" name="edit_title_fr">
                                            <label for="edit_title_fr">Titre (fr)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="edit_title_en"
                                                   placeholder="Your Name" name="edit_title_en">
                                            <label for="edit_title_en">Titre (en)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <label for="edit_cover">Image de Couverture</label>
                                            <input type="file" class="form-control" id="edit_cover"
                                                   accept="image/png, image/gif, image/jpeg, image/jpg"
                                                   name="edit_cover"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingEmail"
                                                   placeholder="Author" value="{{ Auth::User()->name }}" readonly>
                                            <label for="floatingEmail">Author (field is autocompleted)</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div>
                                            <label style="color: red;">Contenu (fr)</label>
                                            <textarea class="form-control" placeholder="Address"
                                                      id="edit_summary-ckeditor" name="edit_content_fr"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <label style="color: red;">Contenu (en)</label>
                                            <textarea class="form-control" placeholder="Address"
                                                      id="edit_summary-ckeditor2" name="edit_content_en"></textarea>
                                        </div>
                                    </div>

                                    <div style="text-align: right" class="modal-footer">
                                        <button type="submit" class="btn btn-primary update">Update</button>
                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"
                                                id="close_edit">Cancel
                                        </button>
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


    <!-- delete modal -->
    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;"><i class="bi bi-exclamation-diamond"></i> Supprimer
                        l'article?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Toutes les donnees relatives a l'article seront perdues. Continuer?
                </div>

                <input type="text" id="del_article_id" hidden>

                <div class="modal-footer">
                    <button type="button" id="cancel_del" class="btn btn-secondary" data-bs-dismiss="modal">Annuler
                    </button>
                    <button type="button" class="btn btn-danger proceed">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end delete modal -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            fetchArticles();

            //fetch all achievements in database and displays in table body
            function fetchArticles() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('fetch-articles', app()->getLocale()) }}",
                    dataType: "JSON",
                    "dataSrc": "tableData",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        $('#tbody').html("");
                        let i = 1;
                        $.each(response.articles, function (key, item) {
                            $('#tbody').append(
                                '<tr>\
                                  <th scope="row">' + i + '</th>\
                  <td><img src="/images/articles/cover/' + item.cover + '" style="width: 100px;"></td>\
                  <td>' + item.title_fr + '</td>\
                  <td>' + item.user_id + '</td>\
                  <td>' + item.created_at + '</td>\
                  <td style="color: aliceblue">\
                    <a href="/show-article?article=' + item.id + '" value="' + item.id + '" class="btn btn-info show_ref"><i class="bi bi-eye"></i></a>\
                    <button type="button" value="' + item.id + '" data-bs-toggle="modal" data-bs-target="#myEditModal" class="btn btn-warning edit_ref"><i class="bi bi-pencil-square"></i></button>\
                    <button type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" value="' + item.id + '" class="btn btn-danger del_ref"><i class="bi bi-trash"></i></button>\
                  </td>\
                </tr>'
                            );
                            i++;
                        });
                    }
                });
            }


            //saves new ref
            $('#articlehandler').on('click', '.valid', function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = new FormData(document.getElementById("articlehandler"));
                var textarea1 = CKEDITOR.instances['summary-ckeditor'].getData();
                var textarea2 = CKEDITOR.instances['summary-ckeditor2'].getData();
                data.append('content_fr', textarea1);
                data.append('content_en', textarea2);
                $.ajax({
                    type: "POST",
                    url: "{{ route('save-article', app()->getLocale()) }}",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        //console.log(response);
                        if (response.status == 400) {
                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass("alert alert-danger");
                            $.each(response.errors, function (key, err_values) {
                                $('#saveform_errList').append('<li>' + err_values + '</li>');
                            });
                        } else {
                            $('#the_message').html('');
                            $('#saveform_errList').html('');
                            $('#success_message').show();
                            setTimeout(function () {
                                $('#success_message').fadeOut('slow');
                            }, 5000);
                            $('#the_message').append(response.success);
                            $('#ExtralargeModal').modal('hide');
                            $('#articlehandler').find('input').val('');
                            CKEDITOR.instances['summary-ckeditor'].setData('');
                            CKEDITOR.instances['summary-ckeditor2'].setData('');
                            fetchArticles();
                        }
                    }
                });
            });


            //edit ref
            //loads the modal with all series's info to edit
            $(document).on('click', '.edit_ref', function (e) {
                e.preventDefault();
                $('.update').text('update');
                var article_id = $(this).val();
                $('#myEditModal').show('');
                $(document).on('click', '#close_edit', function (e) {
                    e.preventDefault();
                    $('.update').text('update');
                    $('#myEditModal').find('input').val('');
                    $('#myEditModal').find('textarea').val('');
                    $('#myEditModal').hide('');
                });

                $.ajax({
                    type: "GET",
                    url: "{{ route('edit-article', app()->getLocale()) }}?article=" + article_id,
                    dataType: "JSON",
                    success: function (response) {
                        //console.log(reponse);
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        } else {
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
            $('#articleUpdater').on('click', '.update', function (e) {
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
                    type: "POST",
                    url: "{{ route('update-article', app()->getLocale()) }}?article=" + article_id,
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == 400) {
                            $('#updateform_errList').html("");
                            $('#updateform_errList').addClass("alert alert-danger");
                            $.each(response.errors, function (key, err_values) {
                                $('#updateform_errList').append('<li>' + err_values + '</li>');
                            });
                        } else if (response.status == 404) {
                            $('#updateform_errList').html('');
                            $('.update').text('update');
                        } else {
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
                            setTimeout(function () {
                                $('#success_message').fadeOut('slow');
                            }, 5000);
                            $('#the_message').append(response.success);

                            fetchArticles();
                        }

                    }
                });
            });

            //delete ref
            $(document).on('click', '.del_ref', function (e) {
                //e.preventDefault();
                var article_id = $(this).val();
                $('#del_article_id').val(article_id);

                $('#verticalycentered').on('click', '.proceed', function (e) {
                    e.preventDefault();

                    var article_id = $('#del_article_id').val();
                    console.log(article_id);

                    $.ajax({
                        type: "GET",
                        url: "{{ route('destroy-article', app()->getLocale()) }}?article=" + article_id,
                        dataType: "JSON",
                        success: function (response) {
                            //console.log(response);
                            if (response.status == 404) {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#del_article_id').val(article_id);
                                $('#verticalycentered').modal('hide');

                                $('#the_message').html('');
                                $('#success_message').show();
                                setTimeout(function () {
                                    $('#success_message').fadeOut('slow');
                                }, 5000);
                                $('#the_message').append(response.message);
                                fetchArticles();
                            }
                        }
                    });

                });
            });
        });
    </script>
@endsection
