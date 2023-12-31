<?php
    include("../../layouts/pages/header.html")
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Usuarios</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user mr-1"></i>
                  Listado
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body p-0">

                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
                </div>

              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th style="width: 40px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Juan</td>
                      <td>juan@email.com</td>
                      <td>
                        <button class="btn btn-success" onclick="editar('Juan', 'juan@email.com')">Editar</button>
                        <br><br>
                        <button class="btn btn-danger" onclick="eliminar('Juan')">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Ana</td>
                      <td>ana@email.com</td>
                      <td>
                      <button class="btn btn-success" onclick="editar('Ana', 'ana@email.com')">Editar</button>
                        <br><br>
                        <button class="btn btn-danger" onclick="eliminar('Ana')">Eliminar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    function eliminar(usuario) {
        Swal.fire({
            title: "¿Estas seguro de eliminar al usuario " + usuario + "?",
            text: "No se pueden revertir los cambios",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            console.log(result)
            if (result.isConfirmed) {

                // aquí definimos la petición para eliminar el usario en el backend

                Swal.fire({
                    title: "Usuario " + usuario + " eliminado",
                    icon: "success",
                    position: "top",
                    showConfirmButton: false,
                    timer: 2500,
                    toast: true
                })
            }
        })
    }

    async function editar(usuario, correo) {
        const { value: valores } = await Swal.fire({
            title: "Editar usuario " + usuario,
            showCancelButton: true,
            confirmButtonColor: "green",
            confirmButtonText: "Editar",
            cancelButtonText: "Cancelar",
            html: `
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-3 col-form-label">Usuario</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre" value="${usuario}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="correo" value="${correo}">
                        </div>
                    </div>
                </div>
            `,
            preConfirm: () => {
                return [
                    document.getElementById('nombre').value,
                    document.getElementById('correo').value
                ]
            }
        })

        if (valores) {
            Swal.fire({
                    title: "Usuario " + usuario + " Editado",
                    text: `Se edito el nombre ${valores[0]} y el correo ${valores[1]}`,
                    icon: "success",
                    position: "top",
                    showConfirmButton: false,
                    timer: 2500,
                }) 
        }
        
    }
  </script>

<?php
    include("../../layouts/pages/footer.html")
?>