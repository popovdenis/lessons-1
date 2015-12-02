/**
 * Created by Denis on 25.10.2015.
 */
$(document).ready(function(){
    $('#subscribe').on('click', function(){
        var form = $('#subscription'),
            formData = form.serialize(),
            formUrl = form.attr('action'),
            formMethod = form.attr('method'),
            responseMsg = $('#subscribe-response');

        //Добавляем дату к форме
        form.data('formstatus','submitting');

        //Показываем соообщение с просьбой подождать
        responseMsg.hide()
            .addClass('response-waiting')
            .text('Пожалуйста, подождите...')
            .fadeIn(200);

        //Отправляем данные на сервер для проверки
        $.ajax({
            dataType: "json",
            url: formUrl,
            type: formMethod,
            data: formData,
            beforeSend: function() {},
            success:function(data) {
                console.log(data);
            },
            error: function() {},
            complete: function() {}
        });
    });
});