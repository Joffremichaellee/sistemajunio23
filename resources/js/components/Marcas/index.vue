<template>
      <main class="main">
        <!-- Breadcrumb -->
        <div class="container-fluid">
           
                <!-- Listado-->
                <template v-if="listado==1">
                <!-- Ejemplo de tabla Listado -->
                    <div class="card-header" style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
                        <button type="button" @click="mostrarDetalle()" class="btn btn-success button-registrar" style="border-radius:0;">
                            <i class="icon-plus"></i>Nueva Marca
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button type="button" class="btn btn-warning button-importar" style="border-radius:0;">
                            <i class="icon-plus"></i>CSV Importar
                        </button>

                        <button type="button" class="btn btn-outline-warning button-exportar" style="border-radius:0;">
                            <i class="icon-plus"></i>CSV Exportar
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button type="button" class="btn btn-danger button-reportar"  style="border-radius:0;">
                            <i class="icon-plus"></i>Reportes
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </div>
          
                    <div class="card">
                        <div class="card-header" style="background-color: #F7F7F7;">
                            <h3 class="card-title" style="font-family: 'Roboto', sans-serif;">Lista de Marcas</h3>
                        </div>
                    
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped table-hover  " >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Opciones</th>
                                        <th>Marcas</th>
                                        <th>Fabricantes</th>
                                        <th>Logos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <!-- <tr >
                                            <td>345345345</td>
                                            <td>345345345</td>
                                            
                                            <td>345345345</td>
                                            <td>345345345</td>
                                            <td></td>
                                        </tr>-->

                                <tr v-for="marca in arrayMarca" :key="marca.id">
                                        <td v-text="marca.id"></td>
                                        <td>
                                        asdasdas
                                        </td>
                                        <td v-text="marca.marca"></td>
                                        <td v-text="marca.fabricante"></td>
                                        <td ><img :src="marca.logo"  height="50px"></td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </template>
                <!--Fin Listado-->
                <!-- Detalle-->
                <template v-else-if="listado==0">


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
                                                    <button type="button" style="border-radius:0;" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                                                    <button id="button" type="submit"  style="border-radius:0;" class="btn btn-primary" disabled >Registrar Venta</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                    
                                </div>

                            </div>
                        
                        </div>
                    

               

                        
                    </div>
                </template>
                <!-- Fin Detalle-->
                <!-- Ver ingreso -->
                <template v-else-if="listado==2">
                <div class="card-body">

                </div>
                </template>
                <!-- fin ver ingreso -->
           
            <!-- Fin ejemplo de tabla Listado -->
        </div>
        <!--Inicio del modal agregar/actualizar-->

      </main>
</template>

<script>
import datatable from 'datatables.net-bs4'
export default {
    mounted() {
            this.listarMarca();
    },
    data (){
        return {
            
            arrayMarca : [],

            listado:1


            
        }
    },
    methods : {
        tabla(){
            $(document).ready( function () {
                $('#myTable').DataTable({
                    "responsive": true, "lengthChange": true, "autoWidth": false,
                });
                
            } );
        },

        listarMarca(){
            let me=this;
            axios.get('/marca').then(res=>{
                me.arrayMarca = res.data;
                this.tabla();
            })
        },
    
        mostrarDetalle(){
            let me=this;
            me.listado=0;
          
        },
        ocultarDetalle(){
            let me=this;
            me.listado=1;
             this.tabla();
        },
        cerrarModal(){
            this.modal=0;
        }, 
        
    },

}
</script>

<style>    
.modal-content{
width: 100% !important;
position: absolute !important;
}
.mostrar{
display: list-item !important;
opacity: 1 !important;
position: absolute !important;
background-color: #3c29297a !important;
}
.div-error{
display: flex;
justify-content: center;
}
.text-error{
color: red !important;
font-weight: bold;
}
@media (min-width: 600px) {
.btnagregar {
  margin-top: 2rem;
}
}

</style>
