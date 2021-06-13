<?php use App\Http\Controllers\TramoController; ?>
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
                    <a href="<?php echo e(route('tramos.create')); ?>"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear un tramo</button></a>
                    <a href="<?php echo e(route('tramosPdf')); ?>" style="padding-left: 10%"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Generar PDF   </button></a>
    
                    <table class="table-auto"style="width: 60%">
                        <tr>
                            <th>Hora</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>          
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sábado</th>
                          </tr> 
                        <?php $__currentLoopData = $horas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($hora); ?></td>
                                <?php $__currentLoopData = $dias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $tramos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tramo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $ocupado=false; ?>
                                        <?php if($tramo->dia == $dia): ?>
                                            <?php if($tramo->horainicio == $hora || $tramo->horafin == $hora): ?>
                                                <td><form action="<?php echo e(route('tramo_user.store')); ?>" method="POST"><?php echo csrf_field(); ?>
                                                        <input name="tramo_id" type="hidden" value=<?php echo e($tramo->id); ?>>
                                                        <button type="submit"><?php echo e(TramoController::imprimirActividad($tramo->actividad_id)); ?></button>  
                                                    </form>
                                                    <form action="<?php echo e(route('tramos.destroy', $tramo)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                        <button type="submit"><img width='15' height='15' src='<?php echo e(asset('img/eliminar.png')); ?>'></button>
                                                    </form>
                                                </td> <?php $ocupado=true ?>
                                            <?php endif; ?>      
                                            <?php if($tramo->horainicio < $hora && $tramo->horafin > $hora): ?>
                                                <td>
                                                    <?php echo e(TramoController::imprimirActividad($tramo->actividad_id)); ?>

                                                </td> <?php $ocupado=true ?>
                                            <?php endif; ?>                                      
                                        <?php endif; ?>                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ocupado == false): ?>
                                        <td></td>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </table>  
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\wamp64\www\practicaLaravel\resources\views/tramos/index.blade.php ENDPATH**/ ?>