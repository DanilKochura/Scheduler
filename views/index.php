<?php

$t1 = count($tasks->new);
$t2 = count($tasks->work);
$t3 = count($tasks->done);
$tasks->done = array_slice($tasks->done, 0 ,8);
    ?>

	<div class="container mb-5">

        <div class="row mt-3">
			<div class="col-6 col-sm-6 col-md-4 mb-4-xs">

				<div class="bg-secondary rounded-3 task-dark-theme">

					<div class="row mx-0">
						<div class="col-1 p-3 fi fi-bell-active text-warning fs-5">
						</div>
						<div class="col p-3 text-warning fs-5">
							Новое
						</div>
							<?php if($tasks->add): ?>
								<div class="col text-end">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Добавить задачу">
                                         <i class="fi fi-plus py-3 fs-5 text-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalMd">
                                         </i>
                                    </span>

								</div>

						<?php endif; ?>
					</div>
					<div class="pb-4">
                        <div class="list-group sortable" data-shared-group="client-list"
                             data-ajax-update-url="assets/js/ajax/sort.php"
                             data-ajax-update-identifier="client_list_1"
                             data-ajax-update-params="['action','update']"
                             data-update-toast-position="bottom-center"
												data-type="1">
						<?php foreach($tasks->new as $task): ?>

							<div data-id="<?=$task->id?>" data-title="<?=$task->title?>" data-priority="<?=$task->priority?>" class="row bg-white mb-2 mx-3 rounded-3 text-dark list-item <?=$set->filled ? 'bg-filled' : ''?>">
								<div class="align-items-center col-1 d-flex priority-flag" data-priority="<?=$task->priority?>">
									<i class="fi fi fi-arrow-end-full fs-5 fs-5"></i>
								</div>
								<div class="col py-2">
									<div class="row">
                                        <div <?php if($tasks->edit) echo 'class="input-group-over edit" id="task_edit" contenteditable="true"'; ?>>
                                            <?=$task->title?>
                                        </div>
									</div>
									<div class="row">
										<div class="col-6">
										<time class="text-secondary fs-7"><?=$task->created_at->format('d.m.y H:i')?></time>
										</div>
											<?php if($task->deadline): ?>
											<div class="col-6">
										<time class="text-end <?=$task->deadline > new DateTime() ? 'text-success' : 'text-danger'?> fs-7"><?=$task->deadline->format('d.m.y H:i')?></time></div>
										<?php endif;?>
										<!--										<time class="sow-util-timeago text-secondary fs-7"-->
