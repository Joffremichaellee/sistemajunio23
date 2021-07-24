<template>

    <main>
            <!-- Breadcrumb -->
            <div class="container-fluid">

                <div class="card">     
                   
                        <div class=" card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Nueva Categoria</h3>
                            </div>

                            <div class="row">
                
                                <div class="col-md-6">

                                    <div class="card-body">

                                        <form @submit.prevent="addProduct" method="POST" enctype="multipart/form-data">
                                            
                                            <div  class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" v-model="nombre" @click="activarBoton" id="nombreinput"   style="border-radius:0;" class="form-control" placeholder="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion" >descripcion</label>
                                                <input type="text" v-model="descripcion" style="border-radius:0;" class="form-control" placeholder="descripcion">
                                            </div>

                                            <div class="form-group">

                                                <label for="imagen">Imagen(100x100)</label>
                                                
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file"  @change="obtenerImagen" id="imagen">
                                                        <!--<label class="custom-file-label"  style="border-radius:0;" for="imagen">Imagen</label>-->
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <figure v-if=" imagen ">
                                                <img width="230" height="200" id="imagenMiniatura" :src="imagen" alt="Foto de la Categoria">
                                            </figure>

                                            <div class="form-group row">

                                                <div class="col-md-12">
                                                    <a type="button"  style="border-radius:0;" href="/categoria" class="btn btn-secondary">Cerrar</a>
                                                    <button id="button" type="submit"  style="border-radius:0;" class="btn btn-primary" disabled >Registrar Venta</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                    
                                </div>

                            </div>
                        
                        </div>
                    

                </div>

            </div>

    </main>

</template>

<script>


    
    export default {
        mounted() {
            this.listarCategoria();
        },
        data (){
            return {
                
                listado : '',
                prueba: '',
                imagenMiniatura: '',
                categoria_id: 0,
                nombre : '',
                descripcion : '',
                arrayCategoria : [],
                modal : 0,
                imagenpreview : '',
                image : '',
                imagendefault : '/storage/default.png',
                listado:1,
                tituloModal : '',
                tipoAccion : 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : ''
            }
        },
        computed:{
            imagen(){
                return this.imagenMiniatura;
            },
            

        },
        
        methods : {
            activarBoton(){
                
                let activadornombre = document.getElementById("nombreinput");
               // activadornombre = activadornombre.trim()

                activadornombre.addEventListener("keyup", () => {
                    
                    if(activadornombre.value !=  ""){
                        document.getElementById("button").disabled = false
                    }else{
                        document.getElementById("button").disabled = true
                    }
                })

               
               

            },
            listarCategoria (){
                let me=this;
                var url= '/categoria' ;
                axios.get(url).then(function (response) {
                    me.listado ='/categoria';
                })
               
                .catch(function (error) {
                    console.log(error);
                });
            },
            obtenerImagen(e){

                let file = e.target.files[0];
                this.image = file;
                this.cargarImagen(file); 

            },
            cargarImagen(file){
                let reader = new FileReader();

                reader.onload = (e)  => {
                    this.imagenMiniatura = e.target.result;
                }


                reader.readAsDataURL(file);
            },
            addProduct(){
                


                let me = this;
                let formData = new FormData();
                formData.append('nombre',this.nombre);
                formData.append('descripcion',this.descripcion);
               
                formData.append('image',this.image);
            

                axios.post('/categoria/storecategoria',formData)
                .then(function(responses) {
                    me.nombre='';
                    me.descripcion='';
                    me.imagenMiniatura = '';
                    me.Sweetalertcategoria();
                    window.location = '/categoria';
                   

                    console.log(responses.data);
                })
            },
            
            
            actualizarCategoria(){
               if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

                axios.put('/categoria/actualizar',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'id': this.categoria_id
                }).then(function (response) {
                    /*me.cerrarRegistro();
                    */
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            mostrarDetalle(){
                let me=this;
                
                me.listado=0;

               
            },
            cerrarRegistro(){
                this.nombre='';
                this.descripcion='';
                this.imagenMiniatura='';
            },
            desactivarCategoria(id){
               swal({
                title: 'Esta seguro de desactivar esta categoría?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/categoria/desactivar',{
                        'id': id
                    }).then(function (response) {
                        
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            Sweetalertcategoria(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se ha guardado exitosamente la categoria',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
        /*    validarCategoria(){
                this.errorCategoria=0;
                this.errorMostrarMsjCategoria =[];

                if (!this.nombre) this.errorMostrarMsjCategoria.push("El nombre de la categoría no puede estar vacío.");

                if (this.errorMostrarMsjCategoria.length) this.errorCategoria = 1;

                return this.errorCategoria;
            },*/
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.descripcion='';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "categoria":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Categoría';
                                this.nombre= '';
                                this.descripcion = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar categoría';
                                this.tipoAccion=2;
                                this.categoria_id=data['id'];
                                this.nombre = data['nombre'];
                                this.descripcion= data['descripcion'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        
    }
</script>

<!--<style>-->    