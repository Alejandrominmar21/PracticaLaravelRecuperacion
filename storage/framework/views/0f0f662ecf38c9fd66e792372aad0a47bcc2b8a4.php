<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 self-center">
                    <h1> Crear un usuario </h1>
                    <form action="<?php echo e(route('usuarios.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Nombre</label>
                        <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Nombre"><br>

                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">

                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
                        <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Contraseña"><br>
                        
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="avatar">Avatar POR HACER</label>
                        <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="avatar" type="file" ><br>

                        <label for="rol">Elige un rol:</label>
                        <select id="rol" name="rol">
                            <option value="usuario">usuario</option>
                            <option value="administrador">Administrador</option>
                        </select>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\practicaLaravel\resources\views/users/create.blade.php ENDPATH**/ ?>