<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_users" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <td>
                                <?= $user['id'] ?>
                            </td>
                            <td>
                                <?= $user['full_name'] ?>
                            </td>
                            <td>
                                <?= $user['email'] ?>
                            </td>
                            <td>
                                <img src="<?= $url . 'assets/images/users/' . $user['photo'] ?>" alt="<?= $user['full_name'] ?>" class="img-fluid img-thumbnail" width="50">
                            </td>
                            <td>
                                <span class="badge <?= isset($user['status']) && $user['status'] == 1 ? 'bg-success' : (isset($user['status']) && $user['status'] == 2 ? 'bg-danger' : ''); ?>">
                                    <?= isset($user['status']) && $user['status'] == 1 ? 'Activo' : (isset($user['status']) && $user['status'] == 2 ? 'Inactivo' : ''); ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= $url . 'users/edit/' . $user['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button id="delete-user" data-id="<?= $user['id'] ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>