<template>
    <div>
       
            <div class="register-box">
                <h4 class="heading__tertiary mb--30">Registrate si eres Distribuidor</h4>
                <form class="form form--login">
                    <div class="form__group mb--20">
                        <label class="form__label" for="email">Nombre y Apellido <span class="required">*</span></label>
                        <input type="text" class="form__input" v-model="nombresApellido">
                    </div>
                    <div class="form__group mb--20">
                        <label class="form__label" for="email">correo Electronico <span class="required">*</span></label>
                        <input type="email" class="form__input" v-model="correoElectronico">
                    </div>
                    <div class="form__group mb--20">
                        <label class="form__label" for="email">Razon Social <span class="required">*</span></label>
                        <input type="text" class="form__input" v-model="razonSocial">
                    </div>
                    <div class="form__group mb--20">
                        <label class="form__label" for="email" >Seleccionar Alias <span class="required">*</span></label>
                        <select class="form__input" v-model="nombre_alias">
                             <option value="0">Seleccionar</option>
                             <option  v-for="alia in arrayAlias" :key="alia.descripcion" :value="alia.descripcion" v-text="alia.descripcion"></option>
                        </select>
                    </div>
                    <div class="form__group mb--20">
                       <label class="form__label" for="register_password">Contraseña <span class="required">*</span></label>
                        <input type="password" class="form__input"  v-model="password">
                    </div>
                     <div class="form__group mb--20">
                       <label class="form__label" for="register_password">Confirmar Contraseña <span class="required">*</span></label>
                        <input type="password" class="form__input" v-model="againPassword">
                    </div>
                    <div class="form__group">
                        <label class="form__label checkbox-label" for="store_session">
                            <input type="checkbox" v-model="check" value="check">
                            <span>Acepto Terminos y Condiciones</span>
                        </label>
                    </div>
                    <br>
                    <div class="form__group">
                        <input type="button" value="registrar" class="btn btn-size-sm" @click="saveDistribuidores()">
                    </div>
                </form>
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
                arrayAlias:               [],
                check:                    false,
            }
    },

    methods:{
        validacion: function (){
             if(this.password != this.againPassword){
                console.log('no es igual');
                Swal.fire({
                  position: 'center',
                  icon: 'warning',
                  title: 'las contraseñas no Coiciden!',
                  showConfirmButton: false,
                  timer: 2500
                })
            }

            if (!this.check) {
                Swal.fire({
                  position: 'center',
                  icon: 'warning',
                  title: 'Por favor aceptar los Terminos y Condiciones!',
                  showConfirmButton: false,
                  timer: 2500
                })
            }
        },

        saveDistribuidores: async function () {
            try {
              
                this.validacion();

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

        limpiar: function () {
            this.nombresApellido    = '';
            this.correoElectronico  = '';
            this.razonSocial        = '';
            this.nombre_alias       = '0';
            this.password           = '';
            this.againPassword      = '';

        },

    },


    mounted() {
        console.log('Component mounted.')
        this.listAlias();
    }
  };
</script>

