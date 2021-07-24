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
                                                <label for="marca">marca</label>
                                                <input type="text" v-model="marca" @click="activarBoton" id="marca"   style="border-radius:0;" class="form-control" placeholder="marca">
                                            </div>

                                            <div class="form-group">
                                                <label for="fabricante" >fabricante</label>
                                                <input type="text" v-model="fabricante" style="border-radius:0;" class="form-control" placeholder="fabricante">
                                            </div>

                                            <div class="form-group">

                                                <label for="imagen">imagen(100x100)</label>
                                                
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file" name="imagen "  @change="obtenerImagen" id="imagen">
                                                        <!--<label class="custom-file-label"  style="border-radius:0;" for="imagen">Imagen</label>-->
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <figure v-if=" imagen ">
                                                <img width="230" height="200" id="imagenMiniatura" :src="imagen" alt="Foto de la Categoria">
                                            </figure>

                                            <div class="form-group row">

                                                <div class="col-md-12">
                                                    <a type="button"  style="border-radius:0;" href="/marcas" class="btn btn-secondary">Cerrar</a>
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
      
        data (){
            return {
                
                imagenMiniatura: '',
                marca : '',
                fabricante : '',
                image : '',
            }
        },
        computed:{
            imagen(){
                return this.imagenMiniatura;
            },
            

        },
        
        methods : {
            activarBoton(){
                
                let marcas1 = document.getElementById("marca");
               // activadornombre = activadornombre.trim()

                marcas1.addEventListener("keyup", () => {
                    
                    if(marcas1.value !=  ""){
                        document.getElementById("button").disabled = false
                    }else{
                        document.getElementById("button").disabled = true
                    }
                })

               
               

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
                formData.append('marca',this.marca);
                formData.append('fabricante',this.fabricante);
               
                formData.append('image',this.image);
            

                axios.post('/marcas',formData)
                .then(function(responses) {
                    me.marca='';
                    me.fabricante='';
                    me.imagenMiniatura = '';
                    me.Sweetalertcategoria();
                    window.location = '/marcas';
                   

                    console.log(responses.data);
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
        
        },
        
    }
</script>

<!--<style>-->    