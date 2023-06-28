<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('pageTitle', null, []); ?> 
        Tarefa List
     <?php $__env->endSlot(); ?>

    <?php if(session('success')): ?>
        <div class="max-w-4xl mx-auto mt-8 bg-green-700 text-white p-3 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="overflow-x-auto max-w-4xl mx-auto my-12 relative shadow-md sm:rounded-lg bg-white">
        <div class="p-5 bg-white flex items-center justify-between">
            <form action="<?php echo e(route('tarefas.index')); ?>" method="GET">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input name="query" value="<?php echo e(request('query')); ?>" type="text" id="table-search"
                        class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Search for items">
                </div>
            </form>

            <a href="<?php echo e(route('tarefas.create')); ?>"
                class="px-5 py-2 rounded-lg bg-gray-800 hover:opacity-80 text-white">Create Tarefa</a>
        </div>
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        No.
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Cover Image
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Content
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tarefa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td class="py-4 px-6 ">
                            <?php echo e($key + 1); ?>

                        </td>
                        <td class="py-4 px-6 ">
                            <?php echo e($tarefa->title); ?>

                        </td>
                        <td class="py-4 px-6">
                            <a href="<?php echo e(asset('storage/app/public/media/tarefas/' . $tarefa->cover_image)); ?>" target="blank">
                                <img src="<?php echo e(asset('storage/app/public/media/tarefas/' . $tarefa->cover_image)); ?>"
                                    alt="cover image" class="w-20 rounded">
                            </a>
                        </td>
                        <td class="py-4 px-6">
                            <?php echo e($tarefa->content); ?>

                        </td>
                        <td class="py-4 px-6 flex items-center gap-x-2.5">
                            <a href="<?php echo e(route('tarefas.edit', $tarefa->id)); ?>"
                                class="font-medium text-blue-600  hover:underline">
                                Edit
                            </a>

                            
                            <form action="<?php echo e(route('tarefas.destroy', $tarefa->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="font-medium text-red-600  hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h3 class="text-2xl text-center font-bold p-5">There is no tarefa found</h3>
                <?php endif; ?>
            </tbody>
        </table>

        
        <div class="p-4">
            <?php echo e($tarefas->links()); ?>

        </div>
    </div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel-9-vite-crud\resources\views/tarefas/index.blade.php ENDPATH**/ ?>