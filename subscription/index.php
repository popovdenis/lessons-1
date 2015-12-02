<?php
include_once "Subscriber.php";
include_once "Subscription.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="application/javascript" src="jquery-2.1.4.min.js"></script>
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#send').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: 'http://lessons/subscription/handler.php',
                    data: {
                        'email': $('#email').val()
                    },
                    beforeSend: function() {
                        $('#message').html('');
                    },
                    success: function (data, textStatus) {
                        if (data.success) {
                            var html =
                                '<tr>' +
                                '<td>' + data.subscriber.id + '</td>' +
                                '<td>' + data.subscriber.email + '</td>' +
                                '</tr>';

                            $('#subscribers_list')
                                .find('tbody')
                                .append(html);
                        } else {
                            $('#message').html('Error');
                        }
                    },
                    error: function(message) {
                        console.log(message);
                    },
                    dataType : "json"
                });
            });
        });
    </script>

    <form name="subscriber" id="subscriber" action="index.php" method="post">
        <label>
            <input type="text" id="email" name="email">
        </label>
        <label>
            <input id="send" type="button" value="Subscribe">
        </label>
    </form>

    <div id="message"></div>

    <table id="subscribers_list" border="1" width="100%">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $subscriber = new Subscriber();
        $list = $subscriber->getSubscribers();
        foreach ($list as $value) {
        ?>
            <tr>
                <td><?php echo $value[0] ?></td>
                <td><?php echo $value[1] ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>