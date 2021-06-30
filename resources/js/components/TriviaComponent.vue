<template>
    <div class="container-fluid">
    	<div class="row">
    	<div class="col-sm-6 col-12">
    		<div class="card">
			  <div class="card-body">
			    	<div class="row">
			    		<h5>Crear Pregunta</h5>
			    	</div>
			    	<div class="row">
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Pregunta</label>
			    			 <input type="text" class="form-control">
			    		</div>
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Numero Trivia</label>
			    			 <input type="number" class="form-control">
			    		</div>
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Fecha de Publicación</label>
			    			 <input type="datetime-local" class="form-control">
			    		</div>
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Fecha de terminación</label>
			    			 <input type="datetime-local" class="form-control">
			    		</div>
			    	</div>
			    	<div class="row">
			    		<button class="btn btn-primary">Guardar</button>
			    	</div>
			  </div>
			</div>
    	</div>
    	<div class="col-sm-6 col-12">
    		<div class="card">
			  <div class="card-body">
			    	<div class="row">
			    		<h5>Crear Opciones</h5>
			    	</div>
			    	<div class="row">
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Pregunta</label>
			    			 <select class="form-control">
			    			 	<option value="">Seleccionar</option>
			    			 </select>
			    		</div>
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Nombre de Opcion</label>
			    			 <input type="text" class="form-control">
			    		</div>
			    		<div class="mb-3">
			    			 <label for="pregunta" class="form-label">Criterio</label>
			    			 <select class="form-control">
			    			 	<option value="">Seleccionar</option>
			    			 	<option value="1">Respuesta Correcta</option>
			    			 	<option value="0">Respuesta Incorrecta</option>
			    			 </select>
			    		</div>
			    	</div>
			    	<div class="row">
			    		<div class="col-sm-12 col-md-12 col-12">
			    			<button class="btn btn-success ">Agregar</button>	
			    		</div>
			    	</div>
			    	<br>
			    	<div class="row">
			    		<div class="table-responsive">
			    			<table class="table table-striped table-hover">
			    				<thead>
			    					<tr>
			    						<th></th>
			    						<th>Opcion</th>
			    						<th>Criterio</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    					<tr>
			    						<td>
			    							<button class="btn btn-danger">
				    							<i class="far fa-trash-alt"></i>
				    						</button>
			    						</td>
			    						<td></td>
			    						<td></td>
			    					</tr>
			    				</tbody>
			    			</table>
			    		</div>
			    	</div>
			  </div>
			</div>
    	</div>
    </div>
    <br>
   	<div class="row">
    	<div class="col-sm-12 col-12">
    		<div class="card">
			  <div class="card-body">
			    	<div class="row">
			    		<h5>Listado de preguntas</h5>
			    	</div>
			    	<div class="row">
			    		<div class="table-responsive">
				    		<table class="table table-striped table-hover">
				    			<thead>
				    				<tr>
				    					<th>Pregunta</th>
				    					<th>Numero de Trivia</th>
				    					<th>Fecha de Publicación</th>
				    					<th>Fecha de Terminacion</th>
				    					<th>Estado</th>
				    					<th colspan="2">Opciones</th>
				    				</tr>
				    			</thead>
				    			<tbody>
				    				<tr>
				    					<td>Cual es el Producto que tiene queso crema?</td>
				    					<td>1</td>
				    					<td>2021-23-06 3:00 p.m.</td>
				    					<td>2021-31-06 3:00 p.m.</td>
				    					<td>
				    						<button class="btn btn-success">
				    							<i class="fas fa-check"></i>
				    						</button>
				    						<button class="btn btn-danger">
				    							<i class="fas fa-times"></i>
				    						</button>
				    					</td>
				    					<td colspan="2">
				    						<button class="btn btn-warning">
				    							<i class="far fa-edit"></i>
				    						</button>
				    						<button class="btn btn-danger">
				    							<i class="far fa-trash-alt"></i>
				    						</button>
				    						<button class="btn btn-primary" @click="mostrarDetalleOpciones()">
				    							<i class="fas fa-plus"></i>
				    						</button>
				    					</td>
				    					<tr v-if="flagDescripcionOpciones">
				    						<td>
				    							Opcion de Respuesta:  <br>
				    							Queso Crema
				    						</td>
				    						<td>
				    							Criterio de respuesta: <br>
				    							Incorrecto
				    						</td>
				    						<td>
				    							Estado: <br>
					    						<button class="btn btn-danger">
					    							<i class="fas fa-times"></i>
					    						</button>
				    						</td>
				    						<td>
				    							<button class="btn btn-danger">
				    								<i class="far fa-trash-alt"></i>
				    							</button>
				    							<button class="btn btn-secondary" @click="ocultarDetalleOpciones()">
				    								<i class="fas fa-minus"></i>
				    							</button>
				    						</td>
				    						<td></td>
				    						<td></td>
				    					</tr>
				    					<tr v-if="flagDescripcionOpciones">
				    						<td>
				    							Opcion de Respuesta:  <br>
				    							la guayaba
				    						</td>
				    						<td>
				    							Criterio de respuesta: <br>
				    							Incorrecto
				    						</td>
				    						<td>
				    							Estado: <br>
					    						<button class="btn btn-danger">
					    							<i class="fas fa-times"></i>
					    						</button>
				    						</td>
				    						<td>
				    							<button class="btn btn-danger">
				    								<i class="far fa-trash-alt"></i>
				    							</button>
				    							<button class="btn btn-secondary" @click="ocultarDetalleOpciones()">
				    								<i class="fas fa-minus"></i>
				    							</button>
				    						</td>
				    						<td></td>
				    						<td></td>
				    					</tr>
				    					<tr v-if="flagDescripcionOpciones">
				    						<td>
				    							Opcion de Respuesta:  <br>
				    							Alpinet Queso Crema
				    						</td>
				    						<td>
				    							Criterio de respuesta: <br>
				    							Correcto
				    						</td>
				    						<td>
				    							Estado: <br>
				    							<button class="btn btn-success">
					    							<i class="fas fa-check"></i>
					    						</button>
				    						</td>
				    						<td>
				    							<button class="btn btn-danger">
				    								<i class="far fa-trash-alt"></i>
				    							</button>
				    							<button class="btn btn-secondary" @click="ocultarDetalleOpciones()">
				    								<i class="fas fa-minus"></i>
				    							</button>
				    						</td>
				    						<td></td>
				    						<td></td>
				    					</tr>
				    				</tr>
				    				<tr>
				    					<td>Cual es el Producto que tiene harina?</td>
				    					<td>1</td>
				    					<td>2021-25-06 1:00 p.m.</td>
				    					<td>2021-31-06 1:00 p.m.</td>
				    					<td>
				    						<button class="btn btn-success">
				    							<i class="fas fa-check"></i>
				    						</button>
				    						<button class="btn btn-danger">
				    							<i class="fas fa-times"></i>
				    						</button>
				    					</td>
				    					<td colspan="2">
				    						<button class="btn btn-warning">
				    							<i class="far fa-edit"></i>
				    						</button>
				    						<button class="btn btn-danger">
				    							<i class="far fa-trash-alt"></i>
				    						</button>
				    						<button class="btn btn-primary" @click="mostrarDetalleOpciones()">
				    							<i class="fas fa-plus"></i>
				    						</button>
				    					</td>
				    					<tr v-if="flagDescripcionOpciones">
				    						<td>
				    							Opcion de Respuesta:  <br>
				    							Queso Crema
				    						</td>
				    						<td>
				    							Criterio de respuesta: <br>
				    							Incorrecto
				    						</td>
				    						<td>
				    							Estado: <br>
					    						<button class="btn btn-danger">
					    							<i class="fas fa-times"></i>
					    						</button>
				    						</td>
				    						<td>
				    							<button class="btn btn-danger">
				    								<i class="far fa-trash-alt"></i>
				    							</button>
				    							<button class="btn btn-secondary" @click="ocultarDetalleOpciones()">
				    								<i class="fas fa-minus"></i>
				    							</button>
				    						</td>
				    						<td></td>
				    						<td></td>
				    					</tr>
				    					<tr v-if="flagDescripcionOpciones">
				    						<td>
				    							Opcion de Respuesta:  <br>
				    							El jugo de mango
				    						</td>
				    						<td>
				    							Criterio de respuesta: <br>
				    							Incorrecto
				    						</td>
				    						<td>
				    							Estado: <br>
					    						<button class="btn btn-danger">
					    							<i class="fas fa-times"></i>
					    						</button>
				    						</td>
				    						<td>
				    							<button class="btn btn-danger">
				    								<i class="far fa-trash-alt"></i>
				    							</button>
				    							<button class="btn btn-secondary" @click="ocultarDetalleOpciones()">
				    								<i class="fas fa-minus"></i>
				    							</button>
				    						</td>
				    						<td></td>
				    						<td></td>
				    					</tr>
				    					<tr v-if="flagDescripcionOpciones">
				    						<td>
				    							Opcion de Respuesta:  <br>
				    							Pan
				    						</td>
				    						<td>
				    							Criterio de respuesta: <br>
				    							Correcto
				    						</td>
				    						<td>
				    							Estado: <br>
				    							<button class="btn btn-success">
					    							<i class="fas fa-check"></i>
					    						</button>
				    						</td>
				    						<td>
				    							<button class="btn btn-danger">
				    								<i class="far fa-trash-alt"></i>
				    							</button>
				    							<button class="btn btn-secondary" @click="ocultarDetalleOpciones()">
				    								<i class="fas fa-minus"></i>
				    							</button>
				    						</td>
				    						<td></td>
				    						<td></td>
				    					</tr>
				    				</tr>
				    			</tbody>
				    		</table>
			    		</div>
			    	</div>
			  </div>
			</div>
    	</div>
    	</div>
    </div>
</template>

<script>
	export default {

        data () {
            return {
            	flagDescripcionOpciones: false,
            }
        },

        computed:{

        },

        methods:{
        	mostrarDetalleOpciones: function () {
        		this.flagDescripcionOpciones = true
        	},

        	ocultarDetalleOpciones: function () {
        		this.flagDescripcionOpciones = false
        	},
        },

        mounted() {
            console.log('Component mounted.')
        }

    };
</script>