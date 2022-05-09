@extends('layouts.app')

@section('template_title')
    horario
@endsection


@section('content')

<div class="container-fluid" style="">
    <div id="horario" style="width:60%; margin: 2% 20%">
        
    </div>

    
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMateria">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="agregarMateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection