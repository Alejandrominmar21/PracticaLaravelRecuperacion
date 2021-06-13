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
                    <a href="<?php echo e(route('actividades.create')); ?>"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear una actividad</button></a>
                    <form>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="aforo">Filtrar por Aforo</label>
                        <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="aforo" type="number" placeholder="Aforo">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Filtrar</button>
                    </form>
                    <table class="table-auto"style="width: 70%">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Aforo</th>                          
                        </tr>
                        <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($actividad->nombre); ?></td>
                                <td><?php echo e($actividad->descripcion); ?></td>
                                <td><?php echo e($actividad->aforo); ?></td>  
                                <td>   <a href="<?php echo e(route('actividades.edit', $actividad->id)); ?>"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button></a></td>         
                                <td><form action="<?php echo e(route('actividades.destroy', $actividad)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?><button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Eliminar</button></form></td>                     
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </table>  
                    <?php echo e($actividades->links()); ?>                  
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\practicaLaravel\resources\views/actividades/index.blade.php ENDPATH**/ ?>