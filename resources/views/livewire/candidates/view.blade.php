@section('title', __('Candidates'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card admin-card">
				<div class="card-header admin-card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								<i class="fas fa-user-graduate text-info"></i> Candidaturas
							</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar candidaturas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
							<i class="fa fa-plus"></i> Añadir candidatura
						</div>
					</div>
				</div>
				
				<div class="card-body admin-card-body">
						@include('livewire.candidates.create')
						@include('livewire.candidates.update')
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr> 
									<th>#</th> 
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Fecha de nacimiento</th>
									<th>Nacionalidad</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Fecha de registro</th>
									<th>Cuenta de usuario</th>
									<th>Puntos</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($candidates as $row)
								<tr>
									<td>{{ $row->id }}</td> 
									<td>{{ $row->name }}</td> 
									<td>{{ $row->surname }}</td>
									<td>{{ $row->birth_date }}</td>
									<td>{{ $row->nationality }}</td>
									<td>{{ $row->email }}</td> 
									<td>{{ $row->phone }}</td> 
									<td>{{ $row->register_date }}</td>   
									<td>{{ $row->user_account }}</td>
									<td>{{ $row->points }}</td>
									<td>{{ $row->description }}</td>
									<td>{{ $row->selected }}</td>
									<td width="90">
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Acciones
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
											<a class="dropdown-item" onclick="confirm('¿Confirmas que quieres borrar la candidatura con id {{$row->id}}? \n¡Esta acción no se puede deshacer!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
										</div>
									</div>
									</td>
								@endforeach
							</tbody>
						</table>						
						{{ $candidates->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
