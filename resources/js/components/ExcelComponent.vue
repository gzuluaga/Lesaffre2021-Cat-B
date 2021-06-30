<template>
  <div class="container">
     <div class="row">
        <div class="form-row">
          <div class="col-md-12">
            <label class="form-control-label"  for="input-file-import">Upload Excel File</label>
            <input type="file" class="form-control" :class="{ ' is-invalid' : error.message }" id="input-file-import" name="file_import" ref="import_file"  @change="onFileChange">
              <div v-if="error.message" class="invalid-feedback">
                <p>Revisar el archivo {{ error }}</p>
              </div>
              <br>
            <button class="btn btn-primary" @click="proceedAction()">subir Archivo</button>
            <a :href="url" class="btn btn-warning" type="button">Exportar Informacion de Distribuidores </a>
            <a @click="redirigir()" class="btn btn-secondary" type="button">Atras</a>
          </div>
        </div>
    </div>
    <br>
  </div>
</template>
<script>
  export default {
     data() {
        return {
          url: '',
          error: {},
          ruta: '',
          import_file: '',
        }
      },
      methods: {
        onFileChange(e) {
            this.import_file = e.target.files[0];
        },

        proceedAction() {
            let formData = new FormData();
            formData.append('import_file', this.import_file);

              axios.post('import', formData, {
                  headers: { 'content-type': 'multipart/form-data' }
                })
                .then(response => {
                    if(response.status === 200) {
                      Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se cargaron correctamente!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    }
                })
                .catch(error => {
                    // code here when an upload is not valid
                    this.uploading = false
                    this.error = error.response.data
                    console.log('check error: ', this.error)
                });
        },

        export_excel: function () {
           this.url = this.ruta +'/excel/export';
        },

        getRuta: async function () {
                try {
                    const response          = await axios.get('ruta_proyecto')
                    const respuesta         = response.data
                    if (response.status     === 200) {
                        const respuesta     = response.data
                        this.ruta           = respuesta.ruta
                        this.export_excel();
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

        limpiar: function () {
          this.import_file = '';
        },

      },
      mounted() {
          console.log('Component mounted.')
          this.getRuta();
      }
  }
</script>