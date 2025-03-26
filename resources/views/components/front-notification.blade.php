@if (session()->has('smsg'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('smsg') }}
  </div>
@endif
@if (session()->has('emsg'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session()->get('emsg') }}
  </div>
@endif
