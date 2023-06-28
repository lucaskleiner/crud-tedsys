

<?php $__env->startSection('content'); ?>
    <h1>Pacientes</h1>

    <a href="<?php echo e(route('pacientes.create')); ?>" class="btn btn-primary">Novo Paciente</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($paciente->id); ?></td>
                    <td><?php echo e($paciente->nome); ?></td>
                    <td><?php echo e($paciente->cpf); ?></td>
                    <td><?php echo e($paciente->telefone); ?></td>
                    <td><?php echo e($paciente->email); ?></td>
                    <td>
                        <a href="<?php echo e(route('pacientes.edit', $paciente->id)); ?>" class="btn btn-sm btn-primary">Editar</a>
                        <form action="<?php echo e(route('pacientes.destroy', $paciente->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-9-vite-crud\resources\views/pacientes/index.blade.php ENDPATH**/ ?>