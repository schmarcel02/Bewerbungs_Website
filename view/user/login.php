<div class="content-wrapper">
    <h2><?= TextUtil::getText("title_login") ?></h2>
    <form id="frmLogin" class="form" action="/user/doLogin" method="post">
        <div><label for="txtMail"><?= TextUtil::getText("label_mail") ?></label><br><input class="form_input"
                                                                                           type="text" id="txtMail"
                                                                                           name="txtMail"></div>
        <div><label for="txtPass"><?= TextUtil::getText("label_pass") ?></label><br><input class="form_input"
                                                                                           type="password" id="txtPass"
                                                                                           name="txtPass"></div>
        <button type="submit"><?= TextUtil::getText("button_login") ?></button>
    </form>
</div>