    <template>
        <main class="main">
            <!-- Breadcrumb -->
            <div class="container-fluid">
            
                    <!-- Listado-->
                    <template v-if="listado==1">
                    <!-- Ejemplo de tabla Listado -->
                        <div class="card-header" style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
                            <button type="button" @click="mostrarFormularioNuevoGrupoAtributo()" class="btn btn-success button-registrar" style="border-radius:0;">
                                <i class="fa fa-plus " aria-hidden="true"></i>Nuevo Grupo Atributo
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </div>
            
                        <div class="card">
                            <div class="card-header" style="background-color: #F7F7F7;">
                                <h3 class="card-title" style="font-family: 'Roboto', sans-serif;">Lista de Grupo Atributos</h3>
                            </div>
                        
                            <div class="card-body">
                                <table id="myTable" class="table table-striped table-hover" >
                                    <thead>
                                        <tr style="font-family: 'Georama', sans-serif;">
                                            <th>id</th> 
                                            <th>grupo</th>                 
                                            <th>orden</th>
                                            <th>estado</th>
                                            <th>opciones</th>
                                            
                                        </tr>
                                       
                                    </thead>
                                    <tbody>

                                        <tr style="cursor: pointer;" @click="abrirFormulario('grupoatributo','atributo',grupoatributo)" v-for="grupoatributo in arrayGrupoAtributo" :key="grupoatributo.id">
                                                <td class="idGrupoAtributo" v-text="grupoatributo.id"></td>
                                                <td class="grupoGrupoAtributo" v-text="grupoatributo.grupo"></td>
                                                <td class="ordenGrupoAtributo" v-text="grupoatributo.orden"></td>
                                                <td class="estadoGrupoAtributo">
                                                    <div v-if="grupoatributo.estado">
                                                        <span class="badge badge-success">Activo</span>
                                                    </div>
                                                    <div v-else>
                                                        <span class="badge badge-danger">Desactivado</span>
                                                    </div>
                                                    
                                                </td>
                                                <td class="widthOpcionesGrupoAtributo" style="padding: 10px 0px 0px;"> 
                                                &nbsp;
                                                    <button type="button" @click="abrirFormulario('grupoatributo','actualizar',grupoatributo)" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt" style="color:#fff"></i>
                                                    </button>&nbsp;
                                                    <button type="button" @click="abrirFormulario('grupoatributo','eliminar',grupoatributo)" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt" style="color:#fff"></i>
                                                    </button>&nbsp;
                                                    <button type="button" @click="abrirFormulario('grupoatributo','atributo',grupoatributo)" class="btn btn-primary btn-sm">
                                                        <i  class="fas fa-search-plus" style="color:#fff"></i>
                                                    </button>
                                                    
                                                </td>
                                            
                                                
                                        </tr>
                                        
                                    </tbody>
                                   
                                    
                                </table>
                            </div>
                        </div>
                    </template>
                    
                    
                    <template v-if="listado==3">
                    <!-- Ejemplo de tabla Listado -->
                        <div style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
                            <button type="button" @click="mostrarFormularioNuevoGrupoAtributo()" class="btn btn-success button-registrar" style="border-radius:0;">
                                <i class="fa fa-plus" aria-hidden="true"></i>Nuevo Atributo
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
            
                        <div class="card">
                            <div class="card-header" style="background-color: #F7F7F7;">
                                <h3 class="card-title" style="font-family: 'Roboto', sans-serif;">Lista de Atributos</h3>
                            </div>
                        
                            <div class="card-body">
                                <table id="myTable" class="table table-striped table-hover  " >
                                    <thead>
                                        <tr style="font-family: 'Georama', sans-serif;">
                                            <th>id</th> 
                                            <th>atributo</th>                 
                                            <th>orden</th>
                                            <th>grupo_id</th>
                                            <th>estado</th>
                                            <th>Opciones</th>
                                            
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

                                        <tr  style="cursor: pointer;" v-for="atributo in arrayAtributo" :key="atributo.id">
                                            <td class="idAtributo" v-text="atributo.id"></td>
                                            <td class="Atributo" v-text="atributo.atributo"></td>
                                            <td class="estadoAtributo" v-text="atributo.orden"></td>
                                            <td class="idgrupoAtributodeatributo" v-text="atributo.gruposatributo_id"></td>
                                            <td class="estadoAtributo">
                                                <div v-if="atributo.estado">
                                                    <span class="badge badge-success">Activo</span>
                                                </div>
                                                <div v-else>
                                                    <span class="badge badge-danger">Desactivado</span>
                                                </div>
                                                
                                            </td>
                                            <td class="widthOpcionesAtributo" style="padding: 10px 0px 0px;"> 
                                                &nbsp;
                                                <button type="button" @click="abrirFormulario('grupoatributo','actualizar',grupoatributo)" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt" style="color:#fff"></i>
                                                </button>&nbsp;
                                                <button type="button" @click="abrirFormulario('grupoatributo','eliminar',grupoatributo)" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt" style="color:#fff"></i>
                                                </button>&nbsp;
                                                
                                                
                                            </td>
                                            
                                            
                                        </tr>
                                        
                                    </tbody>
                                   
                                    
                                </table>
                                
                            </div>
                            
                        </div>
                       
                        <div class="card-header" style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
                            <button type="button" @click="volverGrupoAtributo()" class="btn btn-primary button-registrar" style="border-radius:0;">
                                <i class="fa fa-arrow-left icon-circular" aria-hidden="true"></i>Volver
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </template>
                    
                    <!--Fin Listado-->
                    <!-- Detalle-->
                    <template v-else-if="listado==0">


                        <div class="card">     
                    
                            <div class=" card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Nuevo Grupo Atributo</h3>
                                </div>

                                <div class="row">
                    
                                    <div class="col-md-6">

                                        <div class="card-body">

                                            <form  @submit.prevent="AñadirGrupoAtributo()" method="POST" enctype="multipart/form-data">
                                                
                                                <div  class="form-group">
                                                    <label for="grupo">grupo</label>
                                                    <input type="text" v-model="grupo" id="grupo"  style="border-radius:0;" class="form-control" placeholder="grupo">
                                                </div>

                                                <div class="form-group">
                                                    <label for="orden" >orden</label>
                                                    <input type="number" v-model="orden" style="border-radius:0;" class="form-control" placeholder="orden">
                                                </div>

                                                

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
                                        <h3 class="card-title">Editar Grupo Atributo</h3>
                                    </div>

                                    <div class="row">
                        
                                        <div class="col-md-6">

                                            <div class="card-body">

                                                <form @submit.prevent="EditarGrupoAtributo()" method="POST" enctype="multipart/form-data">
                                                    
                                                    <div  class="form-group">
                                                        <label for="grupo">grupo</label>
                                                        <input type="text" v-model="grupo" id="grupo"  style="border-radius:0;" class="form-control" placeholder="grupo">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="orden" >orden</label>
                                                        <input type="number" v-model="orden" style="border-radius:0;" class="form-control" placeholder="orden">
                                                    </div>

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

                                        <!-- Listado-->

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
                this.listarGrupoAtributo();
                
                
        },
        data (){
            return {
                id: 0,
                arrayGrupoAtributo : [],
                arrayAtributo:[],
                grupo : '',
                orden : '',
                listado:1,
                listadoAtributo:0,
                listadogrupoAtributo:0,


                
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
                        //"autoWidth": false, si pongo true se deforma:(
                    });
                    
                } );
            },

            listarGrupoAtributo(){
                let me=this;
                axios.get('/grupoatributo').then(res=>{
                    
                    me.tabla();
                    me.arrayGrupoAtributo = res.data;
                    
                })
            },
            AñadirGrupoAtributo(){

                let me = this;

                axios.post('/grupoatributos',{

                    'grupo': this.grupo,
                    'orden': this.orden

                }).then(function(responses) {
                    console.log(responses);
                    me.grupo='';
                    me.orden='';
                    me.SweetalertAñadirGrupoAtributo();
                    window.location = '/grupoatributos';        
                })
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede ir vacio los campos'
                    //footer: '<a href="">Why do I have this issue?</a>'
                }));
            },
            
            EliminarGrupoAtributo(){

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



                        axios.delete('/grupoatributos/'+this.id)
                        .then(function (response) {
                            console.log(response);
                            window.location = '/grupoatributos';
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

            EditarGrupoAtributo(){

                let me = this;

                axios.put('/grupoatributos/'+this.id,{

                    'grupo': this.grupo,
                    'orden': this.orden,

                }).then(function(responses) {
                    me.grupo='';
                    me.orden='';
                    me.SweetalertEditarGrupoAtributo();
                    window.location = '/grupoatributos';        
                })
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede ir vacio los campos'
                    //footer: '<a href="">Why do I have this issue?</a>'
                }));
                
                
            },
            
            
            SweetalertEditarGrupoAtributo(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se ha editado exitosamente el grupo atributo',
                    showConfirmButton: false,
                    timer: 1500
                });
            },

            SweetalertAñadirGrupoAtributo(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se ha guardado exitosamente el grupo atributo',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
        
            Atributo(){
                let me=this;
                axios.get('/grupoatributo/'+this.grupoAtributo).then(res=>{
                    $("#myTable").dataTable().fnDestroy();
                    me.tabla();
                    me.listado=3;
                    
                    me.arrayAtributo = res.data;
                   
                    

                })


            },
            volverGrupoAtributo(){
                window.location = '/grupoatributos';    
            },
            mostrarFormularioNuevoGrupoAtributo(){
                let me=this;
                me.listado=0;
            
            },
            ocultarDetalle(){
                let me=this;
                me.grupo='';
                me.orden='';
                me.listado=1;
                me.tabla();
            },
            cerrarModal(){
                this.modal=0;
            }, 
            abrirFormulario(modelo, accion, data = []){
                switch(modelo){
                    case "grupoatributo":
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
                                this.grupo = data['grupo'];
                                this.orden= data['orden'];
                                break;
                            }
                            case 'eliminar':
                            {
                                console.log(data);
                                this.EliminarGrupoAtributo();
                                this.id=data['id'];
                                break;
                            }
                            case 'atributo':
                            {
                                console.log(data);
                                this.grupoAtributo=data['id'];
                              
                                this.Atributo();
                                
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


    .icon-circular{
         width: 29px;
        height: 29px;
        border-radius: 50%;
        background-size: cover;
        background-position: top center;
        border: 2px solid;
        padding: 5px 0px 0px 1px;
        margin-right:5px;
    }

    @media only screen and (max-width: 10000px) and (min-width: 320px)  {

        /*.circular-image img{
            width: 40px;
            height: 40px;

            background-size: cover;

            background-position: top center;

            border-radius: 50%;
            margin-left: 10px;margin-right: auto;
            
        }

        .circular-image {

            width:2%;
            
        }*/


        .widthOpcionesGrupoAtributo{
            width: 2%;
            
        }
        .idGrupoAtributo{
            width: 1%;
        }
        .grupoGrupoAtributo{
            width: 10%;
        }
        .ordenGrupoAtributo{
            width: 13%;
        }
        .estadoGrupoAtributo{
            width: 10%;
        }

        .widthOpcionesAtributo{
            width: 1%;
            
        }
        .idgrupoAtributodeatributo{
            width:10%;
        }
        .idAtributo{
            width: 10%;
        }
        .Atributo{
            width: 10%;
        }
        .ordenAtributo{
            width: 10%;
        }
        .estadoAtributo{
            width: 10%;
        }
        .widthOpcionesGrupoAtributo button,
        .widthOpcionesAtributo button{
            font-size: 11px;
            
        }
            

    }



   

    </style>

