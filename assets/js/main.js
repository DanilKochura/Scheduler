

$(document).ready(function () {
	$('.edit-admission').on("click", function (e) {
		console.log('s');
		let id = $(this).data('id');
		let comm_input = $('#edit-admission').find('input[name="comment"]');
		let edit_input = $('#edit-admission').find('input[name="edit"]');
		let add_input = $('#edit-admission').find('input[name="adding"]');
		let aid_input = $('#edit-admission').find('input[name="admission_id"]');
		let uname_input = $('#edit-admission').find('span.username');

		comm_input.attr('checked', false);
		add_input.attr('checked', false);
		edit_input.attr('checked', false);

		let add = $(this).data('add');
		let edit = $(this).data('edit');
		let comment = $(this).data('comment');
		let user = $(this).data('user');

		if(parseInt(comment) == 1)
		{
			$(comm_input).attr('checked', true);
		}
		if(add == 1)
		{
			add_input.attr('checked',true);
		}
		if(edit == 1)
		{
			edit_input.attr('checked',true);
		}
		uname_input.text(user)
		aid_input.val(id)


		$('#edit-admission').modal('show');
	});
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
						url: 'https://imdibil.ru/scheduler/assets/js/ajax/change_status.php',
						method: 'post',
						data: {id: id, status: 2},
						success: function (ans) {
								$.SOW.core.toast.show('success', '', 'Задача успешно изменена!', 'top-center', 4000, true);
							console.log(ans);
						},
						error: function (e)
						{
							if(e.status == 505)
							{
								$.SOW.core.toast.show('danger', '', 'У вас нет прав на перемещение задачи!', 'top-center', 4000, true);
							}

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
									console.log(ans)
								},
								error: function (e)
								{
									$.SOW.core.toast.show('danger', '', 'У вас нет прав на перемещение задачи!', 'top-center', 4000, true);

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
				url: 'https://imdibil.ru/scheduler/assets/js/ajax/get_task.php',
				method: 'post',
				data: {id: id},
				success: function (ans) {
					let task = JSON.parse(ans);
					console.log(task);

					$('input#alt_descr').empty();
					$('#task-id').empty();
					$('#task-id').val(id);
					$('#id_task').val(id);

					$('[name="edit_title"]').empty();
					$('[name="edit_descr"]').empty();
					$('[name="edit_priority"]').empty();
					$('[name="author"]').empty();

					$('[name="edit_title"]').val(task.title.trim());
					$('input#alt_descr').val(task.text);
					$('[name="author"]').val(task.author);
						$('.descr-show').empty();
						$('.descr-show').append(task.text);
						$('[name="edit_descr"]').next().children('.note-editing-area').children('.note-placeholder').remove();
						$('[name="edit_descr"]').next().children('.note-editing-area').children('.card-block').empty().append(task.text);

					$('.com-block').empty();
					console.log(task.comments)
					for(let comment of task.comments)
					{
						console.log(comment);
						$('.com-block').append('<div class="border border-light rounded p-4">' +
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
							'</div><hr>\n')
					}
					let opts = $('select[name="edit_responsible"] option[value='+task.responsibile+']');
					$.each(opts, function (key, value) {
						console.log(value)
						$(value).attr('selected', true);
					})
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
	if(number> 80)
	{
		return ['Очень высокий', 'text-red-900'];
	}
	else if(number> 60)
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






