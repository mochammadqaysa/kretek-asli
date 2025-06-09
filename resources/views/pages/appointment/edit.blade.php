<form action="{{ route('appointment.update', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.appointment.form')            
  </form>
  <div id="response_container"></div>