<aside id="aside-main" class="aside-start aside-hide-xs bg-white shadow-sm d-flex flex-column px-2 h-auto" style="border-bottom-right-radius: 10px;">


    <!-- sidebar : logo -->
    <!-- <div class="py-2 px-3 mb-3 mt-1">
        <a href="index.html">
            <img src="assets/images/logo/logo_dark.svg" width="110" height="60" alt="...">
        </a>
    </div> -->
    <!-- /sidebar : logo -->


    <!-- sidebar : navigation -->
    <div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">

        <!--

          All parent open navs are closed on click!
          To ignore this feature, add .js-ignore to .nav-deep

          Links height (paddings):
            .nav-deep-xs
            .nav-deep-sm
            .nav-deep-md

          .nav-deep-hover     hover background slightly different
          .nav-deep-bordered  bordered links

        -->
        <nav class="nav-deep nav-deep-sm nav-deep-light js-ajaxified mt-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-7">
                                <img src="<?=PATH?>assets/images/default.png" class="img-fluid rounded-circle"alt="">
                            </div>
                            <div class="row text-center">
                                <h4><?=$user->name?></h4>
                            </div>
                            <hr>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/"  rel="noopener">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                            <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"></path>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                        </svg>
                        <span>Личные данные</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/settings">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"></path>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"></path>
                        </svg>
                        <span>Настройки задач</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/notifications">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"></path>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"></path>
                        </svg>
                        <span>Уведомления</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/design">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"></path>
                            <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"></path>
                        </svg>
                        <span>Внешний вид</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/access">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                        </svg>
                        <span>Доступ к доскам</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/history">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"></path>
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"></path>
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"></path>
                        </svg>
                        <span>История</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/export">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                        </svg>
                        <span>Экспорт задач</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH?>profile/blog">
                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journal-code" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z"></path>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"></path>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"></path>
                        </svg>
                        <span>DevБлог</span>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
    <!-- /sidebar : navigation -->


    <!-- sidebar : footer -->
    <div class="d-flex align-self-baseline w-100 py-3 px-3 border-top border-light small">

        <p class="d-inline-grid gap-auto-3 mb-0">
            <svg class="text-gray-600" width="22px" height="22px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.052 512.052" fill="currentColor">
                <path d="M208.026,16.026c-114.7,0-208,78.9-208,176c0,39.8,15.7,77.9,44.5,108.9l-39.8,39.8c-4.6,4.6-6,11.5-3.5,17.4c2.5,6,8.3,9.9,14.8,9.9h192c114.7,0,208-78.9,208-176S322.726,16.026,208.026,16.026z"></path>
                <path opacity="0.5" d="M467.526,428.926c28.8-30.9,44.5-69.1,44.5-108.9c0-49.8-24.6-94.9-64-126.9c-0.9,114.1-108.2,206.9-240,206.9h-89.2c34.5,56.9,104.6,96,185.2,96h192c6.5,0,12.3-3.9,14.8-9.9c2.5-6,1.1-12.9-3.5-17.4L467.526,428.926z"></path>
                <path fill="#ffffff" d="M304.026,144.026h-192c-8.8,0-16,7.2-16,16s7.2,16,16,16h192c8.8,0,16-7.2,16-16S312.826,144.026,304.026,144.026z"></path>
                <path fill="#ffffff" d="M240.026,208.026h-128c-8.8,0-16,7.2-16,16s7.2,16,16,16h128c8.8,0,16-7.2,16-16S248.826,208.026,240.026,208.026z"></path>
            </svg>
            <a href="#" data-bs-toggle="modal" data-bs-target="#feedback" data-modal-size="modal-md" data-modal-centered="true" class="js-ajax-modal">
                Написать в поддержку
            </a>
        </p>

    </div>
    <!-- /sidebar : footer -->

</aside>

<!-- Модальное для feedback -->
<div id="feedback" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="modalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content container">
            <form class="js-ajax bs-validate" novalidate
                  action="<?=PATH?>assets/js/ajax/feedback.php"
                  method="POST"

                  data-ajax-container="#ajax_response_container"
                  data-ajax-update-url="false"
                  data-ajax-show-loading-icon="true"

                  data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i>Пожалуйста, заполните все обязательные поля!"
                  data-error-toast-delay="3000"
                  data-error-toast-position="top-center"

                  data-error-scroll-up="true"
                  data-ajax-callback-function="callback1">

                <div class="row mx-auto p-4">

                    <div class="col-12 mb-4">
                        <h3>Написать в поддержку</h3>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-floating">
                            <input type="text" disabled id="fname" name="" class="form-control" value="<?=$user->name?>" placeholder="Имя">
                            <label for="fname">Имя</label>
                        </div>
                        <input type="hidden" id="feedback_name" name="name" class="form-control" value="<?=$user->name?>">
                        <input type="hidden" id="" name="id" class="form-control" value="<?=$user->id?>">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-floating">
                            <input type="email" id="feedback_email" name="email" class="form-control" value="<?=$user->email?>" placeholder="Email">
                            <label for="feedback_email">Email</label>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-floating">
                            <select class="form-select js-ajax" required name="type" aria-label="Default select example">
                                <option value="1">Технический вопрос</option>
                                <option value="2">Предложение по усовершенствованию планировщика</option>
                                <option value="3">Вопрос разработчику</option>
                            </select>
                            <label for="floatingSelect">Тип обращения</label>
                        </div>

                    </div>

                    <div class="col-12 mb-3">
                        <textarea name="text" required id="editor-decr-new"class="summernote-editor w-100" style="height: 100px"
                                  data-summernote-config='{
						"placeholder":	"Описание обращения...",
						"focus":		false,
						"lang":			"en-US",
						"minHeight":	 200,
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

                    <div class="col-12 mb-4 text-end">
                        <button type="submit" class="btn btn-success text-white">
                            <i class="fi fi-check"></i>
                            Отправить
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fi fi-close"></i>
                            Закрыть
                        </button>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>
<!-- /Модальное для feedback -->

<script>
    function callback1(){
        $('#feedback').modal('hide');
        $.SOW.core.toast.show('success', '', 'Ваше обращение зарегистрировано', 'top-center', 4000, true);
    }
</script>