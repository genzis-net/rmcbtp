@extends('layouts.dash')

@section('page-head')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home', ['language' => app()->getLocale()]) }}">Home</a></li>
            <li class="breadcrumb-item active">References Management</li>
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
                    <h5 class="card-title" style="text-align: center; font-size: 2rem;">PUBLICATIONS - ARCHITECTURES</h5>
                    <p></p>
                    <hr />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">Nouveaux PLANS</button>
                    <hr />
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
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
                <h5 class="modal-title">Nouveaux PLANS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="saveform_errList"></div>
                <form class="row g-3" enctype="multipart/form-data" id="refhandler">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName_fr" placeholder="Your Name" name="title_fr">
                            <label for="floatingName_fr">Titre (fr)</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName_en" placeholder="Your Name" name="title_en">
                            <label for="floatingName_en">Titre (en)</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <label for="floatingName">Images (must be less than 300kb each)</label>
                            <input type="file" class="form-control" id="floatingName" accept="image/png, image/gif, image/jpeg, image/jpg" multiple="multiple" name="image[]" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingEmail" placeholder="Price" value="10000000" name="price">
                            <label for="floatingEmail">Price (XAF)</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div>
                            <label style="color: red;">Description (fr)</label>
                            <textarea class="form-control" placeholder="Address" id="summary-ckeditor" name="content_fr"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <label style="color: red;">Description (en)</label>
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

<!-- edit ref modal -->
<div class="modal fade" id="myEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITER PLANS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center; font-size: 2rem;" id="title">EDIT ref</h5>
                            <hr />

                            <div id="updateform_errList"></div>
                            <div id="update_message"></div>

                            <form class="row g-3" enctype="multipart/form-data" id="refUpdater">
                                {{ csrf_field() }}

                                <input type="text" id="edit_ref_id" hidden>
                                <input type="hidden" name="_method" value="PUT" id="method" />

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="edit_title_fr" placeholder="Your Name" name="edit_title_fr">
                                        <label for="edit_title_fr">Titre (fr)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="edit_title_en" placeholder="Your Name" name="edit_title_en">
                                        <label for="edit_title_en">Titre (en)</label>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="">
                                        <label for="floatingName">Add Images (must be less than 300kb each)</label>
                                        <input type="file" class="form-control" id="floatingName" accept="image/png, image/gif, image/jpeg, image/jpg" multiple="multiple" name="edit_image[]" />
                                    </div>
                                </div>

                                <div class="col-md-6">
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
<!-- end edit ref modal -->


