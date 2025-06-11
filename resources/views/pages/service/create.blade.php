<form action="{{ route('service.store') }}" method="POST" id="myForm" enctype="multipart/form-data">
    @csrf
    @include('pages.service.form')            
  </form>
  <div id="response_container"></div>
  