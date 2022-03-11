<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1658092387:AAE0MupW3YuEGO2XtnoqgBGjqO9_tzGI1p0";

//Сюда вставляем chat_id
$chat_id = "262557147";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $surname = ($_POST['surname']);
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);
    $service = ($_POST['service']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Прізвище : ' => $surname, 
        'Імя : ' => $name,
        'Телефон:' => $phone,
        'Послуга' => $service
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}

?>