<!--													datetime="--><?php //=$task->created_at->format('Y-m-d\TH:i:d')?><!--"-->
<!--													data-live="true"-->
<!--													data-lang='{-->
<!--                                            "seconds"	 : "Несколько секунд назад",-->
<!--                                            "minute"		: "Около минуты назад",-->
<!--                                            "minutes"	 : "%d минут назад",-->
<!--                                            "hour"			: "Около часа назад",-->
<!--                                            "hours"		 : "Около %d часов назад",-->
<!--                                            "day"			 : "Вчера",-->
<!--                                            "days"			: "%d дней назад",-->
<!--                                            "month"		 : "Около месяца назад",-->
<!--                                            "months"		: "%d месяцев назад",-->
<!--                                            "year"			: "Около года назад",-->
<!--                                            "years"		 : "%d лет назад"-->
<!--                                        }'></time>-->
									</div>
								</div>
								<div class="col-2 py-2 d-flex align-items-center mr-2-xs">
									<?php if($tasks->edit): ?>
										<i class="fi fi-search edit-task" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalTask"></i>

									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
                        </div>
					</div>
				</div>

			</div>
			<div class="col-6 col-sm-6 col-md-4 mb-4-xs">
				<div class="bg-secondary rounded-3">
					<div class="row mx-0">
						<div class="col-1 p-3 fi fi-power text-warning fs-5">
						</div>
						<div class="col p-3 text-warning fs-5">
							В работе
						</div>
					</div>

                    <div class="pb-4">
                        <div class="list-group sortable" data-shared-group="client-list"
                             data-ajax-update-url="assets/js/ajax/sort.php"
                             data-ajax-update-identifier="client_list_2"
                             data-ajax-update-params="['action','update']"
                             data-update-toast-position="bottom-center" data-type="2">
                            <?php foreach($tasks->work as $task): ?>
                                <div data-id="<?=$task->id?>" data-priority="<?=$task->priority?>" class="row mx-3 bg-white text-dark list-item rounded-3 mb-2 <?=$set->filled ? 'bg-filled' : ''?>">
                                       <div class="align-items-center col-2 d-flex priority-flag" data-priority="<?=$task->priority?>">
                                           <i class="fi fi-arrow-right-3 text-primary fs-3"></i>
                                        </div>
                                    <div class="col py-2">
                                        <div class="row">
                                            <div class="" id="task_edit" >
                                                <?=$task->title?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <time class="sow-util-timeago text-secondary fs-7"
                                                        datetime="<?=$task->updated_at->format('Y-m-d\TH:i:d')?>"
                                                        data-live="true"
                                                        data-lang='{
                                                "seconds"	 : "Несколько секунд",
                                                "minute"		: "Около минуты",
                                                "minutes"	 : "%d минут",
                                                "hour"			: "Около часа",
                                                "hours"		 : "%d часов",
                                                "day"			 : "Вчера",
                                                "days"			: "%d дней",
                                                "month"		 : "Около месяца",
                                                "months"		: "%d месяцев",
                                                "year"			: "Около года",
                                                "years"		 : "%d лет"
                                            }'></time>
                                        </div>
                                    </div>
                                    <div class="col-2 py-2 my-auto">
                                        <button class="btn edit-task mx-n3" type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i class="fi fi-search"></i></button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>

			</div>
			<div class="col-6 col-sm-6 col-md-4">

				<div class="bg-secondary rounded-3">

					<div class="row mx-0">
						<div class="col-1 p-3 fi fi-box-checked text-warning fs-5">
						</div>
						<div class="col p-3 text-warning fs-5">
							Выполнено
						</div>
					</div>

                    <div class="pb-4">
                        <div class="list-group sortable" data-shared-group="client-list"data-ajax-update-url="assets/js/ajax/sort.php"
														 data-ajax-update-identifier="client_list_3"
														 data-ajax-update-params="['action','update']"
														 data-update-toast-position="bottom-center" data-type="3">
                            <?php foreach($tasks->done as $task): ?>
                                <div data-id="<?=$task->id?>" data-priority="<?=$task->priority?>" class="row mx-3 bg-white text-dark rounded-3 mb-2 list-item <?=$set->filled ? 'bg-filled' : ''?>">
                                    <div class="align-items-center col-1 d-flex priority-flag" data-priority="<?=$task->priority?>">
                                        <i class="fi fi-arrow-end-full fs-5 fs-5"></i>
                                    </div>
                                    <div class="col py-2">
                                        <div class="row">
                                            <div id="task_edit">
                                                <?=$task->title?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <time class="text-secondary fs-7"><?=$task->finished_at->format('d.m.y H:i')?></time>
                                            <!--										<time class="sow-util-timeago text-secondary fs-7"-->
                                            <!--													datetime="--><?php //=$task->created_at->format('Y-m-d\TH:i:d')?><!--"-->
                                            <!--													data-live="true"-->
                                            <!--													data-lang='{-->
                                            <!--                                            "seconds"	 : "Несколько секунд назад",-->
                                            <!--                                            "minute"		: "Около минуты назад",-->
                                            <!--                                            "minutes"	 : "%d минут назад",-->
                                            <!--                                            "hour"			: "Около часа назад",-->
                                            <!--                                            "hours"		 : "Около %d часов назад",-->
                                            <!--                                            "day"			 : "Вчера",-->
                                            <!--                                            "days"			: "%d дней назад",-->
                                            <!--                                            "month"		 : "Около месяца назад",-->
                                            <!--                                            "months"		: "%d месяцев назад",-->
                                            <!--                                            "year"			: "Около года назад",-->
                                            <!--                                            "years"		 : "%d лет назад"-->
                                            <!--                                        }'></time>-->
                                        </div>
                                    </div>

                                    <div class="col-2 py-2 my-auto mr-2-xs">
                                         <button class="btn edit-task mx-n3" type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i class="fi fi-search"></i></button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="bg-warning mt-3 mx-3 mx-auto py-2 rounded-3 text-center w-50">
                            <a href="https://imdibil.ru/scheduler/profile/history" class="text-white">Предыдущие</a>
                        </div>
                    </div>

                </div>

			</div>
		</div>
	</div>

