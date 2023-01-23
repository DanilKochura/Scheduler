

$(document).ready(function () {
	if($('[data-type="2"]').length && $('[data-type="1"]').length)
	{
		//region second-col-observer
		window.MutationObserver = window.MutationObserver
			|| window.WebKitMutationObserver
			|| window.MozMutationObserver;
// Find the element that you want to "watch"
		var target = document.querySelector('[data-type="2"]'),
// create an observer instance
			observer = new MutationObserver(function(mutation, observer) {
				let id = $(mutation[0].addedNodes[0]).data('id');
				$.ajax(
					{
						url: 'assets/js/ajax/change_status.php',
						method: 'post',
						data: {id: id, status: 2},
						success: function (ans) {
							$.SOW.core.toast.show('success', '', 'Задача успешно изменена!', 'top-center', 4000, true);
						}
					}
				)

			}),
// configuration of the observer:
			config = {
				attributes: true, // this is to watch for attribute changes.
				childList: true
			};
//endregion
		//
		// region third-col-observer
		window.MutationObserver1 = window.MutationObserver
			|| window.WebKitMutationObserver
			|| window.MozMutationObserver;
		// Find the element that you want to "watch"
		var target1 = document.querySelector('[data-type="3"]'),
			// create an observer instance
			observer1 = new MutationObserver(function(mutation, observer) {
				if($(mutation[0].addedNodes[0]).length)
				{
					let ids = $(mutation[0].addedNodes[0]).data('id');
					$('#confirm-modal').modal('show');
					$('#confirm-true').on('click', function (){
						$.ajax(
							{
								url: 'assets/js/ajax/change_status.php',
								method: 'post',
								data: {id: ids, status: 3},
								success: function (ans) {
									$.SOW.core.toast.show('success', '', 'Задача успешно выполнена!', 'top-center', 4000, true);
								}
							}
						);
						$('#confirm-modal').modal('hide');
					});S
				}



			}),
			// configuration of the observer:
			config1 = {
				attributes: true, // this is to watch for attribute changes.
				childList: true
			};
		//endregion

		observer.observe(target, config);
		observer1.observe(target1, config1);
	}



	//Счетчик приоритета
	$('input#priority').on('change', function(){
		$('span#priorityVal').text(getPriority($(this).val())[0])
	});

	//флаг приоритета
	$('.priority-flag').each(function( index ) {
		$(this).find('i').addClass(getPriority($(this).data('priority'))[1]);
	});

	//Заголовок задачи
	$('.input-group-over').blur(function (e) {
		let id = $(this).parents('.list-item').data('id');
		let title = $(this).parents('.list-item').data('title').trim();
		let text = $(this).text().trim();
		if(title == text)
		{
			return
		}
		$('#confirm-modal').modal('show');

		$('#confirm-true').on('click', function (){
			$.ajax(
				{
					url: 'assets/js/ajax/change_title.php',
					method: 'post',
					data: {id: id, text: text},
					success: function (ans) {
						console.log(ans);
					}
				});
			$('#confirm-modal').modal('hide');
		});

	})


	//Модалка для редактирования
	$('.edit-task').on('click', function () {
		let id = $(this).parents('.list-item').data('id');
		$.ajax(
			{
				url: 'assets/js/ajax/get_task.php',
				method: 'post',
				datatype: 'application/json',
				data: {id: id},
				success: function (ans) {
					let task = JSON.parse(ans);
					$('input#alt_descr').empty();
					$('#task-id').empty();
					$('#task-id').val(id);
					$('#id_task').val(id);

					$('[name="edit_title"]').empty();
					$('[name="edit_descr"]').empty();
					$('[name="edit_priority"]').empty();

					$('[name="edit_title"]').val(task.title.trim());
					$('input#alt_descr').val(task.text);
					if($(this).data('bs-toggle') == 'offcanvas')
					{
						$('.descr-show').empty();
						$('.descr-show').append(task.text);
					} else
					{
						$('[name="edit_descr"]').next().children('.note-editing-area').children('.note-placeholder').remove();
						$('[name="edit_descr"]').next().children('.note-editing-area').children('.card-block').empty().append(task.text);
					}
					$('.com-block').empty();
					console.log(task.comments)
					for(let comment of task.comments)
					{
						console.log(comment);
						$('.com-block').append('<div class="border border-light rounded mb-4 p-4">' +
							'<div class="row">\n' +
							'<div class="col-md-3 text-center">\n' +
							'<div class="avatar avatar-lg rounded-circle" style="background-image:url(https://imdibil.ru/scheduler/assets/images/avatars/av.png)"></div>\n' +
							'<p class="text-gray-900">\n' +
							'<span class="d-block fw-medium">'+comment.user_name+'</span>\n' +
							'</p>\n' +
							'</div>\n' +
							'<div class="col-md-9">\n' +
							'<p class="align-self-center">'+comment.text+'</p>\n' +
							'</div>\n' +
							'</div>\n' +
							'</div>\n')
					}

					$('select[name="edit_responsible"]option#U'+$(this).parents('.list-item').data('responsible')).attr('selected');
					$('[name="edit_priority"]').val(task.priority);
					$('span#priorityVal').text(getPriority(task.priority)[0])

				}
			});

	});



	//сброс пароля
	$('#email_send').submit(function (e) {
		e.preventDefault();
		let email = $(this).find('input').val();
		$.ajax({
			url: 'https://imdibil.ru/scheduler/assets/js/ajax/reset_send.php',
			method: 'post',
			data: {email: email},
			success: function ()
			{
				$('#email_new').val(email);
				$('#email_pw').val(email);
				$('#email_send').remove();
				$('#code_check').removeClass('d-none');
				$.SOW.core.toast.show('success', '', 'Инструкции отправлены на email!', 'top-center', 4000, true);
			},
			error: function () {
				$.SOW.core.toast.show('error', '', 'Пользователь не найден!', 'top-center', 4000, true);

			}
		});
	});


	
});

function getPriority(number)
{
	if(number> 70)
	{
		return ['Высокий', 'text-danger'];
	}else if(number> 35)
	{
		return ['Средний', 'text-blue-500'];
	}else
	{
		return ['Низкий', 'text-success'];
	}
}






