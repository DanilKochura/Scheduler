<?php

$adm = $user->getAccesssedUsers();
?>

<div id="wrapper">
	<?php include ROOT.'views/inc/sidebar.php'; ?>
	<main class="w-100">
		<div class="container p-3 py-4">
			<h2>Редактировать доступы</h2>
			<div class="row">
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
							 data-items-per-page="30"

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
						<th>Редактирование</th>
						<th>Комментирование</th>
						<th>Дедлайны</th>
                        <th></th>
                        <th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($adm as $admission): ?>
                        <tr>
                            <td><?=$admission['name']?></td>
                            <td><?=$admission['email']?></td>
                            <td><i class="fi fi-<?=$admission['adding'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><i class="fi fi-<?=$admission['edit'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><i class="fi fi-<?=$admission['comment'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><i class="fi fi-<?=$admission['deadlines'] == 1 ? 'plus text-success' : 'minus text-danger'?>"></i></td>
                            <td><a href="#" class="edit-admission" data-id="<?=$admission['aid']?>"
                                   data-add="<?=$admission['adding']?>"
                                   data-edit="<?=$admission['edit']?>"
                                   data-dead="<?=$admission['deadlines']?>"
                                   data-comment="<?=$admission['comment']?>"
                                   data-user="<?=$admission['email']?>"
                                   data-userid="<?=$admission['uid']?>">
                                    <i class="fi fi-pencil edit-admission text-dark"

                                    ></i>
                                </a>
                            </td>
                            <td><a href="#" data-href="https://imdibil.ru/scheduler/assets/js/ajax/delete_adm.php?id=<?=$admission['aid']?>"
                                   class="js-ajax-confirm"

                                   data-ajax-confirm-mode="ajax"
                                   data-ajax-confirm-method="POST"
                                   data-ajax-params = "[test, 1]"
                                   data-ajax-confirm-title="Подтвердите удаление!"
                                   data-ajax-confirm-body="Уверены, что хотите закрыть пользоваелю доступ к вашей доске?"

                                   data-ajax-confirm-btn-yes-class="btn-sm btn-primary"
                                   data-ajax-confirm-btn-yes-text="Подтвердить"
                                   data-ajax-confirm-btn-yes-icon="fi fi-check"

                                   data-ajax-confirm-btn-no-class="btn-sm btn-light"
                                   data-ajax-confirm-btn-no-text="Закрыть"
                                   data-ajax-confirm-btn-no-icon="fi fi-close"
                                   data-ajax-confirm-type="danger"
                                   data-ajax-confirm-callback-function="redirect_5">
                                    <i class="fi fi-thrash text-danger"></i>
                                </a></td>
                        </tr>

                    <?php endforeach; ?>
					</tbody>

				</table>
			</div>
            <div class="row">
                <button type="button"class="btn btn-warning mx-3 w-100-xs w-25" data-bs-toggle="modal" data-bs-target="#add-admission">Добавить пользователя</button>
            </div>
		</div>
	</main>
</div>


<div class="modal fade" id="edit-admission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelSm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelSm">Редактирование доступа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?=PATH?>controller/edit_adm.php" method="post">
                <div class="modal-body">
                    <p>Пользователь: <span class="username"></span></p>
                    <input type="hidden" name="admission_id" id="admission_id">
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="adding" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Добавление</span>
                    </label>
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="edit" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Редактирование</span>
                    </label>
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="comment" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Комментирование</span>
                    </label>
									<label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="deadlines" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Дедлайны</span>
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
<div class="modal fade" id="add-admission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelSm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelSm">Редактирование доступа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?=PATH?>controller/add_adm.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="name" required class="form-control input-suggest" id="input_search_country" value=""
                           placeholder="Имя или почта"
                           data-input-suggest-mode="self"
                           data-input-suggest-typing-delay="300"
                           data-input-suggest-typing-min-char="2"
                           data-input-suggest-ajax-url="https://imdibil.ru/scheduler/assets/js/ajax/user_list.php"
                           data-input-suggest-ajax-method="GET"
                           data-input-suggest-ajax-action="user_search"
                           data-input-suggest-ajax-limit="20">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="admission_id" id="admission_id">
                    <label class="d-flex align-items-center mb-3 mt-3">
                        <input class="d-none-cloaked" type="checkbox" name="adding" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Добавление</span>
                    </label>
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="edit" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Редактирование</span>
                    </label>
                    <label class="d-flex align-items-center mb-3">
                        <input class="d-none-cloaked" type="checkbox" name="comment" value="1" >
                        <i class="switch-icon"></i>
                        <span class="px-3 user-select-none">Комментирование</span>
                    </label>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success text-white">
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