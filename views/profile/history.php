<div id="wrapper">
    <?php include ROOT.'views/inc/sidebar.php';  $ts = new \models\TaskService(); $tasks = $ts->getFinishedMonth($user->id)?>
    <main class="w-100 container">
        <div class="container p-3 py-4">
            <h2>История</h2>
        </div>

        <table class="table-datatable table table-bordered table-hover table-striped"
               data-lng-empty="No data available in table"
               data-lng-page-info="Отображается _START_ из _END_ на _TOTAL_ странице"
               data-lng-filtered="(filtered from _MAX_ total entries)"
               data-lng-loading="Загрузка..."
               data-lng-processing="Подождите немного..."
               data-lng-search="Поиск..."
               data-lng-norecords="Я ничего не нашел :("
               data-lng-sort-ascending=": activate to sort column ascending"
               data-lng-sort-descending=": activate to sort column descending"

               data-main-search="true"
               data-column-search="false"
               data-row-reorder="false"
               data-col-reorder="true"
               data-responsive="true"
               data-header-fixed="true"
               data-select-onclick="true"
               data-enable-paging="true"
               data-enable-col-sorting="true"
               data-autofill="false"
               data-group="false"
               data-items-per-page="30"

               data-enable-column-visibility="true"
               data-lng-column-visibility="Отображение столбцов"

               data-enable-export="true"
               data-lng-export="<i class='fi fi-arrow-download fs-6'></i>"
               data-lng-csv="CSV"
               data-lng-pdf="PDF"
               data-lng-xls="XLS"
               data-lng-copy="Копировать"
               data-lng-print="Печать"
               data-lng-all="Все"
               data-export-pdf-disable-mobile="true"
               data-export='["csv", "pdf", "xls"]'
               data-options='["copy", "print"]'

               data-custom-config='{}'>
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Дата создания</th>
                    <th>Дата завершения</th>
                    <th>Автор</th>
                    <th>Приоритет</th>
                    <th>Комментарий</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($tasks as $task): ?>
                    <tr>
                        <td><?=$task->title?></td>
                        <td><?=$task->created_at?></td>
                        <td><?=$task->finished_at?></td>
                        <td><?=$task->created_by?></td>
                        <td><?=$task->priority?></td>
                        <td>[В разработке]</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <th>Название</th>
                    <th>Дата создания</th>
                    <th>Дата завершения</th>
                    <th>Автор</th>
                    <th>Приоритет</th>
                    <th>Комментарий</th>
                </tr>
            </tfoot>
        </table>

        <div class="mt-3 w-250 bg-warning mb-3 p-2 rad-10 text-center">
            <a class="text-white" href="https://imdibil.ru/scheduler/">Добавить задачу</a>
        </div>

    </main>
</div>