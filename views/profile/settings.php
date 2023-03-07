<?php

$adm = $user->getAccesssedUsers();
?>

<div id="wrapper">
    <?php include ROOT.'views/inc/sidebar.php'; ?>
    <?php if($user->id == 45): ?>
			<div class="container mt-2">
				<h2>Настройки задач</h2>

			<div class="row">
				<div class="col-sm-4">
					<div class="row">
						<label class="d-flex align-items-center mb-3">
							<input class="d-none-cloaked js-ajax" type="checkbox" name="bg-fill" value="1" ">
							<i class="switch-icon"></i>
							<span class="px-3 user-select-none">Использовать дедлайны</span>
						</label>
					</div>
					<div class="row">
						<select class="form-select form-select-sm" id="deadline-select" aria-label="Default select example">
							<option selected>Уведомлять за</option>
							<option value="1">1 час</option>
							<option value="2">6 часов</option>
							<option value="3">12 часов</option>
							<option value="3">12 часов</option>
						</select>
					</div>
				</div>
			</div>
			</div>
		<?php endif; ?>
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