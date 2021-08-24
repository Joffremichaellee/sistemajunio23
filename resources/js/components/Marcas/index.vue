    <template>
        <main class="main">
            <!-- Breadcrumb -->
            <div class="container-fluid">
            
                    <!-- Listado-->
                    <template v-if="listado==1">
                    <!-- Ejemplo de tabla Listado -->
                        <div class="card-header" style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
                            <button type="button" @click="mostrarDetalle()" class="btn btn-success button-registrar" style="border-radius:0;">
                                <i class="fa fa-plus" aria-hidden="true"></i>Nueva Marca
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <!--<button type="button" class="btn btn-warning button-importar" style="border-radius:0;">
                                <i class="icon-plus"></i>CSV Importar
                            </button>

                            <button type="button" class="btn btn-outline-warning button-exportar" style="border-radius:0;">
                                <i class="icon-plus"></i>CSV Exportar
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <button type="button" class="btn btn-danger button-reportar"  style="border-radius:0;">
                                <i class="icon-plus"></i>Reportes
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->

                        </div>
            
                        <div class="card">
                            <div class="card-header" style="background-color: #F7F7F7;">
                                <h3 class="card-title" style="font-family: 'Roboto', sans-serif;">Lista de Marcas</h3>
                            </div>
                        
                            <div class="card-body">
                                <table id="myTable" class="table table-striped table-hover  " >
                                    <thead>
                                        <tr >
                                            
                                            <th>Logos</th>                 
                                            <th>Marcas</th>
                                            <th>Fabricantes</th>
                                            <th >Opciones</th>
                                            
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
                                            
                                            <td class="circular-image" ><img :src="marca.logo"  height="50px"></td>
                                            <td v-text="marca.marca"></td>
                                            <td v-text="marca.fabricante"></td>
                                            <td class="widthOpciones" style="padding: 17px 0px 0px 15.5px;"> 
                                            &nbsp;
                                                <button type="button" @click="abrirFormulario('marca','actualizar',marca)" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt" style="color:#fff"></i>
                                                </button> &nbsp;
                                                <button type="button" @click="abrirFormulario('marca','eliminar',marca)" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt" style="color:#fff"></i>
                                                </button>
                                                
                                            </td>
                                        
                                            
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

                                            <form  @submit.prevent="addProduct()" method="POST" enctype="multipart/form-data">
                                                
                                                <div  class="form-group">
                                                    <label for="marca">marca</label>
                                                    <input type="text" v-model="marca"  id="marca"   style="border-radius:0;" class="form-control" placeholder="marca">
                                                </div>

                                                <div class="form-group">
                                                    <label for="fabricante" >fabricante</label>
                                                    <input type="text" v-model="fabricante" style="border-radius:0;" class="form-control" placeholder="fabricante">
                                                </div>

                                                <div class="form-group">

                                                    <label for="imagen">imagen(100x100)</label>
                                                    
                                                    <div class="input-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="image"  @change="obtenerImagen" id="imagen">
                                                            <!--<label class="custom-file-label"  style="border-radius:0;" for="imagen">Imagen</label>-->
                                                        </div>

                                                    </div>
                                                    
                                                </div>

                                                <figure v-if=" imagen ">
                                                    <img width="230" height="200" id="imagenMiniatura" :src="imagen" alt="Foto de la Categoria">
                                                </figure>

                                                <div class="form-group row">

                                                    <div class="col-md-12">
                                                        <a type="button"  style="border-radius:0;" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</a>
                                                        <button id="button" type="submit"  style="border-radius:0;" class="btn btn-primary"  >Registrar Venta</button>
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

                            <div class="card">     
                    
                                <div class=" card-primary">

                                    <div class="card-header">
                                        <h3 class="card-title">Editar Marca</h3>
                                    </div>

                                    <div class="row">
                        
                                        <div class="col-md-6">

                                            <div class="card-body">

                                                <form @submit.prevent="replace_image()" method="POST" enctype="multipart/form-data">
                                                    
                                                    <div  class="form-group">
                                                        <label for="marca">marca</label>
                                                        <input type="text" name="marca" v-model="marca"  id="marca"   style="border-radius:0;" class="form-control" placeholder="marca">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fabricante" >fabricante</label>
                                                        <input type="text" name="fabricante" v-model="fabricante" style="border-radius:0;" class="form-control" placeholder="fabricante">
                                                    </div>

                                                    <div class="form-group">

                                                        <label for="logo">imagen(100x100)</label>
                                                        
                                                        <div class="input-group">

                                                            <div class="custom-file">
                                                                <input type="file" name="image"  @change="obtenerImagen" id="logo">
                                                                <!--<label class="custom-file-label"  style="border-radius:0;" for="imagen">Imagen</label>-->
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <figure v-if=" imagen ">
                                                        <img width="230"  height="200" id="imagenMiniatura" :src="imagen" alt="Foto de la Categoria">
                                                    </figure>

                                                    <div class="form-group row">

                                                        <div class="col-md-12">
                                                            <a type="button"  style="border-radius:0;" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</a>
                                                            <button id="button" type="submit"   style="border-radius:0;" class="btn btn-primary" >Editar Marca</button>
                                                        </div>

                                                    </div>

                                                </form>

                                            </div>
                                            
                                        </div>

                                    </div>
                                
                                </div>
                        
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
                imagenMiniatura: '',
                datoMarca: {marca:'', fabricante:'',},
                id: 0,
                arrayMarca : [],
                marca : '',
                fabricante : '',
                image : '',
                listado:1


                
            }
        },
        computed:{

            imagen(){
                return this.imagenMiniatura;
            },

        },
        methods : {
            tabla(){
                $(document).ready( function () {
                    $('#myTable').DataTable({
                        "responsive": true, "lengthChange": true, "autoWidth": false,
                        
                    });
                    
                } );
            },
            /*activarBoton(){
                    
                let marcas = document.getElementById("marca");
                // activadornombre = activadornombre.trim()

                marcas.addEventListener("keyup", () => {
                    
                    if(marcas.value !=  ""){
                        document.getElementById("button").disabled = false
                    }else{
                        document.getElementById("button").disabled = true
                    }
                })

                
                

            },*/

            listarMarca(){
                let me=this;
                axios.get('/marca').then(res=>{
                    me.arrayMarca = res.data;
                    this.tabla();
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

                let opciones = {
                    headers: {'Content-Type': 'multipart/form-data'}
                };

                let formData = new FormData();
                formData.append('marca',this.marca);
                formData.append('fabricante',this.fabricante);
                formData.append('image',this.image);
            

                axios.post('/marcas',formData,opciones)
                .then(function(responses) {
                    me.marca='';
                    me.fabricante='';
                    me.imagenMiniatura = '';
                    me.SweetalertEditarMarca();
                    window.location = '/marcas';        
                })
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede ir vacio los campos'
                    //footer: '<a href="">Why do I have this issue?</a>'
                }));
            },
            
            EliminarMarca(){

                const swalWithBootstrapButtons = Swal.mixin({
                    
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {

                        let me = this;



                        axios.delete('/marcas/'+this.id)
                        .then(function (response) {
                            console.log(response);
                            window.location = '/marcas';
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Ha sido eliminado la marca correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            
                        }).catch(function (error) {
                            console.log(error);
                        });

                        
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                        )
                    }
                })

                

            },

            replace_image(){

                        let me = this;

                        let opciones = {
                            headers: {'Content-Type': 'multipart/form-data'}
                        };

                        let formData = new FormData();

                        formData.append('marca',this.marca);
                        formData.append('fabricante',this.fabricante);
                        formData.append('image',this.image);
                        formData.append('_method', 'patch');
                    

                        axios.post('/marcas/'+this.id,formData,opciones)

                            /*'marca': this.marca,
                            'fabricante': this.fabricante,
                            'logo': this.image,
                            'id': this.id*/
                        
                        .then(function(responses) {
                            me.marca='';
                            me.fabricante='';
                            me.imagenMiniatura = '';
                            me.SweetalertEditarMarca();
                            window.location = '/marcas';        
                        })
                        .catch(error => Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No puede ir vacio los campos'
                            //footer: '<a href="">Why do I have this issue?</a>'
                        }));
                
                
            },
            
            
            SweetalertCrearMarca(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se ha guardado exitosamente la marca',
                    showConfirmButton: false,
                    timer: 1500
                });
            },

            SweetalertEditarMarca(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se ha guardado exitosamente la categoria',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
        
            mostrarDetalle(){
                let me=this;
                me.listado=0;
            
            },
            ocultarDetalle(){
                let me=this;
                me.marca='';
                me.fabricante='';
                me.imagenMiniatura = '';
                me.listado=1;
                me.tabla();
            },
            cerrarModal(){
                this.modal=0;
            }, 
            abrirFormulario(modelo, accion, data = []){
                switch(modelo){
                    case "marca":
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
                                console.log(data);
                                this.listado=2;
                                this.id=data['id'];
                                this.marca = data['marca'];
                                this.fabricante= data['fabricante'];
                                this.imagenMiniatura= data['logo'];
                                break;
                            }
                            case 'eliminar':
                            {
                                console.log(data);
                                this.EliminarMarca();
                                this.id=data['id'];
                                break;
                            }
                        }
                    }
                }
            }
            
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

    

    @media only screen and (max-width: 10000px) and (min-width: 506px)  {

        .circular-image img{
            width: 40px;
            height: 40px;

            /* fill the container, preserving aspect ratio, and cropping to fit */
            background-size: cover;

            /* center the image vertically and horizontally */
            background-position: top center;

            /* round the edges to a circle with border radius 1/2 container size */
            border-radius: 50%;
            margin-left: 10px;margin-right: auto;
            
        }

        .circular-image {

            width:2%;
            
        }

        .widthOpciones{

            width:  2%;
            

        }

        .widthOpciones button,
        .widthOpciones a{

            font-size: 11px;

        }        

            

    }

    @media only screen and (max-width: 505px) and (min-width: 320px)  {

        .circular-image img{
            width: 40px;
            height: 40px;

            /* fill the container, preserving aspect ratio, and cropping to fit */
            background-size: cover;



            /* round the edges to a circle with border radius 1/2 container size */
            border-radius: 50%;
                margin-left: 6px;
            
        }

        .circular-image {
            margin-left: auto;margin-right: auto;
            width:1%;
            
        }
        

    }


    </style>
