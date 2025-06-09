<form action="{{ route('appointment.store') }}" method="POST" id="myForm">
  @csrf
  @include('pages.appointment.form')            
</form>
<div id="response_container"></div>
