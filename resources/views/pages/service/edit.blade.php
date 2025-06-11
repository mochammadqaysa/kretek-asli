<form action="{{ route('service.update', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.service.form')            
  </form>
  <div id="response_container"></div>