<div class="bg-secondary position-sticky top-100 mt-7" style="min-height: 50px;">
    <div class="container text-white">
        <div class="text-center" style="padding-top: .8rem!important;">
            2023 Tusk Runner
        </div>
    </div>
</div>

    <!--Modal new task-->
	<div class="modal fade" id="exampleModalMd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelMd" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabelMd">Добавить задачу</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<div id="alert_success" class="alert alert-success hide-force">
					Задача успешно создана!
				</div>

				<!-- error inline message -->
				<div id="alert_error" class="alert alert-danger hide-force">
					Пожалуйста, заполните это поле!
				</div>

				<!--
					NOTE: WE USE method="GET" insted of "POST" because this is a pure html demo
				-->
				<form class="js-ajax bs-validate" novalidate
							action="<?=PATH?>assets/js/ajax/new_task.php"
							method="POST"

							data-ajax-inline-alert-succes="#alert_success"
							data-ajax-inline-alert-error="#alert_error"

							data-ajax-update-url="true"
							data-ajax-show-loading-icon="true"

							data-error-scroll-up="true"
							data-ajax-callback-function="callback_refresh">


					<div class="form-floating mb-3">
						<input required type="text" class="form-control" name="TaskTitle" id="TaskTitle" placeholder="Название">
						<label for="TaskTitle">Название</label>
					</div>

					<div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="responsible" aria-label="Floating label select example">
															<option value="<?=$user->id?>"><?=$user->name?></option>
                                <?php foreach($user->admissions as $a): ?>

                                    <?php if($a['adding']): ?>
                                        <option value="<?=$a['uid']?>" <?=$did == $a['uid'] ? 'selected' : ''?>><?=$a['name']?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Ответственный</label>
                        </div>
                    </div>

					<div class="form-floating mb-3">
						<textarea name="descr" id="editor-decr-new"class="summernote-editor w-100"
											data-summernote-config='{
						"placeholder":	"Напишите текст...",
						"focus":		false,
						"lang":			"en-US",
						"minHeight":	 300,
						"maxHeight":	 1500,

						" styleTags": ["h2","h3","h4","h5","h6"

							,{
								"title"		:"Paragraph",
								"tag"		:"p",
								"value"		:"p",
								"className"	:""
							}

							,{
								"title"		:"Paragraph Lead",
								"tag"		:"p",
								"value"		:"p",
								"className"	:"lead"
							}

						],

						"toolbar": [
							["font", ["bold", "italic", "underline", "clear"]],
							["para", ["ul", "ol", "paragraph"]],
							["insert", ["link", "picture", "video", "hr"]],
							["view", ["fullscreen", "codeview", "help"]]
						],

						"disableDragAndDrop":	 false,
						"codeviewFilter":		 false,
						"codeviewIframeFilter":	 true
					}'></textarea>

					</div>

					<div class="form-floating mb-3">
						<label for="customRange1" class="form-label">Приоритет: <span id="priorityVal">Средний</span></label>
						<input type="range" class="form-range" id="priority" name="priority">
					</div>
					<?php if($tasks->deadlines): ?>
					<div class="form-floating mb-3">
						<div class="row mt-5">
							<p class="mb-0">Дедлайн</p>
							<div class="col-7">
								<input type="text" name="date" class="form-control datepicker"
											 data-show-weeks="true"
											 data-today-highlight="true"
											 data-today-btn="true"
											 data-clear-btn="false"
											 data-autoclose="true"
											 data-date-start="today"
											 data-format="MM/DD/YYYY">
							</div>
							<div class="col-2">
								<select name="hours"  class="form-select"id="">
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12" selected>12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
								</select>
							</div>
							<div class="col-3">
								<select name="minutes"  class="form-select"id="">
									<option value="00" selected>:00</option>
									<option value="10">:10</option>
									<option value="20">:20</option>
									<option value="30">:30</option>
									<option value="40">:40</option>
									<option value="50">:50</option>

								</select>
							</div>
						</div>
					</div>
					<?php endif; ?>

				</div>


				<div class="modal-footer">
					<button type="submit" class="btn btn-success text-white">
						<i class="fi fi-check"></i>
						Добавить
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
    <!--/Modal new task-->

    <!--Modal edit task-->
    <div class="modal fade" id="exampleModalTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalTask" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelTask">Изменить задачу</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id="alert_success" class="alert alert-success hide-force">
                        Задача успешно изменена!
                    </div>

                    <!-- error inline message -->
                    <div id="alert_error" class="alert alert-danger hide-force">
                        Пожалуйста, заполните это поле!
                    </div>

                    <!--
                        NOTE: WE USE method="GET" insted of "POST" because this is a pure html demo
                    -->
                    <form class="js-ajax bs-validate" novalidate action="<?=PATH?>assets/js/ajax/edit_task.php" method="POST"

                          data-ajax-inline-alert-succes="#alert_success"
                          data-ajax-inline-alert-error="#alert_error"

                          data-ajax-update-url="true"
                          data-ajax-show-loading-icon="true"

                          data-error-scroll-up="true"
                          data-ajax-callback-function="callback1">

                        <script>
                            function callback1(){
                                $('#exampleModalTask').modal('hide');
                                $.SOW.core.toast.show('success', '', 'Задача успешно изменена!', 'top-center', 4000, true);
                            }

                            function callback_refresh()
                            {
                                // setTimeout(window.location.reload(), 5000);
                            }
                        </script>
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="edit_title" id="TaskTitle" placeholder="Название">
                            <label for="TaskTitle">Название</label>
                        </div>
                        <input type="hidden" name="alternate_decr" id="alt_descr">
                        <input type="hidden" name="id" id="task-id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="edit_responsible" aria-label="Floating label select example">
																			<option value="<?=$user->id?>"><?=$user->name?></option>
                                        <?php foreach($user->admissions as $a): ?>

                                            <?php if($a['adding']): ?>
                                                <option value="<?=$a['uid']?>"><?=$a['name']?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="floatingSelect">Ответственный</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input required disabled type="text" class="form-control" name="author" id="author" placeholder="Автор">
                                <label for="author"></label>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
						<textarea name="edit_descr" id="editor-decr-new"class="summernote-editor w-100"
                                  data-summernote-config='{
						"placeholder":	"Напишите текст...",
						"focus":		false,
						"lang":			"en-US",
						"minHeight":	 300,
						"maxHeight":	 1500,

						" styleTags": ["h2","h3","h4","h5","h6"

							,{
								"title"		:"Paragraph",
								"tag"		:"p",
								"value"		:"p",
								"className"	:""
							}

							,{
								"title"		:"Paragraph Lead",
								"tag"		:"p",
								"value"		:"p",
								"className"	:"lead"
							}

						],

						"toolbar": [
							["font", ["bold", "italic", "underline", "clear"]],
							["para", ["ul", "ol", "paragraph"]],
							["insert", ["link", "picture", "video", "hr"]],
							["view", ["fullscreen", "codeview", "help"]]
						],

						"disableDragAndDrop":	 false,
						"codeviewFilter":		 false,
						"codeviewIframeFilter":	 true
					}'></textarea>

                        </div>

                        <div class="form-floating mb-3">
                            <label for="customRange1" class="form-label">Приоритет: <span id="priorityVal">Средний</span></label>
                            <input type="range" class="form-range" id="priority" name="edit_priority">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger text-white">
                        <i class="fi fi-check"></i>
                        Заморозить
                    </button>
                    <button type="submit" class="btn btn-success text-white">
                        <i class="fi fi-check"></i>
                        Изменить
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

    <!--/Modal edit task-->


