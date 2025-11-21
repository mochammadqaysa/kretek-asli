<form action="{{ route('cabang.store') }}" method="POST" id="myForm" enctype="multipart/form-data">
    @csrf
    @include('pages.cabang.form')            
  </form>
  <div id="response_container"></div>
  