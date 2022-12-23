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
            <h5 class="card-title" style="text-align: center; font-size: 2rem;">MES CAMPAGNES</h5>
            <p></p>
            <hr/>
            <a href="{{ route('newsletter') }}" class="btn btn-primary">Nouvel Campagne</a>
            <hr/>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Objet</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody id="tbody">
                  @foreach ($campaigns as $campaign )
                      <tr>
                            <td></td>
                            <td>{{ $campaign->object }}</td>
                            <td><button type="button" value="{{ $campaign->id }}" data-bs-toggle="modal" data-bs-target="#myEditModal" class="btn btn-info edit_ref"><i class="bi bi-eye"></i></button></td>
                      </tr>

                  @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
</section>

<!-- edit ref modal -->
<div class="modal fade" id="myEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">VOTRE CAMPAGNE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="text-align: center; font-size: 2rem;" id="title">VOTRE CAMPAGNE</h5>
                <hr/>
                <h3>Object: <span id="object"> </span></h3>
                <hr>
                <p>A: Tous vos contacts</p>
                <hr>
                <div id="content"></div>
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
  $(document).ready(function(){

      //edit ref
      //loads the modal with all series's info to edit
      $(document).on('click', '.edit_ref', function(e){
        e.preventDefault();
        var ref_id = $(this).val();
        $('#myEditModal').show('');

        $.ajax({
          type : "GET", 
          url : "{{ route('view-campaign') }}?campaign="+ref_id, 
          dataType : "JSON", 
          success:function(response){
            //console.log(reponse);
            if(response.status == 404){
              $('#success_message').html("");
              $('#success_message').addClass('alert alert-danger');
              $('#success_message').text(response.message);
            }else{
              $('#object').html(response.campaign.object);
              $('#content').html(response.campaign.content);
            }
          }
        });
      });
  });
</script>
@endsection