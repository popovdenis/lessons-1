var exampleObj = {
    loadExample: function() {
        $(document).ready(function(){
            // вешаем на клик по элементу с id = example-1
            $('#example-1').click(function(){
                // загрузку HTML кода из файла example.html
                $(this).load('ajax/example.html');
            })
        });
    }
};