<!-- delete modal -->
<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red;"><i class="bi bi-exclamation-diamond"></i> Supprimer l'enregistrement?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Toutes les donnees relatives a l'enregistrement seront perdues. Continuer?
            </div>

            <input type="text" id="del_ref_id" hidden>

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
    $(document).ready(function() {
        $('#success_message').hide();
        fetchrefs();
        //fetch all achievements in database and displays in table body
        function fetchrefs() {
            $.ajax({
                type: "GET"
                , url: "{{ route('fetch-archi', app()->getLocale()) }}"
                , dataType: "JSON"
                , "dataSrc": "tableData"
                , contentType: false
                , cache: false
                , processData: false
                , success: function(response) {
                    console.log(response);
                    $('#tbody').html("");
                    let i = 1;
                    $.each(response.refs, function(key, item) {
                        $('#tbody').append(
                            '<tr>\
                  <th scope="row">' + i + '</th>\
                  <td>' + item.title.fr + '</td>\
                  <td style="color: aliceblue">\
                    <a href="/show-ref?ref=' + item.id + '" value="' + item.id + '" class="btn btn-info show_ref"><i class="bi bi-eye"></i></a>\
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
        $('#refhandler').on('click', '.valid', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var data = new FormData(document.getElementById("refhandler"));
            var textarea1 = CKEDITOR.instances['summary-ckeditor'].getData();
            var textarea2 = CKEDITOR.instances['summary-ckeditor2'].getData();
            data.append('content_fr', textarea1);
            data.append('content_en', textarea2);
            $.ajax({
                type: "POST"
                , url: "{{ route('architecture.store', app()->getLocale()) }}"
                , data: data
                , dataType: 'JSON'
                , contentType: false
                , cache: false
                , processData: false
                , success: function(response) {
                    //console.log(response);
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_values) {
                            $('#saveform_errList').append('<li>' + err_values + '</li>');
                        });
                    } else {
                        $('#the_message').html('');
                        $('#saveform_errList').html('');
                        $('#success_message').show();
                        setTimeout(function() {
                            $('#success_message').fadeOut('slow');
                        }, 5000);
                        $('#the_message').append(response.success);
                        $('#ExtralargeModal').modal('hide');
                        $('#refhandler').find('input').val('');
                        CKEDITOR.instances['summary-ckeditor'].setData('');
                        CKEDITOR.instances['summary-ckeditor2'].setData('');
                        fetchrefs();
                    }
                }
            });
        });


        //edit ref
        //loads the modal with all series's info to edit
        $(document).on('click', '.edit_ref', function(e) {
            e.preventDefault();
            $('.update').text('update');
            var ref_id = $(this).val();
            $('#myEditModal').show('');
            $(document).on('click', '#close_edit', function(e) {
                e.preventDefault();
                $('.update').text('update');
                $('#myEditModal').find('input').val('');
                $('#myEditModal').find('textarea').val('');
                $('#myEditModal').hide('');
            });

            $.ajax({
                type: "GET"
                , url: "{{ route('edit-ref', app()->getLocale()) }}?ref=" + ref_id
                , dataType: "JSON"
                , success: function(response) {
                    //console.log(reponse);
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    } else {
                        $('.update').text('update');
                        $('#edit_ref_id').val(ref_id);
                        $('#edit_title_fr').val(response.ref.title_fr);
                        $('#edit_title_en').val(response.ref.title_en);
                        $('#edit_location').val(response.ref.location);
                        yearid = '#' + response.ref.year;
                        //console.log(yearid);
                        $(yearid).attr("selected", "selected");
                        project = '#' + response.ref.project_type;
                        $(project).attr("selected", "selected");
                        $('#edit_client').val(response.ref.client);
                        CKEDITOR.instances['edit_summary-ckeditor'].setData(response.ref.content_fr);
                        CKEDITOR.instances['edit_summary-ckeditor2'].setData(response.ref.content_en);
                    }
                }
            });
        });


        //update ref
        $('#refUpdater').on('click', '.update', function(e) {
            e.preventDefault();
            var ref_id = $('#edit_ref_id').val();

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
                type: "POST"
                , url: "{{ route('update-ref', app()->getLocale()) }}?ref=" + ref_id
                , data: data
                , dataType: 'JSON'
                , contentType: false
                , cache: false
                , processData: false
                , success: function(response) {
                    if (response.status == 400) {
                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_values) {
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
                        setTimeout(function() {
                            $('#success_message').fadeOut('slow');
                        }, 5000);
                        $('#the_message').append(response.success);

                        fetchrefs();
                    }

                }
            });
        });

        //delete ref
        $(document).on('click', '.del_ref', function(e) {
            //e.preventDefault();
            var ref_id = $(this).val();
            $('#del_ref_id').val(ref_id);

            $('#verticalycentered').on('click', '.proceed', function(e) {
                e.preventDefault();

                var ref_id = $('#del_ref_id').val();
                console.log(ref_id);

                $.ajax({
                    type: "GET"
                    , url: "{{ route('delete-ref', app()->getLocale()) }}?ref=" + ref_id
                    , dataType: "JSON"
                    , success: function(response) {
                        //console.log(response);
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        } else {
                            $('#del_ref_id').val(ref_id);
                            $('#verticalycentered').modal('hide');

                            $('#the_message').html('');
                            $('#success_message').show();
                            setTimeout(function() {
                                $('#success_message').fadeOut('slow');
                            }, 5000);
                            $('#the_message').append(response.message);
                            fetchrefs();
                        }
                    }
                });

            });
        });
    });

</script>
@endsection
