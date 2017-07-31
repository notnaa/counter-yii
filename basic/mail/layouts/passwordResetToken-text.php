<?php
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

    Привет <?= $user->username ?>,
    Пожалуйста, перейдите по ссылке, чтобы сбросить пароль:

<?= $resetLink ?>