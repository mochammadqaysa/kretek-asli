<form action="{{ route('terapis.update', $data->uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.terapis.form')            
  </form>
  <div id="response_container"></div>