<!--    offcanvas block-->
    <div class="offcanvas offcanvas-start w-100-xs" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Просмотр задачи</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <form class="js-ajax bs-validate" novalidate action="assets/js/ajax/edit_task.php" method="POST">
                    <div class="form-floating mb-3">
                        <input required readonly type="text" class="form-control" name="edit_title" id="TaskTitle" placeholder="Название" autocomplete="off">
                        <label for="TaskTitle">Заголовок</label>

                    </div>
                    <p name="alternate_decr" id="alt_descr"></p>
                    <input disabled type="hidden" name="id" id="task-id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select disabled class="form-select" id="floatingSelect" name="edit_responsible" aria-label="Floating label select example">
																	<option value="<?=$user->id?>"><?=$user->name?></option>

                                    <?php foreach($user->admissions as $a): ?>
                                        <?php if($a['adding']): ?>
                                            <option value="<?=$a['uid']?>"><?=$a['name']?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <label for="floatingSelect">Ответственный</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <input disabled required type="text" class="form-control" name="author" id="author" placeholder="Название">
                            <label for="author"></label>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="customRange1" class="form-label">Приоритет: <span id="priorityVal">Средний</span></label>
                        <input disabled type="range" class="form-range" id="priority" name="edit_priority">
                    </div>

										<div id="alt-descr" class ="border border-4 border-dashed descr-show my-3 p-2" name="edit_descr"></div>

                    <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="offcanvas">
                        <i class="fi fi-close"></i>
                        Закрыть
                    </button>
                    <button type="submit" class="btn btn-danger text-white float-end">
                        <i class="fi fi-check"></i>
                        Заморозить
                    </button>
                </form>

            </div>
            <div class="comments mt-2">

            </div>
            <div id="alert_error" class="alert alert-danger hide-force">
                Please, review your data and try again!
            </div>

            <!--
                NOTE: WE USE method="GET" insted of "POST" because this is a pure html demo
            -->
            <form class="js-ajax bs-validate p-4" novalidate
                  action="https://imdibil.ru/scheduler/assets/js/ajax/new_comment.php"
                  method="POST"

                  data-ajax-inline-alert-succes="#alert_success"
                  data-ajax-inline-alert-error="#alert_error"

                  data-ajax-update-url="false"
                  data-ajax-show-loading-icon="true"

                  data-error-scroll-up="true"
                  data-ajax-callback-function="callback_refresh">
                <input type="hidden" name="id_task" id="id_task">
                <textarea type="text" name="text" placeholder="Комментарий" class="form-control mb-3"></textarea>
                <button type="submit" class="btn btn-warning">Отправить</button>
            </form>
						<div class="row">
							<div class="col com-block">
							</div>
						</div>



        </div>
    </div>

    <!--    /offcanvas block-->

