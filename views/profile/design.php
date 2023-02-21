<?php
$set = (new \models\DeskSettings()); $set->get($user->id)
?>

<div id="wrapper">
    <?php include ROOT.'views/inc/sidebar.php'; ?>
    <main class="w-100">
        <div class="container p-3 py-4">
            <h2>Редактировать внешний вид</h2>


            <div class="row">
                <div class="col">
                    <!-- Ajax : Dynamic Progressbar -->
                    <label class="btn btn-warning cursor-pointer position-relative">

                        <input multiple type="file" name="ajax_files_progress_dynamic[]"
                               data-file-ext=""
                               data-file-max-size-kb-per-file=""
                               data-file-max-size-kb-total="0"
                               data-file-max-total-files="1"
                               data-file-ext-err-msg="Allowed:"
                               data-file-exist-err-msg="File already exists:"
                               data-file-size-err-item-msg="File too large!"
                               data-file-size-err-total-msg="Total allowed size exceeded!"
                               data-file-size-err-max-msg="Maximum allowed files:"
                               data-file-toast-position="bottom-center"
                               data-file-preview-container=".js-file-input-container-multiple-ajax-dynamic-progress"
                               data-file-preview-img-height="120"
                               data-file-preview-show-info="true"
                               data-file-preview-class="show-hover-container shadow-md m-2 rounded float-start"
                               data-file-preview-img-cover="false"

                               data-file-ajax-upload-enable="true"
                               data-file-ajax-upload-url="https://imdibil.ru/scheduler/assets/js/ajax/upload_image.php"
                               data-file-ajax-upload-params="['action','upload']['param2','value2']"

                               data-file-ajax-delete-enable="true"
                               data-file-ajax-delete-url="https://imdibil.ru/scheduler/assets/js/ajax/delete_image.php"
                               data-file-ajax-delete-params="['action','delete_file']"


                               data-file-ajax-toast-success-txt="Successfully Uploaded!"
                               data-file-ajax-toast-error-txt="One or more files not uploaded!"
                               data-file-ajax-progressbar-custom=""
                               data-file-ajax-progressbar-disable="false"
                               data-ajax-callback-function="callback_refresh"
                               class="custom-file-input absolute-full">

                        <span class="group-icon">
		<i class="fi fi-arrow-upload"></i>
		<i class="fi fi-circle-spin fi-spin"></i>
	</span>

                        <span>Загрузить свой фон</span>

                    </label>


                    <!--

                        Ajax container : files are pushed here!

                    -->
                    <div class="mt-3 js-file-input-container-multiple-ajax-dynamic-progress position-relative clearfix hide-empty">

                        <?php if($set->picture): ?>

                            <span data-id="0" data-file-name="filename.jpg" class="js-file-input-item d-inline-block position-relative overflow-hidden text-center show-hover-container shadow-md m-2 rounded float-start">

                        <!-- delete button -->
                        <a href="#" class="js-file-item-del position-absolute absolute-top show-hover-item left-0 z-index-2">
                            <span class="d-inline-block btn btn-sm bg-danger text-white py-1 px-2 m-1">
                                <i class="fi fi-close m-0"></i>
                            </span>
                        </a>

                                <!-- info : header -->
                        <span class="js-file-input-preview-header text-white position-absolute w-100 top-0 left-0 right-0 clearfix overlay-dark overlay-opacity-2">
                            <span class="text-truncate d-block smaller px-2">
                                <?=$set->picture?>
                            </span>
                        </span>

                                <!-- info : footer -->
                                <!--
                                    image

                                    height="120"	 same with file input attribute: data-file-preview-img-height="120"
                                    It's adjusted if not set but there is a small delay so height is recommended to avoid "jump" effect!

                                -->
                        <img height="120" src="https://imdibil.ru/scheduler/assets/images/uploads/<?=$set->picture?>" alt="...">

                    </span>
                        <?php endif; ?>

                    </div>

                </div>
                <div class="col-3">
                    <div class="checkgroup"
                         data-checkgroup-ajax-url="https://imdibil.ru/scheduler/assets/js/ajax/user_settings.php"
                         data-checkgroup-ajax-method="POST"
                         data-checkgroup-ajax-params="['method','fill']"
                         data-checkgroup-ajax-toast-success="Сохранено!"
                         data-checkgroup-ajax-toast-position="top-center">

                        <label class="d-flex align-items-center mb-3">
                            <input class="d-none-cloaked js-ajax" type="checkbox" name="bg-fill" value="1" <?=$set->filled ? ' checked ' : ''?>">
                            <i class="switch-icon"></i>
                            <span class="px-3 user-select-none">Заливка задач</span>
                        </label>

                    </div>

                </div>
            </div>
        <button class="btn-dark-them-click bg-gradient-dark mb-3 mt-4 p-2 rad-10 text-center w-250 text-white border-0">
            Перейти на тёмную сторону
        </button>
            <script>
                function callback_refresh()
                {
                    setTimeout(window.location.reload(), 5000);
                }
            </script>
<!--					<script>-->
<!--						function test()-->
<!--						{-->
<!--							alert(1);-->
<!--						}-->
<!--					</script>-->
<!--					<div class="row">-->
<!--						<div class="input-group-over position-realtive z-index-1">-->
<!---->
<!--							<input autocomplete="off" type="text" name="my_picker" class="form-control bg-transparent colorpicker"-->
<!--										 data-theme="classic"-->
<!--										 data-color="#ff0000"-->
<!---->
<!--										 data-hex="true"-->
<!--										 data-rgba="true"-->
<!--										 data-hsla="false"-->
<!--										 data-hsva="false"-->
<!--										 data-cmyk="false"-->
<!---->
<!--										 data-id="1"-->
<!--										 data-ajax-url="../demo.files/php/demo.ajax_request.php"-->
<!--										 data-ajax-params="['action','color_change']['section','customer_invoice']"-->
<!--										 data-ajax-method="POST"-->
<!--										 data-toast-success="Sucessfully Updated!"-->
<!--										 data-toast-position="bottom-center"-->
<!---->
<!--										 data-lng-save="Save"-->
<!--										 data-lng-clear="Clear"-->
<!---->
<!--										 data-position="bottom-middle"-->
<!--										 data-show-always="false"-->
<!--										 data-use-as-button="true"-->
<!--										 data-default="HEXA"-->
<!--							>-->
<!---->

<!--							<span class="fs-5 mx-3 fi mdi-format_color_fill z-index-n1 text-muted"></span>-->
<!---->
<!--						</div>-->
<!---->
<!--        </div>-->
    </main>
</div>

