<template>
    <div class="container-fluid">
        <div class="row" v-if="flagbtn">
            <div class="col-sm-3 col-lg-3 col-xs-12 col-md-3">
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" v-model="title">
                </div>    
            </div>
             <div class="col-sm-3 col-lg-3 col-xs-12 col-md-3">
                <div class="mb-3">
                    <label for="" class="form-label">Fecha y Hora de Inicio</label>
                    <input type="datetime-local" class="form-control" v-model="start" >
                </div>    
            </div>
            <div class="col-sm-3 col-lg-3 col-xs-12 col-md-3">
                <div class="mb-3">
                    <label for="" class="form-label">Fecha y Hora de fin</label>
                    <input type="datetime-local" class="form-control" v-model="end">
                </div>    
            </div>
             <div class="col-sm-3 col-lg-3 col-xs-12 col-md-3">
                <div class="mb-3">
                    <label for="" class="form-label">Todo el dia</label>
                    <select v-model="allDay" class="form-control">
                        <option value="" selected>Seleccionar</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>    
            </div>
        </div>
        <div class="row" v-if="flagbtn">
            <div class="col-sm-3 col-lg-3 col-xs-12 col-md-3">
                <button class="btn btn-primary" @click="storeEvento()"> Guardar</button>
                <button class="btn btn-secondary" @click="redirigir()"> Volver</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-lg-3 col-xs-12 col-md-3">
                <button class="btn btn-success" v-if="!flagbtn" @click="mostrarFrom()"> Agregar Evento</button>
                <button class="btn btn-secondary" v-if="!flagbtn" @click="redirigir()"> Volver</button>
            </div>
        </div>
        <div class="mb-5"></div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
                <full-calendar 
                    :events="events"
                    :header="{
                            left: 'prev, today next',
                            center: 'title',
                            right: 'month, timeGridWeek, timeGridDay, listWeek',
                        }"
                    :config="config"
                >
                </full-calendar>
            </div>
        </div>
        
    </div>
</template>

<script>
	import 'fullcalendar/dist/locale/es'
    export default {
        data() {
            return {
                title:          '',
                start:          '',
                end:            '',
                allDay:         '',
                flagbtn:        false,
            	arrayData:      [],
               	events:         [],
                color: 		'blue',
                textColor: 	'white',
                config: {
			        locale: 'es',
			    },
            }
            /*{
            	title  : '',
            	start  : '',  //2021-06-25T12:30:00
            	end    : '',
            	allDay : '',
        	}*/
        },


        methods:{
        	listAgendar: async function () {
        		const url = 'show-events';
                try{
                    
                    const response          = await axios.get(url)
                    const respuesta         = response.data;
                    
                    if(response.status === 200){

                    	this.events 	= respuesta.eventos;
                        this.getRuta();

                    }                    
                } catch (error){
                    if(error.response.status === 500){
                        console.log(error.reponse)
                    }
                    if(error.response.status === 404){
                        console.log(error.reponse)
                    }
                }
        	},

            storeEvento: async function () {
                try {
                    const request = {
                        'title':          this.title,
                        'start':          this.start,
                        'end':            this.end,
                        'allDay':         this.allDay,
                    }

                    const response = await axios.post('store', request)

                    console.log(response.status)
                    if(response.status === 200){
                        this.listAgendar();
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
                this.title  = '';
                this.start  = '';
                this.end    = '';
                this.allDay = '';
                this.flagbtn = false;
            },

            mostrarFrom: function () {
                this.flagbtn = true;
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
            this.listAgendar();
        }
    }
</script>