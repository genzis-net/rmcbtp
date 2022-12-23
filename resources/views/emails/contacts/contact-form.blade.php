@component('mail::message')

<style>
    .subject{
        text-align: left; 
        border: none; 
        background-color: #F1EDF2; 
        border-radius: 5px; 
        padding-top: 1rem; 
        padding-bottom: 1rem;
        padding-left:1rem;
        padding-right:1rem;
    }
    
    .button{
        background-color: #57aff3;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: auto;
    }
</style>

<p style="color: grey; text-align: center; margin-bottom: 3rem;">#New Message - Contact Page RMC-BTP</p>


<p>
    <strong>From:</strong> {{ $data['name'] }}<br>
    <strong>Address : </strong>{{ $data['email'] }} <br>
    <strong>Phone : </strong>{{ $data['phone'] }}<br>
</p>
<p class="subject">
    <strong>Subjet : </strong>{{ $data['subject'] }}
</p>

{{ $data['message'] }}


<p style = "text-align: center; margin-top: 3rem;">
    <a href="mailto:{{ $data['email'] }}?subject=Re:{{ $data['subject'] }}" class="button">Envoyer une reponse</a>
</p>
@endcomponent
