@extends('shares.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('shares.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
              <label for="judul">Judul:</label>
              <input type="text" class="form-control" name="judul"/>
          </div>
          <div class="form-group">
              <label for="penerbit">Penerbit :</label>
              <input type="text" class="form-control" name="penerbit"/>
          </div>
          <div class="form-group">
              <label for="tahun_terbit">Tahun Terbit:</label>
              <input type="text" class="form-control" name="tahun_terbit"/>
          </div>
          <div class="form-group">
              <label for="pengarang">Pengarang:</label>
              <input type="text" class="form-control" name="pengarang"/>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection