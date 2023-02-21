<?php

$adm = $user->getAccesssedUsers();
$adm_o = $user->getAdmissions();
?>

<div id="wrapper">
    <?php include ROOT.'views/inc/sidebar.php'; ?>
    <main class="w-100">
        <div class="container p-3 py-4">
            <h2>Настройки уведомлений</h2>

            <div class="row mt-3">
                <h5>Уведомления с твоей доски</h5>
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
                       data-enable-paging="true"
                       data-enable-col-sorting="true"
                       data-autofill="false"
                       data-group="false"
                       data-items-per-page="5"

                       data-enable-column-visibility="true"
                       data-lng-column-visibility="Отображение столбцов"

                       data-enable-export="false"
                       data-lng-export="<i class='fi fi-squared-dots fs-5 lh-1'></i>"
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
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Добавление</th>
                        <th>Комментирование</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($adm as $admission): ?>
                        <tr>
                            <td><?=$admission['name']?></td>
                            <td><?=$admission['email']?></td>
                            <td><i class="fi fi-<?=$admission['add_note'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><i class="fi fi-<?=$admission['comm_note'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><a href="#" class="edit-admission-notes" data-id="<?=$admission['aid']?>"
                                   data-add="<?=$admission['add_note']?>"
                                   data-comm="<?=$admission['comm_note']?>"
                                   data-user="<?=$admission['email']?>"
                                   data-userid="<?=$admission['uid']?>">
                                    <i class="fi fi-pencil edit-admission text-dark"

                                    ></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
            <div class="row mt-3">
                <h5>Уведомления с досок, к которым тебя допустили</h5>
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
                       data-enable-paging="true"
                       data-enable-col-sorting="true"
                       data-autofill="false"
                       data-group="false"
                       data-items-per-page="5"

                       data-enable-column-visibility="true"
                       data-lng-column-visibility="Отображение столбцов"

                       data-enable-export="false"
                       data-lng-export="<i class='fi fi-squared-dots fs-5 lh-1'></i>"
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
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Выполнение задачи</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($adm_o as $admission): ?>
                        <tr>
                            <td><?=$admission['name']?></td>
                            <td><?=$admission['email']?></td>
                            <td><i class="fi fi-<?=$admission['finish_note'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><a href="#" class="edit-admissed-notes" data-id="<?=$admission['aid']?>"
                                   data-finish="<?=$admission['finish_note']?>"
                                   data-user="<?=$admission['email']?>"
                                   data-userid="<?=$admission['uid']?>">
                                    <i class="fi fi-pencil edit-admission text-dark"

                                    ></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>
</div>


<div class="modal fade" id="edit-admission-notes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelSm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelSm">Уведомления от вашей доски</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?=PATH?>assets/js/ajax/edit_note.php" method="post">
                <div class="modal-body">
                    <p>Пользователь: <span class="username"></span></p>
                    <input type="hidden" name="admission_id" id="admission_id">
                    <input type="hidden" name="type" id="admitted" value="admitted">
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="adding" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Добавление</span>
                    </label>
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="comment" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Комментирование</span>
                    </label>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fi fi-check"></i>
                        Сохранить
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fi fi-close"></i>
                        Закрыть
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="edit-admissed-notes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelSm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelSm">Уведомления от вашей доски</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?=PATH?>assets/js/ajax/edit_note.php" method="post">
                <div class="modal-body">
                    <p>Пользователь: <span class="username"></span></p>
                    <input type="hidden" name="admission_id" id="admission_id">
                    <input type="hidden" name="type" value="finished">
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="finished" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Завершение</span>
                    </label>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fi fi-check"></i>
                        Сохранить
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fi fi-close"></i>
                        Закрыть
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function redirect_5()
    {
        setTimeout(function () {
            window.location.reload()
        }, 2000)
    }

</script>