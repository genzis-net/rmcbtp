@extends('layouts.dash')

@section('content')
    <div class="row">
        <div class="card col-md-12" style="margin-right: 4rem;">
            <div class="card-body">
                <h5 class="card-title title">{{ $album->name }} ({{ $album->images->count() }} images)</h5>

                <!-- Pills Tabs -->
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">EN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">FR</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Stats & More</button>
                    </li>
                </ul>
                <hr />

                <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                        <div style="display:flex;">
                            <!--div style="padding-right: 3rem; text-align: center;"><a href=""><i
                                        class="bi bi-eye"></i></a><br>323</!--div>
                            <div style="padding-right: 3rem; text-align: center;"><a href=""><i
                                        class="bi bi-hand-thumbs-up-fill"></i></a><br>10</div>
                            <div-- style="padding-right: 3rem; text-align: center;"><a href=""><i
                                        class="bi bi-chat-right-text"></i></a><br>08</div-->
                            <div style="padding-left: 5rem; padding-right: 3rem;text-align: center;"><a href=""><i
                                        class="bi bi-calendar-date"></i></a><br>{{ $album->created_at }}</div>
                            <button type="button" value="{{ $album->id }}" data-bs-toggle="modal"
                                data-bs-target="#ExtralargeModal" class="btn btn-warning"><i
                                    class="bi bi-plus"></i></button>
                            <!--button style="margin-left: 5rem" type="button" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered" value="{{ $album->id }}"
                                class="btn btn-danger del_album"><i class="bi bi-trash"></i></!--button-->
                        </div>
                        <hr />
                        <div style="margin-right: 2rem;" class="row">
                            @foreach ($album->images as $image)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div
                                            style="background-image: url('/images/albums/{{ $album->name }}/{{ $image->src }}'); background-color: grey; height: 300px; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="card-body" style="text-align: right">
                                            <hr>
                                            <button type="button" class="btn btn-info"><i
                                                    class="bi bi-eye">EN revision</i></button>
                                            <button type="button" class="btn btn-danger del_ref" data-bs-toggle="modal"
                                                data-bs-target="#verticalycentered" value="{{ $album->id }}"><i
                                                    class="bi bi-trash">en revision</i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr />
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="modal fade" id="verticalycentered" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color: red;"><i
                                                class="bi bi-exclamation-diamond"></i> Supprimer l'image?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Toutes les donnees relatives seront perdues. Continuer?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <a href="{{ route('destroy-album', compact('album')) }}"
                                            class="btn btn-danger">Supprimer</a>
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


    <!-- create Modal -->
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter des images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="saveform_errList"></div>
                    <form class="row g-3" enctype="multipart/form-data" id="albumhandler">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="name"
                                    value="{{ $album->name }}" readonly>
                                <label for="name">Nom de l'album</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="id" placeholder="Your Name" name="album_id"
                                    value="{{ $album->id }}" hidden>

                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label style="color: red;">Ajout des Images</label>
                                <input type="file" class="form-control" name="image[]" multiple="multiple"
                                    accept="image/png, image/gif, image/jpeg, image/jpg">
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //saves new ref
            $('#albumhandler').on('click', '.valid', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = new FormData(document.getElementById("albumhandler"));
                $.ajax({
                    type: "POST",
                    url: "{{ route('update-album') }}",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 400) {
                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass("alert alert-danger");
                            $.each(response.errors, function(key, err_values) {
                                $('#saveform_errList').append('<li>' + err_values +
                                    '</li>');
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
                            $('#albumhandler').find('input').val('');
                            location.reload();
                        }
                    }
                });
            });

            //delete ref
            $(document).on('click', '.del_ref', function(e) {
                //e.pralbumDefault();
                var album_id = $(this).val();
                $('#del_album_id').val(album_id);

                $('#verticalycentered').on('click', '.proceed', function(e) {
                    e.preventDefault();

                    var album_id = $('#del_album_id').val();

                    $.ajax({
                        type: "GET",
                        url: "{{ route('destroy-image') }}?image=" + image_id,
                        dataType: "JSON",
                        success: function(response) {
                            //console.log(response);
                            if (response.status == 404) {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#del_album_id').val(album_id);
                                $('#verticalycentered').modal('hide');

                                $('#the_message').html('');
                                $('#success_message').show();
                                setTimeout(function() {
                                    $('#success_message').fadeOut('slow');
                                }, 5000);
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
