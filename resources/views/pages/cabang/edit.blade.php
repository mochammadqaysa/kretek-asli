<form action="{{ route('cabang.update', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.cabang.form')            
  </form>
  <div id="response_container"></div>