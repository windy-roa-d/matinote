<?php
//ヘッダー部分にタグを挿入したいときは、このテンプレート挿入（ヘッダーに挿入する解析タグなど）
//子テーマのカスタマイズ部分を最小限に抑えたい場合に有効なテンプレートとなります。
//例：<script type="text/javascript">解析コード</script>
?>
<?php if (!is_user_logged_in()) :
//ログインユーザーをカウントしたくない場合は
//↓ここに挿入?>

<?php endif; ?>
<?php //ログインユーザーも含めてカウントする場合は以下に挿入 ?>
<meta name="google-site-verification" content="JhxQPkTlhLXrpqIrjibVRHJHnxqvIx8Pz-dyMqGy694" />