<!-- Вариант блока задачи с цветовым фоном вместо спина-->

    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelSm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    Вы уверены?
                </div>

                <div class="modal-footer">

                    <button type="button" id="confirm-true" class="btn text-white btn-success">
                        <i class="fi fi-check"></i>
                        Да. сохранить
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fi fi-close"></i>
                        Закрыть
                    </button>

                </div>

            </div>
        </div>
    </div>

   <!-- <div data-id="15" data-upd="0:22:29" class="bg-primary list-item mb-2 mx-3 px-2 rounded-3 row text-dark text-white">

        <div class="col py-2">
            <div class="row">
                <div class="input-group-over edit" id="task_edit" contenteditable="true">
                    ну да dsf                                            </div>
            </div>
            <div class="row">
                <time class="fs-7 js-sowtimeagofied sow-util-timeago text-white-50" datetime="2023-01-17T22:43:17" data-live="true" data-lang="{
                                                &quot;seconds&quot;	 : &quot;Несколько секунд&quot;,
                                                &quot;minute&quot;		: &quot;Около минуты&quot;,
                                                &quot;minutes&quot;	 : &quot;%d минут&quot;,
                                                &quot;hour&quot;			: &quot;Около часа&quot;,
                                                &quot;hours&quot;		 : &quot;%d часов&quot;,
                                                &quot;day&quot;			 : &quot;Вчера&quot;,
                                                &quot;days&quot;			: &quot;%d дней&quot;,
                                                &quot;month&quot;		 : &quot;Около месяца&quot;,
                                                &quot;months&quot;		: &quot;%d месяцев&quot;,
                                                &quot;year&quot;			: &quot;Около года&quot;,
                                                &quot;years&quot;		 : &quot;%d лет&quot;
                                            }" id="rand_128">35 минут</time>
            </div>
        </div>
        <div class="col-2 py-2">

            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fi fi-search"></i></button>

            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasTopLabel">Редактировать задачу</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <p>
                        Тут будет текст
                    </p>
                </div>
            </div>
        </div>
    </div>-->

<!-- /Вариант блока задачи с цветовым фоном вместо спина-->