<template>
    <div class="container">
        <div v-if="flag==1" class="form-group row div-error">
            <div class="alert alert-danger" role="alert">
                <ul v-for="error in validate" :key="error">
                    <li v-text="error"></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nombres y Apellidos</label>
                  <input type="text" class="form-control" v-model="nombresApellido">
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input type="email" class="form-control" v-model="correoElectronico" v-if="flagGuardar">
                  <input type="email" class="form-control" :value="correoElectronico" v-else readonly>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Razón Social</label>
                  <input type="text" class="form-control" v-model="razonSocial">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Seleccionar Alias</label>
                  <select v-model="nombre_alias" class="form-control" v-if="flagGuardar">
                        <option value="0">Seleccionar</option>
                        <option  v-for="alia in arrayAlias" :key="alia.descripcion" :value="alia.descripcion" v-text="alia.descripcion"></option>
                  </select>
                  <input type="text" class="form-control" readonly  v-else :value="nombre_alias">
                </div>
            </div>
             <div class="col-sm-4 col-12">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" v-model="password"><span style="color: #EB0606; font-size: 11px;" v-if="flag_pass">Dejar en blanco sino no deseas a cambiar la contraseña</span>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Repetir Contraseña</label>
                  <input type="password" class="form-control" v-model="againPassword">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12">
                <button type="button" v-if="flagGuardar" class="btn btn-primary btn-sm" @click="saveDistribuidores()"> 
                    <i class="fas fa-save"></i>  Guardar 
                </button>
                 <button type="button" v-else class="btn btn-warning btn-sm" @click="updateDistribuidor()"> 
                    <i class="fas fa-save"></i>  Editar 
                </button>
                <button type="button" class="btn btn-secondary btn-sm" @click="redirigir()">
                    Volver 
                </button>
            </div>
        </div>

        <div class="mb-5"></div>

        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control col-md-3" v-model="criterio">
                                <option value="0" selected>Seleccionar filtro</option>
                                <option value="razon_social">Razon Social</option>
                                <option value="alias">alias</option>
                                <option value="name">nombres</option>
                            </select>
                            <input type="text" @keyup.enter="listDistribuidores(1,buscar,criterio);" v-model="buscar" class="form-control" placeholder="Buscar">
                            <button type="submit" @click="listDistribuidores(1,buscar,criterio);" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                <div class="mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Razon Social</th>
                                <th>Correo Electronico</th>
                                <th>Alias</th>
                                <th colspan="2">
                                    Opciones
                                </th>
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
                            <tr v-else v-for="proveedor in arrayProveedores" :key="proveedor.id">
                                <td v-text="proveedor.name" ></td>
                                <td v-text="proveedor.razon_social" ></td>
                                <td v-text="proveedor.email" ></td>
                                <td v-text="proveedor.alias" ></td>
                                <td colspan="2">
                                    <a @click="actualizarDistribuidor(proveedor)" class="btn btn-warning btn-xs">
                                        <i class="fas fa-pencil-alt" style="color: #FFFFFF"></i>
                                    </a>
                                    <a @click="eliminarDistribuidor(proveedor.id)"  class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash" style="color: #FFFFFF"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 <nav>
                        <ul class="pagination">
                            <li class="page-item" v-if="pagination.current_page > 1">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Anterior</a>
                            </li>
                            <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                            </li>                         
                            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
            </div>
        </div>

    </div>
</template>

<script>
    export default {

        data () {
            return {
                nombresApellido:          '',
                correoElectronico:        '',
                razonSocial:              '',
                password:                 '',
                againPassword:            '',
                nombre_alias:             '0',
                arrayProveedores:         [],
                arrayAlias:               [],
                flag:                     0,
                flag_pass:                0,
                id:                       '',
                flagGuardar:              true,
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
            listDistribuidores: async function (page, buscar, criterio) {
                
                const url = 'getlist?page='+page+'&buscar='+buscar+'&criterio='+criterio;
                try{
                    
                    const response          = await axios.get(url)
                    const respuesta         = response.data;
                    this.arrayProveedores   = respuesta.users.data;
                    this.pagination         = respuesta.pagination;
                    this.cargandoSpinner    = false;
                    this.listAlias();
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

            listAlias: async function () {
                const url = 'getalias';
                try{
                    
                    const response          = await axios.get(url)
                    const respuesta         = response.data;
                    this.arrayAlias         = respuesta.alias;
                    // console.log(response);

                } catch (error){
                    if(error.response.status === 500){
                        console.log(error.reponse)
                    }
                    if(error.response.status === 404){
                        console.log(error.reponse)
                    }
                }
            },

            actualizarDistribuidor: function (data=[]) {
                this.nombresApellido     = data['name'];
                this.correoElectronico   = data['email'];
                this.razonSocial         = data['razon_social'];
                this.nombre_alias        = data['alias'];
                this.id                  = data['id'];
                this.password            = '';
                this.againPassword       = '';
                this.flag_pass           = 1;
                this.flagGuardar         = false;
            },

            limpiar: function () {
                this.nombresApellido        = '';
                this.correoElectronico      = '';
                this.razonSocial            = '';
                this.nombre_alias           = '0';
                this.password               = '';
                this.againPassword          = '';
            },

            eliminarDistribuidor: function (id) {
                Swal.fire({
                  title: '¿Estás seguro de deseas eliminar el distribuidor?',
                  text: "El Distribuidor será eliminado",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: '<i class="fa fa-check fa-2x"></i> Aceptar'
                }).then((result) => {
                  if (result.isConfirmed) {
                     let me=this;
                     axios.put('desactivar',{
                       'id':id
                     }).then(function (response) {
                          me.listDistribuidores(1,'','name');
                          Swal.fire(
                            'Eliminado',
                            'El Distribuidor ha sido eliminado con éxito.',
                            'success'
                          )
                      }).catch(function (error) {                          
                          console.log(error);
                      });                   
                  }
                })
            },

            saveDistribuidores: async function () {
                try {
                    //validacion de contraseña
                    if(this.password != this.againPassword){
                        console.log('no es igual');
                    }

                    const request = {
                        'nombres':      this.nombresApellido,
                        'email':        this.correoElectronico,
                        'razonSocial':  this.razonSocial,
                        'alias':        this.nombre_alias,
                        'password':     this.password,
                    }

                    const response = await axios.post('store', request)

                    console.log(response.status)
                    if(response.status === 200){
                        this.listDistribuidores(1,'','name');
                        this.limpiar()
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

            updateDistribuidor: async function (){
                try {
                  
                    if(this.password != this.againPassword){
                        console.log('no es igual');
                    }

                    const request = {
                        'id':           this.id,
                        'nombres':      this.nombresApellido,
                        'email':        this.correoElectronico,
                        'razonSocial':  this.razonSocial,
                        'alias':        this.nombre_alias,
                        'password':     this.password,
                    }

                    const response = await axios.put('update', request)

                    console.log(response.status)
                    if(response.status === 200){
                        this.flagGuardar = true
                        this.flag_pass = false
                        this.listDistribuidores(1,'','name');
                        this.limpiar()
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'Se editó correctamente!',
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
            this.listDistribuidores(1,this.buscar,this.criterio);

        }
    }
</script>
