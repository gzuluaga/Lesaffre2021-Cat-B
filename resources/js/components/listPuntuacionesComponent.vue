<template>
	 <div class="container">
        <div class="row" v-if="flagForm">
          <div class="col-sm-4 col-12">
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Seleccionar Distribuidor</label>
                  <select v-model="distribuidor" class="form-control">
                    <option value="0">Seleccionar</option>
                    <option v-for="distrubuidor in arrayProveedores" :key="distrubuidor.id" :value="distrubuidor.id" v-text="distrubuidor.name"></option>
                  </select>
              </div>
          </div>
           <div class="col-sm-4 col-12">
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Puntuación</label>
                  <input type="text" class="form-control" v-model="puntuacion">
              </div>
          </div>
        </div>
        <div class="row" v-if="flagForm">
            <div class="col-sm-4 col-12">
              <div class="mb-3">
                  <button type="button" class="btn btn-primary" @click="storePuntuacion()">Guardar</button>
                  <button type="button" class="btn btn-secondary" @click="redirigir()">Volver</button>
              </div>
            </div>
        </div>
        <div class="mb-3"></div>
        <div class="row" v-if="flagbtnAgregar">
          <div class="col-sm-4 col-12">
            <button type="button" class="btn btn-success" @click="agregarRegistro()">Agregar Registro</button>
            <button type="button" class="btn btn-secondary" @click="redirigir()">Volver</button>
          </div>
        </div>
        <div class="mb-3"></div>
        <div class="row">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control col-md-3" v-model="criterio">
                            <option value="0" selected>Seleccionar filtro</option>
                            <option value="name">Nombres</option>
                            <option value="alias">alias</option>
                        </select>
                        <input type="text" @keyup.enter="listPuntuacion(1,buscar,criterio);" v-model="buscar" class="form-control" placeholder="Buscar">
                        <button type="submit" @click="listPuntuacion(1,buscar,criterio);" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-12">
                <div class="mb-3">
                  	<div class="table-responsive">
                  		<table class="table table-hover table-striped">
                  			<thead>
                  				<tr>
                            <th>Nombres</th>
                  					<th>Correo Electronico</th>
                            <th>Alias</th>
                            <th>Puntos del Mes</th>
                            <th>Posicion del Mes</th>
                  				</tr>
                  			</thead>
                  			<tbody>
                          <tr v-if="cargandoSpinner">
                                <td colspan="8">
                                    <center>
                                        <spinner></spinner> 
                                    </center>
                                </td>                                      
                          </tr>
                  				<tr v-else v-for="(puntuaciones, key) in arrayPuntuaciones">
                            <td v-text="puntuaciones.name" ></td>
                            <td v-text="puntuaciones.email" ></td>
                            <td v-text="puntuaciones.alias" ></td>
                            <td v-text="puntuaciones.puntuacion" ></td>
                            <td v-text="key+1" ></td>
                  				</tr>
                  			</tbody>
                  		</table>
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
            flagForm:           false,
            flagbtnAgregar:     true,
            arrayProveedores:   [],
            arrayPuntuaciones:  [],
            distribuidor:       '0',
            puntuacion:         '',
            
            ruta:                     '',
            criterio                : '0',
            buscar                  : '',
            offset                  : 3,
            cargando                : false,
            cargandoSpinner         : true,
            pagination:{                   
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0,           
            },    
          }
        },
        computed:{
            isActived: function(){              
              return this.pagination.current_page;
            },

            pagesNumber: function(){

                if(!this.pagination.to){                    
                    return[];
                }

                var from = this.pagination.current_page - this.offset;
                if(from < 1){                   
                   from = 1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){                    
                   to = this.pagination.last_page; 
                }

                var pagesArray = [];
                while(from <= to){                   
                   pagesArray.push(from);
                   from++;
                }
                return pagesArray;
            },
        },
        methods:{
          agregarRegistro: function () {
            this.flagForm         = true;
            this.flagbtnAgregar   = false;
          },

          listDistribuidores: async function () {
             const url = 'getlistDist';
                try{
                    
                    const response          = await axios.get(url)
                    const respuesta         = response.data;
                    this.arrayProveedores   = respuesta.users;
                    this.cargandoSpinner    = false;


                } catch (error){
                    if(error.response.status === 500){
                        console.log(error.reponse)
                    }
                    if(error.response.status === 404){
                        console.log(error.reponse)
                    }
                }
          },

          listPuntuacion: async function (page, buscar, criterio){
                const url = 'getlistpuntuacion?page='+page+'&buscar='+buscar+'&criterio='+criterio;
                try{
                    
                    const response          = await axios.get(url)
                    const respuesta         = response.data;
                    this.arrayPuntuaciones  = respuesta.puntuaciones.data;
                    this.pagination         = respuesta.pagination;
                    this.cargandoSpinner    = false;
                    this.getRuta();

                } catch (error){
                    if(error.response.status === 500){
                        console.log(error.reponse)
                    }
                    if(error.response.status === 404){
                        console.log(error.reponse)
                    }
                }
          },

          storePuntuacion: async function() {
             try {
                    const request = {
                        'distribuidor':      this.distribuidor,
                        'puntuacion':        this.puntuacion,
                    }

                    const response = await axios.post('store', request)

                    console.log(response.status)
                    if(response.status === 200){
                        this.listPuntuacion(1,'','name');
                        this.limpiar();
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'Se guardó correctamente!',
                          showConfirmButton: false,
                          timer: 1500
                        })

                    }
              } catch(error) {
                   console.log(error.response);
                      /** si el status es 500, error en el servidor */
                      if(error.response.status === 500){
                          console.log(error)
                      }
                      /** si el status es 422, alguno de los datos tuvo un error de validacion */
                      if(error.response.status === 422){                    
                          this.validate = error.response.data.errors;
                          this.flag = 1;
                      }
              }
          },

          limpiar: function (){
            this.distribuidor     = '0';
            this.puntuacion       = '';
            this.flagForm         = false;
            this.flagbtnAgregar   = true;
          },

          cambiarPagina(page,buscar,criterio){
              let me = this;
              me.pagination.current_page=page;
              me.listarAccesorios(page,buscar,criterio);
          },


          getRuta: async function () {
                try {
                    const response          = await axios.get('ruta_proyecto')
                    const respuesta         = response.data
                    if (response.status     === 200) {
                        const respuesta     = response.data
                        this.ruta           = respuesta.ruta
                    }

                } catch (error) {
                    if (error.response.status === 500) {
                        console.log(error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Se ha presentado un error!',
                        })
                    }

                    if (error.response.status === 422) {
                        console.log(error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Se ha presentado un error!',
                        })
                    }
                }  
            },

          redirigir(){
            const link = this.ruta + '/home';
            window.location = link
          },

        },
        mounted() {
            console.log('Component mounted.')
            this.listDistribuidores();
            this.listPuntuacion(1,this.buscar,this.criterio);
        }
    };
</script>