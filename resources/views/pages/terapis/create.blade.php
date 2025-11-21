<form action="{{ route('terapis.store') }}" method="POST" id="myForm" enctype="multipart/form-data">
    @csrf
    @include('pages.terapis.form')            
  </form>
  <div id="response_container"></div>
  